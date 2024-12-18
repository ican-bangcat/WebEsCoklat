<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index($page)
    {
        if ($page == 'register') {
            return view('register');
        }

        return view('login');
    }
    function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password=>required'
            ],
            [
                'email.required' => 'Email wajib diisi',
                'password.required' => 'Password wajib diisi',
            ]
        );

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infoLogin)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/admin');
            } else {
                return redirect('/');
            }
            
        } else {
            return redirect('')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
        }
        
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
