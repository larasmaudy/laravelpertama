@extends('layouts.app')

@section('title', 'friends')

@section('content')

<form action="/friends" method="POST">
    @csrf
  <div class="form-group">
    <label for="exampleInputNama">Nama</label>
    <input type="text" class="form-control" id="exampleInputNama" name="nama" aria-describedby="emailHelp">
    @error('nama')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputNotlp">No Tlp</label>
    <input type="text" class="form-control" name="notlp" id="exampleInputNotlp" value="{{old('notlp')}}">
    @error('notlp')
    <div class="alert alert-denger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputAlamat">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputAlamat">
    @error('alamat')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection