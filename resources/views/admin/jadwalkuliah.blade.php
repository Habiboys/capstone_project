@extends('layouts.admin')
@section('jadwalactive', 'active')
@section ('nama', $datalogin['nama'])
@section('title', 'Jadwal Kuliah')
@section('content')

    
@if(session('success'))
<div class="alert alert-success mb-3">
    {{ session('success') }}
</div>
@endif
<a href="/jadwalkuliah/tambah" class="btn btn-success ">Tambah Data</a>
<table class="table mt-4">
    <tr class="table-light">
        <th scope="col">No</th>
        <th scope="col">Mata Kuliah</th>
        <th scope="col">SKS</th>
        <th scope="col">Hari</th>
        <th scope="col">Mulai</th>
        <th scope="col">Selesai</th>
        <th scope="col">Ruangan</th>
        <th scope="col">Aksi</th>
    </tr>
    
   
     @php
       $no=1; 
    @endphp 
   
    @foreach ($jadwal as $item)

 
<div class="modal fade" id="deleteModal{{$item->id_jadwal}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="/jadwalkuliah/delete/{{$item->id_jadwal}}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
    
        <tr>
            <td>{{$no}}</td>
            <td>{{$item->MataKuliah->nama}}</td>
            <td>{{$item->MataKuliah->sks}}</td>
            <td>{{$item->hari}}</td>
            <td>{{$item->jam_mulai}}</td>
            <td>{{$item->jam_selesai}}</td>
            <td>{{$item->ruangan}}</td>
            <td>
                <a href="/jadwalkuliah/edit/{{$item->id_jadwal}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>
                </a>
                
                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$item->id_jadwal}}"><i class="fas fa-trash-alt"></i></a>

            </td>
        </tr>
    @php
        $no++;
    @endphp
 
    @endforeach 
</table>



@endsection