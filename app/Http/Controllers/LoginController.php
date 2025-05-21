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
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            $user = Auth::user();
            $role = $user->role->role ?? null; 

            switch ($role) {
                case 'admin':
                case 'superAdmin':
                case 'adminSiswa':
                case 'adminPegawai':
                    return redirect()->route('admin.dashboard');
                case 'kesiswaan':
                    return response('sukses');
                case 'kepegawaian':
                    return response('berhasil');
                default:
                    Auth::logout(); 
                    return redirect()->back()->withErrors(['login' => 'Role tidak dikenali']);
            }
        } else {
            return redirect()->back()->withErrors(['login' => 'Email atau password salah']);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }


}
