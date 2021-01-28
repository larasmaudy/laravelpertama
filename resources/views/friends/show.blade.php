@extends('layouts.app')

@section('title', 'cobaaa')

@section('content')
<div class='card'>
    <div class='cardbody'>
        <h3> Nama Teman :{{ $friends['nama'] }} </h3>
        <h3> No Telp :{{ $friends['persediaan'] }} </h3>
        <h3> Alamat :{{ $friends['harga'] }} </h3>
    </div>
</div>
@endsection
