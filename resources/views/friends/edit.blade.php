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
        <input type="text" class="form-control" name="notlp" id="exampleInputNotlp" value="{{old('notlp') ? old('notlp') : $friends ['notlp'] }}">
        @error('notlp')
        <div class="alert alert-denger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputAlamat">alamat</label>
        <input type="text" class="form-control" name="alamat" id="exampleInputAlamat" value="{{old('alamat') ? old('alamat') : $friends['alamat'] }}">
        @error('alamat')
        <div class="alert alert-denger">{{$message}}</div>
        @enderror
    </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection