@extends('layouts.user')
@section ('title','Mata Kuliah')
@section ('acMatkul', 'active')
@section ('user', $datalogin['nama'])
@section('navbar')
@parent 
@endsection

@section ('content')
<h4 class="mt-5 mb-3">Mata Kuliah</h4>

<table class="table mt-4">
        <tr class="table-light">
            <th scope="col">Kode</th>
            <th scope="col">Matakuliah</th>
            <th scope="col">SM</th>
            <th scope="col">SKS</th>
            <th scope="col">Pengampu</th>
            
        </tr>
        
       
   
       
        @foreach ($matkul as $item)

   
        
            <tr>
                <td>{{$item->kode_matkul}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->semester}}</td>
                <td>{{$item->sks}}</td>
                <td>{{$item->dosen_pengampu}}</td>
                
            </tr>

     
        @endforeach
    </table>
@endsection
