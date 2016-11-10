<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test</title>
	<link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>

<body>
<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="">Учет рабочего времени</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">

			<ul class="nav navbar-nav">
				<li><a class="disabled" href="">Привет, {{Auth::user()->name}}</a></li>
			</ul>

			<ul class="nav navbar-nav">
				<li><a href=>Серверное время: {{ $now }}</a></li>
			</ul>

			<ul class="nav navbar-nav">
				<li class="active"><a href="{{ url('/users') }}">Пользователи</a></li>
			</ul>

			<ul class="nav navbar-nav">
				<li><a href="{{ url('/statistic') }}">Статистика</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="/logout">Выйти</a></li>
			</ul>

		</div><!--/.nav-collapse -->
	</div>
</nav>

<div class="container">
	@yield('content')
</div>

<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
