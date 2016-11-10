@extends('layouts.dashboard')

@section('content')
<hr>

	<form class="form-horizontal" method="post" action="{{ url('/register')  }}">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="inputName" class="col-sm-2 control-label">Имя</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" id="inputName" placeholder="Имя" name="name">
			</div>
		</div>

		<div class="form-group">
			<label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-3">
				<input type="email" class="form-control" id="inputEmail" placeholder="E-mail" name="email">
			</div>
		</div>

		<div class="form-group">
			<label for="inputPass" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-3">
				<input type="password" class="form-control" id="inputPass" placeholder="Пароль" name="password">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-primary">Добавить</button>
			</div>

		</div>
	</form>

<hr>

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
					<td><a href ='/admin/red/{{$user->id}}'><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a></td>
					<td><a href ='/admin/del/{{$user->id}}'><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
				</tr>
			@endforeach

			</tbody>
		</table>
	</div>.

@endsection