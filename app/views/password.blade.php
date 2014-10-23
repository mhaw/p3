@extends('_master')

@section('title')
	Mike&#39;s Dev Toolkit - Password
@stop

@section('head')

@stop

@section('content')
	<img class='logo' img src="assets/mono_password.png" alt="password">
	<h2>Secure Password</h2>

		

		<!-- Insert generated user information here -->
		<p class="bg-danger centered">

		@if (isset($errors))
		
			@foreach ($errors->all() as $error)
				{{ $error }}		
			@endforeach
		
		@endif

		@if(isset($passwordfinal))
			{{ $passwordfinal }}
			<br>	
		@endif

		</p>

	{{ Form::open(array('url' => '/password', 'method' => 'POST')) }}

		{{ Form::label('number_words','Number of Words') }}
		{{ Form::text('number_words'); }}
		<br>
		{{ Form::label('symbol','Include a Symbol') }}
		{{ Form::checkbox('symbol', 'Yes'); }}
		<br>
		{{ Form::label('number','Include a Number') }}
		{{ Form::checkbox('number', 'Yes'); }}
		<br>
		{{ Form::label('upper','All Uppercase') }}
		{{ Form::checkbox('upper', 'Yes'); }}
		<br>
		{{ Form::select('seperator', array('S' => 'Space', 'H' => 'Hypen', 'U' => 'Underscore'));}}
		<br>
		<br>
		{{ Form::submit('Generate'); }}
		
		<br>
	{{ Form::close() }}
@stop