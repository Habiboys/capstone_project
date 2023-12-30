<?php

namespace App\Http\Controllers;

use App\Http\Middleware\UserAkses;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    function proses_login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'password.required' => 'Password wajib diisi',
            ]

        );

        $datalogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($datalogin)) {
            if(Auth::user()->role == 'admin'){
                return redirect('dashboard');
            }else if(Auth::user()->role == 'user'){
                return redirect('home');
            }
        
           
        } else {
            return  redirect('')->withErrors(['error' => 'Username / Password Salah']);
        }
        // if (Auth::attempt(!$datalogin)) {
        //     return  redirect('')->withErrors('Username / Password Salah');

        // }
    }

    function logout (){
        Auth::logout();
        return redirect ('');
    }
    // function CheckRole (){
    //     return redirect('dashboard');
    // }
    function CheckRole (){
        if(Auth::user()->role == 'admin'){
            return redirect('dashboard');
        }else if(Auth::user()->role == 'user'){
            return redirect('home');
        }
    }

    public function register()
    {
        return view('register');
    }

    function proses_register(Request $request)
    {
        $request->validate(
            [
                'name'=> 'required',
                'email' => 'required|unique:users,email',
                'password' =>  'required|min:6|confirmed',
            ],
            [
                'name'=> 'Username wajib diisi',
                'email.required' => 'Email wajib diisi',
                'email.unique' => 'Email sudah digunakan',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Password minimal harus 6 karakter',
                'password.confirmed' => 'Password tidak cocok',
            ]

        );

        $dataregister = [
            'name'=> $request->name, 
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ];

        User::create($dataregister);

        return redirect('register')->with('success', 'Register Berhasil!');
        // if (Auth::attempt(!$datalogin)) {
        //     return  redirect('')->withErrors('Username / Password Salah');

        // }
    }

}
