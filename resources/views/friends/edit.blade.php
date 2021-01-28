@extends('layouts.app')

@section('title', 'friends')

@section('content')

<form action="/friends/{{ $friends['id'] }}" method="POST">
@csrf
@method('PUT')

    <div class="form-group">
        <label for="exampleInputNama">Nama</label>
        <input type="text" class="form-control" name="nama" id="exampleInputNotlp" value="{{old('nama') ? old('nama') : $friends ['nama'] }}">
        @error('nama')
        <div class="alert alert-denger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputNotlp">No Tlpn</label>
        <input type="text" class="form-control" name="persediaan" id="exampleInputNotlp" value="{{old('persediaan') ? old('persediaan') : $friends ['persediaan'] }}">
        @error('persediaan')
        <div class="alert alert-denger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputAlamat">harga</label>
        <input type="text" class="form-control" name="harga" id="exampleInputAlamat" value="{{old('harga') ? old('harga') : $friends['harga'] }}">
        @error('harga')
        <div class="alert alert-denger">{{$message}}</div>
        @enderror
    </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection