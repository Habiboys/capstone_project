<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\JadwalKuliah;
use App\Models\MataKuliah;
use App\Models\Tugas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //================== DASHBOARD ==============

    function dashboard()
    {
        $ctugas= Tugas::count();
        $cmatkul= MataKuliah::count();
        $cinfo= Informasi::count();
        $cjadwal= JadwalKuliah::count();
        $cuser= User::where('role', 'user')->count();

        $datalogin = [
            'nama' =>  Auth::user()->name,
            'email' =>  Auth::user()->email,
        ];
        return view('admin/dashboard', compact('datalogin','ctugas','cmatkul','cinfo','cjadwal', 'cuser'));
    }


    //=============  MATA KULIAH ============================

    function matkul()
    {
        $datalogin = [
            'nama' =>  Auth::user()->name,
            'email' =>  Auth::user()->email,
        ];
        // $matkul = MataKuliah::all();
        $matkul = MataKuliah::orderBy('created_at', 'asc')->get();

        return view('admin/matkul', compact('datalogin', 'matkul'));
    }
 
    function tambahmatkul()
    {
        $datalogin = [
            'nama' =>  Auth::user()->name,
            'email' =>  Auth::user()->email,
        ];
        return view('admin/tambahmatkul', compact('datalogin'));
    }
    function create_matkul(Request $request)
    {
        $request->validate([
            'kode_matkul' => 'required|unique:mata_kuliah,kode_matkul',
            'nama' => 'required|unique:mata_kuliah,nama',
            'semester' => 'required',
            'sks' => 'required',
            'dosen_pengampu' => 'required',
            'semester' => 'required|integer|min:1', // Semester harus bilangan bulat positif
            'sks' => 'required|integer|min:1',
        ], [
            'kode_matkul.required' => "Kode mata kuliah wajib di isi",
            'kode_matkul.unique' => "Kode mata kuliah sudah terdaftar",
            'nama.required' => "Nama Mata Kuliah wajib di isi",
            'nama.unique' => "Nama Mata Kuliah sudah terdaftar",
            'semester.required' => "Semester wajib di isi",
            'semester.min' => "Semester minimal harus 1",
            'sks.required' => "Sks wajib di isi",
            'sks.min' => "Sks minimal harus 1",
            'dosen_pengampu.required' => "Dosen pengampu wajib di isi",

        ]);

        $data = [
            'kode_matkul' => $request->input('kode_matkul'),
            'nama' => $request->input('nama'),
            'semester' => $request->input('semester'),
            'sks' => $request->input('sks'),
            'dosen_pengampu' => $request->input('dosen_pengampu'),
        ];
        MataKuliah::create($data);


        return redirect('matakuliah')->with('success', 'Mata Kuliah Berhasil ditambahkan');
    }
    function edit_matkul($id)
    {
        $matkul = MataKuliah::find($id);
        $datalogin = [
            'nama' =>  Auth::user()->name,
            'email' =>  Auth::user()->email,
        ];
        return view('admin/editmatkul', compact('datalogin', 'matkul'));
    }
    function update_matkul(Request $request, $id)
    {
        $request->validate([
            'kode_matkul' => 'required|',
            'nama' => 'required|',
            'semester' => 'required',
            'sks' => 'required',
            'dosen_pengampu' => 'required',
            'semester' => 'required|integer|min:1', // Semester harus bilangan bulat positif
            'sks' => 'required|integer|min:1',
        ], [
            'kode_matkul.required' => "Kode mata kuliah wajib di isi",

            'nama.required' => "Nama Mata Kuliah wajib di isi",

            'semester.required' => "Semester wajib di isi",
            'semester.min' => "Semester minimal harus 1",
            'sks.required' => "Sks wajib di isi",
            'sks.min' => "Sks minimal harus 1",
            'dosen_pengampu.required' => "Dosen pengampu wajib di isi",

        ]);
        $matkul = MataKuliah::find($id);

        $matkul->update([
            'kode_matkul' => $request->input('kode_matkul'),
            'nama' => $request->input('nama'),
            'semester' => $request->input('semester'),
            'sks' => $request->input('sks'),
            'dosen_pengampu' => $request->input('dosen_pengampu'),
        ]);



        return redirect('matakuliah')->with('success', 'Mata Kuliah Berhasil diperbarui');
    }
    function delete_matkul($id)
    {
        $matkul = MataKuliah::destroy($id);

        return redirect('matakuliah')->with('success', 'Mata Kuliah Berhasil dihapus');
    }





    //============================= TUGAS ====================================
    function tugas()
    {
        $datalogin = [
            'nama' =>  Auth::user()->name,
            'email' =>  Auth::user()->email,
        ];
        // $matkul = MataKuliah::all();
        // $tugas = Tugas::all();
        $tugas = Tugas::orderBy('created_at', 'asc')->get();
        return view('admin/tugas', compact('datalogin', 'tugas'));
    }

    function tambah_tugas()
    {
        $datalogin = [
            'nama' =>  Auth::user()->name,
            'email' =>  Auth::user()->email,
        ];

        $matkul = MataKuliah::all();
        return view('admin/tambahtugas', compact('datalogin', 'matkul'));
    }
    function create_tugas(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode_matkul' => 'required',
            'instruksi' => 'required',
            'deadline'  => 'required|date|after_or_equal:today',

        ], [
            'nama.required' => "Nama Tugas Wajib Disi",
            'kode_matkul.required' => "Mata kuliah wajib di pilih",
            'instruksi.required' => 'Instruksi wajib di isi',
            'deadline.after_or_equal' => 'Deadline harus minimal hari sekarang atau setelahnya.',

        ]);

        $data = [
            'nama' => $request->input('nama'),
            'kode_matkul' => $request->input('kode_matkul'),
            'instruksi' => $request->input('instruksi'),
            'deadline' => $request->input('deadline'),
        ];
        // dd($data);
        Tugas::create($data);
        return redirect('daftartugas')->with('success', 'Tugas Berhasil Ditambahkan');
    }
    function delete_tugas($id)
    {
        $tugas = Tugas::destroy($id);

        return redirect('daftartugas')->with('success', 'Tugas Berhasil dihapus');
    }
    function edit_tugas($id)
    {
        $matkul = MataKuliah::all();
        $tugas = Tugas::find($id);

        $datalogin = [
            'nama' =>  Auth::user()->name,
            'email' =>  Auth::user()->email,
        ];
        return view('admin/edittugas', compact('datalogin', 'matkul', 'tugas'));
    }
    function update_tugas(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kode_matkul' => 'required',
            'instruksi' => 'required',
            'deadline'  => 'required|date|after_or_equal:today',

        ], [
            'nama.required' => "Nama Tugas Wajib Disi",
            'kode_matkul.required' => "Mata kuliah wajib di pilih",
            'instruksi.required' => 'Instruksi wajib di isi',
            'deadline.after_or_equal' => 'Deadline harus minimal hari sekarang atau setelahnya.',

        ]);
        $tugas = Tugas::find($id);
        $tugas->update([
            'nama' => $request->input('nama'),
            'kode_matkul' => $request->input('kode_matkul'),
            'instruksi' => $request->input('instruksi'),
            'deadline' => $request->input('deadline'),
        ]);

        return redirect('daftartugas')->with('success', 'Tugas Berhasil Diperbarui');
    }

    //Jadwal Kuliah
    function jadwal()
    {
        $datalogin = [
            'nama' =>  Auth::user()->name,
            'email' =>  Auth::user()->email,
        ];
        // $matkul = MataKuliah::all();
        $jadwal = JadwalKuliah::orderBy('created_at', 'asc')->get();

        return view('admin/jadwalkuliah', compact('jadwal','datalogin'));
    }
    function tambah_jadwal()
    {
        $datalogin = [
            'nama' =>  Auth::user()->name,
            'email' =>  Auth::user()->email,
        ];
        $matkul= MataKuliah::all();
        return view('admin/tambahjadwalkuliah', compact('datalogin','matkul'));
    }
    function create_jadwal (Request $request){
        $request->validate([
            'kode_matkul' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruangan' => 'required',
        ],[
            'kode_matkul.required' => "Mata kuliah wajib di pilih",
            'hari.required' =>'Hari wajib di isi',
            'jam_mulai.required' =>'Jam selesai wajib di isi',
            'jam_selesai.required' =>'jam selesai wajib di isi',
            'ruangan.required' =>'Ruangan wajib di isi',

        ]);

        $data=[
            'kode_matkul' => $request->input('kode_matkul'),
            'hari' => $request->input('hari'),
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_selesai' => $request->input('jam_selesai'),
            'ruangan' => $request->input('ruangan'),
        ];

       JadwalKuliah::create ($data);
       return redirect('jadwalkuliah')->with('success','Jadwal Kuliah Berhasi Ditambahkan');
    }

    function edit_jadwal($id){
        $matkul = MataKuliah::all();
        $jadwal = JadwalKuliah::find($id);

        $datalogin = [
            'nama' =>  Auth::user()->name,
            'email' =>  Auth::user()->email,
        ];
        return view('admin/editjadwalkuliah', compact('datalogin', 'matkul', 'jadwal'));

    }

    function update_jadwal (Request $request, $id){
        $request->validate([
            'kode_matkul' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruangan' => 'required',
        ],[
            'kode_matkul.required' => "Mata kuliah wajib di pilih",
            'hari.required' =>'Hari wajib di isi',
            'jam_mulai.required' =>'Jam selesai wajib di isi',
            'jam_selesai.required' =>'jam selesai wajib di isi',
            'ruangan.required' =>'Ruangan wajib di isi',
        ]);
        $jadwal = JadwalKuliah::find($id);

        $jadwal->update([
            'kode_matkul' => $request->input('kode_matkul'),
            'hari' => $request->input('hari'),
            'jam_mulai' => $request->input('jam_mulai'),
            'jam_selesai' => $request->input('jam_selesai'),
            'ruangan' => $request->input('ruangan'),
        ]);
        return redirect('jadwalkuliah')->with('success','Jadwal Kuliah Berhasi Diperbarui');
    }

    function delete_jadwal($id){
      
            $jadwal = JadwalKuliah::destroy($id);
    
            return redirect('jadwalkuliah')->with('success', 'Jadwal Kuliah Berhasil dihapus');
    
    }




    //============== Informasi ===================
    function info()
    {
        $datalogin = [
            'nama' =>  Auth::user()->name,
            'email' =>  Auth::user()->email,
        ];
        $info = Informasi::orderBy('created_at', 'asc')->get();
       
        return view('admin/info', compact('datalogin','info'));
    }

    function tambah_info()
    {
        $datalogin = [
            'nama' =>  Auth::user()->name,
            'email' =>  Auth::user()->email,
        ];
        return view('admin/tambahinfo', compact('datalogin'));
    }
    function create_info(Request $request){
        $request->validate([
            'tanggal' =>  'required|date|after_or_equal:today',
            'title'  => 'required',
            'isi'  => 'required',
        ],[
            'tanggal.required' => "Tanggal Wajib Diisi",
            'tanggal.after_or_equal' => "Tanggal minimal hari ini dan setelahnya",
            'title.required' => "judul Wajib Diisi",
            'isi.required' => "isi Wajib Diisi",
        ]);

        $data=[
            'tanggal' => $request->input('tanggal'),
            'title' => $request->input('title'),
            'isi' => $request->input('isi'),
        ];
        Informasi::create($data);
        return redirect('informasi')->with('success','infomarsi Berhasil Ditambahkan');

    }

    function edit_info ($id){
        $datalogin = [
            'nama' =>  Auth::user()->name,
            'email' =>  Auth::user()->email,
        ];
        $info= Informasi::find($id);
        return view('admin/editinfo', compact('datalogin','info'));

    }
    function update_info (Request $request, $id){
        $request->validate([
            'tanggal' =>  'required|date|after_or_equal:today',
            'title'  => 'required',
            'isi'  => 'required',
        ],[
            'tanggal.required' => "Tanggal Wajib Diisi",
            'tanggal.after_or_equal' => "Tanggal minimal hari ini dan setelahnya",
            'title.required' => "judul Wajib Diisi",
            'isi.required' => "isi Wajib Diisi",
        ]);
        $info=  Informasi::find($id);
        $info->update([
            'tanggal' => $request->input('tanggal'),
            'title' => $request->input('title'),
            'isi' => $request->input('isi'),
        ]);
       
        return redirect('informasi')->with('success','infomarsi Berhasil Diperbarui');

    }
    function delete_info ($id){
        $info = Informasi::destroy($id);

        return redirect('informasi')->with('success', 'Informasi Berhasil dihapus');

    }
    
}
