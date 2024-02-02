<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;


class UserController extends Controller
{
    public function createUserForm(Request $request){
        return view('inscription');
    }

    public function UserForm(Request $request){
        //
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'ville' => 'required',
            'profil' => 'required',
            'tel' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'Specialite',
            'StructHospital',
            'dispo' 
        ]);

        User::create($request->all());
        return back()->with('success', 'Les données ont été enregistrées avec succès.');
        
    }


    public function Delete($id){
        DB::table('users')->where('id',$id)->delete();
        DB::table('appointments')->where('id_medecin',$id)->delete();
        DB::table('appointments')->where('id_patient',$id)->delete();
        DB::table('messages')->where('id_exp',$id)->where('id_des',$id)->delete();
        return back()->with('success','User Deleted Succesfuly');
    }



    

    /**  */
    public function edit($id)
    {
        $appoi = User::find($id);
        return view('dashboardP/patientProfil', compact('appoi'));
    } 

    public function update(Request $request, $id)
    {
        $ap = User::find($id);
        $ap->nom = $request->input('nom');
        $ap->prenom = $request->input('prenom');
        $ap->ville = $request->input('ville');
        $ap->profil = $request->input('profil');
        $ap->tel = $request->input('tel');
        $ap->email = $request->input('email');
        $ap->password = $request->input('password');

        $ap->update();
        return back()->with('status','Profil update Successfully');
    }



        
}