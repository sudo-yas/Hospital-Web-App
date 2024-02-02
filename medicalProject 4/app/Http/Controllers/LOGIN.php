<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;  
use Hash;
use Session;


class LOGIN extends Controller
{
    public function LoginForm(){
        return view('login');
    }

    public function Login(Request $req){
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email','=',$req->email)->first();
        if($user){

            if($req->password==$user->password){
                //Storing Data Via a request instance... 
                //$req->session()->put('key', 'value');
                $req->session()->put('loginId',$user->id);
                if($user->profil=="Patient"){
                    return redirect('dashboardP');
                }elseif($user->profil=="Doctor"){
                    return redirect('dashboardD');
                }elseif($user->profil=="Admin"){
                    return redirect('dashboardA');
                }

            }else{
                return back()->with('fail','Password Incorrect');
            }
        }else{
            return back()->with('fail','Email Not Registered');
        }
    }

    public function dashboardD(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();

        }
        return view('dashs.doctorDash', compact('data'));
    }

    public function dashboardA(){
        $data = array();
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
            $lists = DB::table('appointments')->get();
            $lists2 = DB::table('users')->get();
        }
        return view('dashs.AdminDash', compact('data','lists'));
    }

    public function dashboardP(){
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
            $lists = DB::table('appointments')->get();
        }
        return view('dashs.patientDash', compact('data') /*compact('data','lists')*/);
    }



    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            Session::flush();
            Session::forget('loginId');
        }
        return redirect('login');
    }




}

