<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Message extends Controller
{
    //
    public function Msg(Request $req){

        $this->validate($req, [
            'id_exp'=> 'required' ,
            'id_des' => 'required',
            'tel' => 'required',
            'objet' => 'required',
            'contenu' => 'required'
        ]);         

        'App\Models\message'::create($req->all());
        return back()->with('success', 'Message a été envoyer avec succès.');
    }

    public function Delete_mes($id){
        DB::table('messages')->where('id',$id)->delete();
        return back()->with('success','message Deleted Succesfuly');
    }


}
