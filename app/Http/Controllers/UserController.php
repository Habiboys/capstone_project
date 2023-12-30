<?php

namespace App\Http\Controllers;

use App\Models\Completed;
use App\Models\Informasi;
use App\Models\JadwalKuliah;
use App\Models\MataKuliah;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function home(){
        
    $datalogin = [
        'nama' =>  Auth::user()->name,
        'email' =>  Auth::user()->email,
    ];
    $com= Completed::where('id_user', Auth::user()->id)->orderBy('created_at','asc')->get();
    // $matkul = MataKuliah::all();
    $info = Informasi::orderBy('tanggal','asc')->get();

    $tugas = Tugas::whereNotIn('id_tugas', function ($query) {
        $query->select('id_tugas')->from('completed_tasks')->where('id_user', Auth::user()->id);
    })->orderBy('created_at', 'desc')->get();


    return view('user/home', compact('datalogin', 'tugas','info', 'com'));
    
    }
    function create_completed_task($id){

        $com=[
            'id_user' => Auth::user()->id,
            'id_tugas' => $id,
        ];

        Completed::create($com);
        return redirect('home');


    }

    public function matkul(){
        
        $datalogin = [
            'nama' =>  Auth::user()->name,
            'email' =>  Auth::user()->email,
        ];
        
        $matkul = MataKuliah::orderBy('created_at', 'asc')->get();
    
    
        return view('user/matkul', compact('datalogin', 'matkul'));
    }
    public function jadwal(){
        
        $datalogin = [
            'nama' =>  Auth::user()->name,
            'email' =>  Auth::user()->email,
        ];
        
        $jadwal = JadwalKuliah::orderBy('created_at', 'asc')->get();
    
    
        return view('user/jadwalkuliah', compact('datalogin', 'jadwal'));
    }

    
}
