@extends('layouts.app')

@section('title', friends')

@section('content')

<form action="/friends" method="POST">
    @scrf
  <div class="form-group">
    <label for="exampleInputNama">Nama</label>
    <input type="text" class="form-control" id="exampleInputNama" name="nama" aria-describedby="emailHelp"> 
  </div>
  <div class="form-group">
    <label for="exampleInputNotlp">No Telepon</label>
    <input type="text" class="form-control" name="no_tlp" id="exampleInputNotlp">
  </div>
  <div class="form-group">
    <label for="exampleInputAlamat">Alamat</label>
    <input type="text" class="form-control" name="alamat" id="exampleInputAlamat">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection