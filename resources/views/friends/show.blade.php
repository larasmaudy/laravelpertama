@extends('layouts.app')

@section('title', 'cobaaa')

@section('content')
<div class='card'>
    <div class='cardbody'>
        <h3> Nama Teman :{{ $friends['nama'] }} </h3>
        <h3> No Telp :{{ $friends['notlp'] }} </h3>
        <h3> Alamat :{{ $friends['alamat'] }} </h3>
    </div>
</div>
@endsection
