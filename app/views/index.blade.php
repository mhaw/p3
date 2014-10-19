@extends('_master')

@section('title')
	Mike&#39;s Dev Toolkit
@stop

@section('head')

@stop
@section('intro')
	Welcome to my developer toolkit. Here you will find tools to assist with generating placeholder text, creating sample user profiles, and generating secure passwords.
@stop
	
@section('lorem')
	{{ Form::open(array('url' => '/lorem', 'method' => 'GET')) }}

		{{ Form::label('number_para','Number of Paragraphs') }}
		{{ Form::text('number_para'); }}
		<br>
		{{ Form::label('length','Paragraph Length') }}
		<br>
		{{ Form::label('length','Long') }}
		{{ Form::radio('length', 'Long'); }}
		<br>
		{{ Form::label('length','Medium') }}
		{{ Form::radio('length', 'Medium'); }}
		<br>
		{{ Form::label('length','Short') }}
		{{ Form::radio('length', 'Short'); }}
		<br>
		{{ Form::label('meatify','Meatify') }}
		{{ Form::checkbox('meatify', 'Yes'); }}
		<br>
		{{ Form::submit('Generate'); }}

	{{ Form::close() }}

@stop

@section('users')

	{{ Form::open(array('url' => '/users', 'method' => 'GET')) }}

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

@stop

@section('pass')

@stop

