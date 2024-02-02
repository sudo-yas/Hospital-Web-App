<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class AppointmentController extends Controller
{
    //
    public function av(Request $request)
    {
       $this->validate($request, [
        'id',
        'id_medecin',
        'id_patient',    
        'debut',
        'fin',
        'etat',
        'StructH'
        ]);

        'App\Models\appointment'::create($request->all());
        return back()->with('success', 'Les données ont été enregistrées avec succès.');
    }


    public function Delete($id){
        DB::table('appointments')->where('id',$id)->delete();
        return back()->with('success','Appointement Deleted Succesfuly');
    }

    public function Delete_D($id){
        DB::table('appointments')->where('id',$id)->where('id_medecin','=',Session::get('loginId'))->delete();
        return back()->with('success','Appointement Deleted Succesfuly');
    }





    /**  */

    public function edit($id)
    {
        $appoi = appointment::find($id);
        return view('dashs.patientDash', compact('appoi'));
    }

    public function update(Request $request, $id)
    {
        $ap = 'App\Models\appointment'::find($id);
        $ap->id_medecin = $request->input('id_medecin');
        $ap->id_patient = $request->input('id_patient');
        $ap->debut = $request->input('debut');
        $ap->fin = $request->input('fin');
        $ap->etat = $request->input('etat');
        $ap->StructH = $request->input('StructH');
        $ap->update();
        return redirect()->back()->with('status','Appointment reserved Successfully');
    }

  
}
