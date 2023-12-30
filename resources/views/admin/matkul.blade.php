@extends('layouts.admin')
@section('Matkulactive', 'active')
@section ('nama', $datalogin['nama'])
@section('title', 'Mata Kuliah')
@section('content')

    @if(session('success'))
    <div class="alert alert-success mb-3">
        {{ session('success') }}
    </div>
    @endif
    <a href="/matakuliah/tambahmatkul" class="btn btn-success ">Tambah Data</a>
    <table class="table mt-4">
        <tr class="table-light">
            <th scope="col">No</th>
            <th scope="col">Kode</th>
            <th scope="col">Matakuliah</th>
            <th scope="col">Semester</th>
            <th scope="col">SKS</th>
            <th scope="col">Dosen Pengampu</th>
            <th scope="col">Aksi</th>
        </tr>
        
       
        @php
           $no=1; 
        @endphp
       
        @foreach ($matkul as $item)

        <!-- Modal -->
    <div class="modal fade" id="deleteModal{{$item->kode_matkul}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                    <a href="/matakuliah/delete/{{$item->kode_matkul}}" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
        
            <tr>
                <td>{{$no}}</td>
                <td>{{$item->kode_matkul}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->semester}}</td>
                <td>{{$item->sks}}</td>
                <td>{{$item->dosen_pengampu}}</td>
                <td>
                    <a href="/matakuliah/editmatkul/{{$item->kode_matkul}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    
                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$item->kode_matkul}}"><i class="fas fa-trash-alt"></i></a>

                    {{-- <a href="/matakuliah/delete/{{$item->kode_matkul}}" class="btn btn-danger"  href="#" data-toggle="modal" data-target="#deletemodal">Hapus</a> --}}
                    {{-- <a href="{{ route('edit', $g->id) }}" class="btn btn-warning">Edit</a>
                    
                    <a href="{{ route ('delete', $g->id)}}" class="btn btn-danger">Hapus</a> --}}
                </td>
            </tr>
        @php
            $no++;
        @endphp
     
        @endforeach
    </table>
   


    
@endsection