@extends('layouts.app')

@section('title', 'Groups')

@section('content')

<a href="/groups/create" class="card-link btn-primary">Tambah Group</a>
@foreach ($groups as $group)

<div class="card" style="width; 18rem;">
  <div class="card-body">
    <a href="/groups/{{$group['id']}}/edit" class="card-title">{{ $group['name'] }}</a>
    <p class="card-text">{{ $group['description'] }}</p>
<hr>
<a href="/groups/addmember/{{$group['id']}}/edit" class="card-link btn-primary">Tambah Anggota Teman</a>
<ul class="list-group">
@foreach ($group->friends as $friend)

  <ll class="list-group-item d-flex justify-content-between align-items-center">
    {{$friend->nama}}
    <from action="/groups/deleteaddmember/{{ $friend->'id'}}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-danger">X</button>
    </form>
  </ll>

@endforeach
</ul>
<hr>
    <a href="/groups/{{$group['id']}}/edit" class="card-link btn-warning">Edit Group</a>
    <from action="/groups/{{ $group['id']}}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger">Delete Group</button>
    </form>
  </div>
</div>

@endforeach
<div>
{{ $groups->links()}}

</div>
@endsection