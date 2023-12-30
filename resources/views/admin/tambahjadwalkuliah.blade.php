@extends('layouts.admin')
@section('Jadwalactive', 'active')
@section ('nama', $datalogin['nama'])
@section('title', 'Mata Kuliah')
@section('content')

         
    <form method="POST" action="">
        @csrf

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
            <label for="hari">Hari</label>

            <select class="form-control" id="hari" name="hari" >
                <option value="" selected disabled>Pilih Hari</option>
                <option value="senin" >Senin</option>
                <option value="selasa" >Selasa</option>
                <option value="rabu" >Rabu</option>
                <option value="kamis" >Kamis</option>
                <option value="jumat" >Jumat</option>
                <option value="sabtu" >Sabtu</option>
            </select>
            @error('hari')<span class="text-danger mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="jam_mulai">Jam Mulai:</label>
            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"  value="{{ old('jam_mulai') }}" >
            @error('jam_mulai')<span class="text-danger mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="jam_selesai">Jam Selesai:</label>
            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai"  value="{{ old('jam_selesai') }}" >
            @error('jam_selesai')<span class="text-danger mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
        </div>

        <div class="form-group">
            <label for="ruangan">Ruangan:</label>
            <input type="text" class="form-control" id="ruangan" name="ruangan"  value="{{ old('ruangan') }}" >
            @error('ruangan')<span class="text-danger  mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
        </div>

       

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>


@endsection