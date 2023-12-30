@extends('layouts.admin')
@section('Infoactive', 'active')
@section ('nama', $datalogin['nama'])
@section('title', 'Informasi')
@section('content')
@if(session('success'))
<div class="alert alert-success mb-3">
    {{ session('success') }}
</div>
@endif
<a href="/informasi/tambahinfo" class="btn btn-success ">Tambah Data</a>
<table class="table mt-4">
    <tr class="table-light">
        <th scope="col">No</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Judul</th>
        <th scope="col">Isi</th>
        <th scope="col">Aksi</th>
    </tr>

  
    @php
       $no=1; 
    @endphp
   
    @foreach ($info as $item)

    <!-- Modal -->
<div class="modal fade" id="deleteModal{{$item->id_informasi}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                <a href="/informasi/delete/{{$item->id_informasi}}" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
    
        <tr>
            <td>{{$no}}</td>
            <td>{{$item->tanggal}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->isi}}</td>
            <td>
                <a href="/informasi/edit/{{$item->id_informasi}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$item->id_informasi}}"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
    @php
        $no++;
    @endphp
 
    @endforeach 
</table>
    
@endsection