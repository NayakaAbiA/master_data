<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) 
        {
            $role = Auth::user()->role->role;
                if ($role == 'admin') {
                    return redirect()->route('coba');
                } elseif ($role == 'kesiswaan') {
                    echo "sukses";
                } elseif ($role == 'kepegawaian') {
                    echo "berhasil";
                } else {
                return redirect()->back()->withErrors('Username dan password salah');
                }
        }
        
    }

}
