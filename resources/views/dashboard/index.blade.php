@extends('layouts.dashboard')

@section('content')

	<div class="container">

		<table class="table">
			<thead>
			<tr>
				<th>ID</th>
				<th>Имя</th>
				<th>E-mail</th>
				<th>Дата регистрации</th>
				<th>Последний вход</th>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody>

			@foreach($users as $user)
				<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->created_at}}</td>
				<td>{{$user->updated_at}}</td>
				<td><a href ='/admin/red/{{$user->id}}'>
						<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a></td>
				<td><a href ='/admin/del/{{$user->id}}'>
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
			</tr>
			@endforeach

			</tbody>
		</table>
	</div>.

@endsection