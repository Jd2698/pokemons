<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Auth;
use App\Models\User;

class LoginController extends Controller
{

    public function login(){
        if(auth()->check()){
            return redirect('index');
        }else{
            return view('login');
        }
    }
    public function active($id){
        if(Auth::check()){
            return view('pokemon', compact('id'));
        }else{
            session()->flash('exito', 'Need to login');
            return redirect('login');
        }
    }

    public function check(Request $request){
        $resultados = Validator::make($request->all(), [
            'email' => 'required|email|max:100',
            'password' => 'required'

        ]);


        if ($resultados->fails()) {
            return redirect()
            ->back()
            ->withErrors($resultados)
            ->withInput();
        }

        $data['email'] = $request->get('email');
    	$data['password'] = $request->get('password');

    	if(Auth::attempt($data)){
    		// $request->session()->regenerate();
            $user = Auth::User();
            session(['user'=>$user]);
    		return redirect('index');
    	}
        return back()->withErrors([
            'email' => 'Wrong email or password.',
        ])->onlyInput('email');

    } 
    public function exit(){
        Auth::logout();
        session()->forget('user');
        return redirect('index');
    }
}
