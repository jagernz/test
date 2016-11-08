@extends('layouts.index')

  @section('content')

    <div class="container">
      <ul class="list-group">
            <li class="list-group-item">Достали из базы {{$user->id}}-го юзера с именем {{$user->name}}</li>
      </ul>
    </div>

@endsection