@extends('layouts.user')
@section ('title','Jadwal Kuliah')
@section ('acJadkul', 'active')
@section ('user', $datalogin['nama'])

@section('navbar')
@parent 
@endsection


@section ('content')
<h4 class="mt-5 mb-3">Jadwal Kuliah</h4>


<table class="table mt-4">
    <tr class="table-light">
        <th scope="col">Mata Kuliah</th>
        <th scope="col">SKS</th>
        <th scope="col">Hari</th>
        <th scope="col">Jam</th>
        <th scope="col">Ruangan</th>
        
    </tr>
    
   
 
   
    @foreach ($jadwal as $item)

    
        <tr>
            <td>{{$item->MataKuliah->nama}}</td>
            <td>{{$item->MataKuliah->sks}}</td>
            <td>{{$item->hari}}</td>
            <td>{{\Carbon\Carbon::parse($item->jam_mulai)->format('H:i')}} s/d {{\Carbon\Carbon::parse($item->jam_selesai)->format('H:i')}}</td>
            <td>{{$item->ruangan}}</td>
            
        </tr>

 
    @endforeach 
</table>
@endsection
