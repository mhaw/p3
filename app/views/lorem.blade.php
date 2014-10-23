@extends('_master')

@section('title')
	Mike&#39;s Dev Toolkit - Lorem Text
@stop

@section('head')

@stop

@section('content')
	<img class='logo' src="assets/lorem.png" alt="text">
	<h2>Sample Text</h2>

		<!-- Insert generated lorem text here -->
	<p class="bg-danger">

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
		{{ Form::label('length','Long', ['for' => '1']) }}
		{{ Form::radio('length', 'Long', false, ['id' => '1']); }}
		<br>
		{{ Form::label('length','Medium', ['for' => '2']) }}
		{{ Form::radio('length', 'Medium', true, ['id' => '2']); }}
		<br>
		{{ Form::label('length','Short', ['for' => '3']) }}
		{{ Form::radio('length', 'Short', false, ['id' => '3']); }}
		<br>
		{{ Form::submit('Generate'); }}
		
	{{ Form::close() }}

@stop
