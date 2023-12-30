@extends('layouts.admin')
@section('Infoactive', 'active')
@section ('nama', $datalogin['nama'])
@section('title', 'Informasi')
@section('content')
<form method="POST" action="">
    @csrf

    <div class="form-group">
        <label for="tanggal">Tanggal:</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal"  value="{{ old('tanggal') }}">
        @error('tanggal')<span class="text-danger  mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="title">Judul</label>
        <input type="text" class="form-control" id="title" name="title"  value="{{ old('title') }}" >
        @error('title')<span class="text-danger mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="isi">Isi</label>
        <textarea class="form-control" name="isi" id="isi" cols="30" rows="10">{{ old('isi') }}</textarea>
        @error('isi')<span class="text-danger mt-2"  style="font-size: 90%;">{{ $message }}</span>@enderror
    </div>
  

    <button type="submit" class="btn btn-primary">Tambah</button>
</form>

@endsection
