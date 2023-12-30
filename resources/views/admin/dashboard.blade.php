@extends('layouts.admin')
@section('Dashactive', 'active')
@section ('nama', $datalogin['nama'])
@section('title', 'Dashboard')
@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Mata Kuliah</h5>
                    <h2 class="card-text ">{{ $cmatkul }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Tugas</h5>
                    <h2 class="card-text ">{{ $ctugas }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Informasi</h5>
                    <h2 class="card-text ">{{ $cinfo }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Jadwal kuliah</h5>
                    <h2 class="card-text ">{{ $cjadwal }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">User</h5>
                    <h2 class="card-text ">{{ $cuser }}</h2>
                </div>
            </div>
        </div>

    
    </div>


    
@endsection