@extends('_master')

@section('title')
	Mike&#39;s Dev Toolkit - Lorem Text
@stop

@section('head')

@stop

@section('content')
	<img class='logo' img src="assets/lorem.png" alt="text">
	<h2>Sample Text</h2>

		<!-- Insert generated lorem text here -->
	<p class="bg-success">

		@if (isset($errors))
			@foreach ($errors->all() as $error)
				{{ $error }}		
			@endforeach	
		@endif

		@if(isset($para_final))
		{{ $para_final }}
		@endif
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
