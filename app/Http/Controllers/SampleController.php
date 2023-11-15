<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class SampleController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function registration(){
        return view("auth.registration");
    }

    public function welcome(){
        return view("mobileApp.welcome");
    }

    public function registerUser(Request $request){
        $request -> validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=> 'required|min:5|max:12',
        ]);

        $user = new User(); 
        $user-> name =$request->name;
        $user->email= $request->email;
        $user->password= Hash::make($request->password);
        $res = $user->save();

        if($res){
            return back()->with ('success', 'Registered successfully');

        }else{
            return back()->with ('failed', 'Ask developer');
        }

    }

    public function loginUser(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginId', $user->id);
                return redirect('home');
            }else{
                return back()-> with ('failed', 'Incorrect password.');
            }

         }else{
            return back()-> with ('failed', 'Wapa ma register na email account.');
         }
    }

    public function home(){

        $userData = array();
        if(Session::has('loginId')){
            $userData = User::where('id', '=', Session::get('loginId'))->first();
        }


        return view('mobileApp.home', compact('userData'));
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect("login");
        }
    }

}
