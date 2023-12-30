@extends('layouts.admin')
@section('Tugasactive', 'active')
@section ('nama', $datalogin['nama'])
@section('title', 'Tugas')
@section('content')

         
    <form method="POST" action="">
        @csrf

        <div class="form-group">
            <label for="nama">Nama Tugas:</label>
            <input type="text" class="form-control" id="nama" name="nama"  value="{{ old('nama') }}" >
            @error('nama')<span class="text-danger  mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="kode_matkul">Matakuliah:</label>
            <select class="form-control" id="kode_matkul" name="kode_matkul" >
         
                <option value="" selected disabled>Pilih Matakuliah</option>
                @foreach ($matkul as $item)
                <option value="{{ $item->kode_matkul }}" >{{$item->nama}}</option>
                @endforeach
            </select>
            @error('kode_matkul')<span class="text-danger mt-2" style="font-size: 90%;">{{ $message }}</span>@enderror
        </div>
    

        <div class="form-group">
            <label for="instruksi">Instruksi:</label>
            <textarea class="form-control" name="instruksi" id="instruksi" cols="30" rows="10">{{ old('instruksi') }}</textarea>
            @error('instruksi')<span class="text-danger mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="deadline">Dealine:</label>
            <input type="date" class="form-control" id="deadline" name="deadline"  value="{{ old('deadline') }}">
            @error('deadline')<span class="text-danger  mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>


@endsection