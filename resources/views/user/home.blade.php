@extends('layouts.user')
@section ('title','home')
@section ('acHome', 'active')
@section ('user', $datalogin['nama'])

@section('navbar')
@parent 
@endsection

@section ('content')






<h4 class=" mt-5 mb-3">Pengumuman</h4>
@foreach ($info as $item)
    
<div class="card ">
    <div class="card-body">
        <h6 class="card-title">{{$item->title}}</h6>
        <p class="card-text">{{$item->isi}}.</p>
    </div>
</div>
@endforeach






@php
    $i=1;
@endphp
<h4 class=" mt-5 mb-3">Daftar Tugas</h4>
<div class="list-group mb-5">
    @if ($tugas->isEmpty())
    <p class="">Tidak ada tugas yang tersedia.</p>
@endif
    @foreach ($tugas as $item)
        <div class="list-group-item">
            <div class="row align-items-center">

                <div class="col-3">
                    {{ $item->nama }}
                    
                </div>
                <div class="col-3">
                    {{ $item->Matakuliah->nama}}
                </div>
                <div class="col-3">
                    Deadline: {{ date('d/m/y', strtotime($item->deadline)) }}
                </div>
                <div class="col-3 text-end">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$item->id_tugas}}">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#selesaiModal{{$item->id_tugas}}">
                        <i class="fas fa-check"></i>
                    </button>
                 </div>

            </div>
           
        </div>
        
        <!-- Modal Selesai -->
        <div class="modal fade" id="selesaiModal{{$item->id_tugas}}" tabindex="-1" aria-labelledby="selesaiModalLabel{{$item->id_tugas}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="selesaiModalLabel{{$item->id_tugas}}">Konfirmasi Selesai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin tugas ini sudah selesai?</p>
                    </div>
                    <div class="modal-footer">
                        
                        
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="/home/completed/{{$item->id_tugas}}" type="button" class="btn btn-success">Ya, Selesai</a>
                  
                    </div>
                </div>
            </div>
        </div>
 

        <!-- Modal Lihat Instruksi -->
        <div class="modal fade" id="modal{{$item->id_tugas}}" tabindex="-1" aria-labelledby="modalLabel{{$item->id_tugas}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel{{$item->id_tugas}}">{{ $item->nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p  style="text-align: justify;">{{ $item->instruksi }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        @php
    $i++;
@endphp
    @endforeach





<h4 class=" mt-5 mb-3">Tugas Selesai</h4>
<div class="list-group mb-5">
    @foreach ($com as $item)
        <div class="list-group-item">
            <div class="row align-items-center">

                <div class="col-3">
                    {{ $item->Tugas->nama }}
                    
                </div>
                <div class="col-3">
                    {{ $item->Tugas->Matakuliah->nama}}
                </div>
                <div class="col-3">
                    Deadline: {{ date('d/m/y', strtotime($item->Tugas->deadline)) }}
                </div>
                <div class="col-3 text-end">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$item->id_tugas}}">
                        <i class="fas fa-eye"></i>
                    </button>
        
                 </div>

            </div>
           
        </div>
        
        <!-- Modal Lihat Instruksi -->
        <div class="modal fade" id="modal{{$item->id_tugas}}" tabindex="-1" aria-labelledby="modalLabel{{$item->id_tugas}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel{{$item->id_tugas}}">{{ $item->Tugas->nama }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p  style="text-align: justify;">{{ $item->Tugas->instruksi }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

@endsection