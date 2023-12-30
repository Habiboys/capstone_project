@extends('layouts.admin')
@section('Tugasactive', 'active')
@section ('nama', $datalogin['nama'])
@section('title', 'Daftar Tugas')
@section('content')

    @if(session('success'))
    <div class="alert alert-success mb-3">
        {{ session('success') }}
    </div>
    @endif
    <a href="/daftartugas/tambah" class="btn btn-success ">Tambah Data</a>
    <table class="table mt-4">
        <tr class="table-light">
            <th scope="col">No</th>
            <th scope="col">Tugas</th>
            <th scope="col">Matakuliah</th>
            <th scope="col">Deadline</th>
            <th scope="col">Instruksi</th>
            <th scope="col">Aksi</th>
           
        </tr>
        
        @php
           $no=1; 
        @endphp
       
        @foreach ($tugas as $item)
        {{-- Modal --}}
        <div class="modal fade" id="deleteModal{{$item->id_tugas}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                      <a href="/daftartugas/delete/{{$item->id_tugas}}" class="btn btn-danger">Hapus</a>
                  </div>
              </div>
          </div>
      </div>
      <div class="modal fade" id="instruksiModal{{$item->id_tugas}}" tabindex="-1" role="dialog" aria-labelledby="instruksiModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="instruksiModalLabel">Instruksi Tugas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{$item->instruksi}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    
                </div>
            </div>
        </div>
    </div>

    
        
            <tr>
                <td>{{$no}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->Matakuliah->nama}}</td>
                <td>{{$item->deadline}}</td>
                <td><a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#instruksiModal{{$item->id_tugas}}"><i class="far fa-eye"></i></a></td>
                <td>
                    
                    <a href="/daftartugas/edit/{{$item->id_tugas}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    
                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$item->id_tugas}}"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        @php
            $no++;
        @endphp
        @endforeach  
    </table>
    

   

    
@endsection