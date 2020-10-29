@extends('layouts.app')

@section('title', 'cobaaa')

@section('content')
<div class='card'>
    <div class='cardbody'>
        <h3> Nama Teman :{{ $friend['nama'] }} </h3>
        <h3> No Telp :{{ $friend['no_tlp'] }} </h3>
        <h3> Alamat :{{ $friend['alamat'] }} </h3>
    </div>
</div>
@endsection
