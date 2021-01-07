@extends('layouts.app')

@section('title', 'friends')

@section('content')

<form action="/friends/{{ $friend['id'] }}" method="POST">
@csrf
@method('PUT')

    <div class="form-group">
        <label for="exampleInputNama">Nama</label>
        <input type="text" class="form-control" id="exampleInputNama" name="nama" aria-describedby="emailHelp"> val
        @error('nama')
        <div class="alert alert-denger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputNotlp">No Tlpn</label>
        <input type="text" class="form-control" name="Persediaan" id="exampleInputNotlp" value="{{old('Persediaan') ? old('Persediaan') : $friend['Persediaan'] }}">
        @error('Persediaan')
        <div class="alert alert-denger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputAlamat">harga</label>
        <input type="text" class="form-control" name="harga" id="exampleInputAlamat" value="{{old('harga') ? old('harga') : $friend['harga'] }}">
        @error('harga')
        <div class="alert alert-denger">{{$message}}</div>
        @enderror
    </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


@endsection