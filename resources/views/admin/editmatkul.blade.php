@extends('layouts.admin')
@section('Matkulactive', 'active')
@section ('nama', $datalogin['nama'])
@section('title', 'Mata Kuliah')
@section('content')

         
    <form method="POST" action="">
        @csrf

        <div class="form-group">
            <label for="kode_matkul">Kode Matakuliah:</label>
            <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" value="{{$matkul->kode_matkul}}">
            @error('kode_matkul')<span class="text-danger  mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="nama">Nama Matakuliah:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{$matkul->nama}}" >
            @error('nama')<span class="text-danger mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="semester">Semester:</label>
            <input type="number" class="form-control" id="semester" name="semester" value="{{$matkul->semester}}">
            @error('semester')<span class="text-danger mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="sks">SKS:</label>
            <input type="number" class="form-control" id="sks" name="sks" value="{{$matkul->sks}}" >
            @error('sks')<span class="text-danger  mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="dosen_pengampu">Dosen Pengampu:</label>
            <input type="text" class="form-control" id="dosen_pengampu" name="dosen_pengampu" value="{{$matkul->dosen_pengampu}}" >
            @error('dosen_pengampu')<span class="text-danger mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>


@endsection