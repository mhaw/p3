@extends('_master')

@section('title')
	Mike&#39;s Dev Toolkit - Lorem Text
@stop

@section('head')

@stop

@section('content')
	<img class='logo' img src="assets/lorem.png" alt="text">
	<h2>Sample Text</h1>

		<!-- Insert generated lorem text here -->
	<p class="bg-success">

		{{ $para_final }}
	</p>

	{{ Form::open(array('url' => '/lorem', 'method' => 'POST')) }}

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
		{{ Form::submit('Generate'); }}
		

	{{ Form::close() }}

@stop
