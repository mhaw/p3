@extends('_master')

@section('title')
	Mike&#39;s Dev Toolkit - Users
@stop

@section('head')

@stop

@section('content')
	<img class='logo' img src="assets/user.png" alt="user">
	<h2>Sample Users</h1>

		<!-- Insert generated user information here -->
		<p class="bg-success">

		@foreach($users_final as $sampleuser => $user)
			{{ $user['Name']}}
			<br>
			@if (isset($user['Birthday']))
				{{$user['Birthday']}}
				<br>
			@endif
			@if (isset($user['Email']))
				{{$user['Email']}}
				<br>
			@endif
			@if (isset($user['Location']))
				{{$user['Location']}}
				<br>
			@endif
			@if (isset($user['Profile']))
				{{$user['Profile']}}
				<br>
			@endif
			<br>	
		@endforeach
		</p>

	{{ Form::open(array('url' => '/users', 'method' => 'POST')) }}

		{{ Form::label('number_users','Number of Sample Users') }}
		{{ Form::text('number_users'); }}
		<br>
		{{ Form::label('bday','Birthday') }}
		{{ Form::checkbox('bday', 'Yes'); }}
		<br>
		{{ Form::label('email','Email') }}
		{{ Form::checkbox('email', 'Yes'); }}
		<br>
		{{ Form::label('location','Location') }}
		{{ Form::checkbox('location', 'Yes'); }}
		<br>
		{{ Form::label('profile','Profile') }}
		{{ Form::checkbox('profile', 'Yes'); }}
		<br>
		{{ Form::submit('Generate'); }}
		<br>

@stop
