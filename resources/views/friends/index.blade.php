@extends('layouts.app')

@section('title','Friends')

@section('content')

@foreach ($friends as $friend)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/friends/{{$friend['id']}}" class="card-title">{{ $friend['nama'] }}</a>
    <h6 class="card-subtitle mb-2 text-muted">{{ $friend['persediaan'] }}</h6>
    <p class="card-text">{{ $friend['harga'] }}</p>

    <a href="/friends/{{$friend['id']}}/edit" class="card-link btn-warning">Edit</a>
    <form action="/friends/{{$friend['id']}}" method="POST">
    
    @method('DELETE')
    <button class="card-link btn-danger">Delete</a>
    </form>
  </div>
</div>

@endforeach
<div> 
    {{ $friends->links()}}
</div> 
@endsection
