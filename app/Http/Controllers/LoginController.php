<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view ('landing');
    }
    public function login()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        
        if ($user = User::where('email', $data['email'])->first()) {
            if ($user->password === $data['password']){
                Auth::login($user);
                return redirect('dashboard');
            }
        }
        
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}