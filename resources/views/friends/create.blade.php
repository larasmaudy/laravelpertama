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
    <label for="exampleInputNotlp">Persediaan</label>
    <input type="text" class="form-control" name="persediaan" id="exampleInputNotlp" value="{{old('persediaan')}}">
    @error('persediaan')
    <div class="alert alert-denger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputAlamat">Harga</label>
    <input type="text" class="form-control" name="harga" id="exampleInputAlamat">
    @error('harga')
    <div class="alert alert-denger">{{$message}}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection