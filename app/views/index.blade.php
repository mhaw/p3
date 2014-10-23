@extends('_master')

@section('title')
	Mike&#39;s Dev Toolkit
@stop

@section('head')

@stop

@section('content')
	<img class='logo' src="assets/toolbox.png" alt="toolbox">
	<h2>Welcome to Mike's Developer ToolKit!</h2>
	<p>I have created some simple tools that will assist
	your web development tasks by generating sample
	placeholder text, sample users, and strong passwords.</p>
	<p>I hope you find these tools helpful!</p>

	<br>
	<h3>Placeholder Text Generator</h3>
	<br>
	{{ Form::open(array('url' => '/lorem', 'method' => 'POST')) }}

		{{ Form::label('number_para','Number of Paragraphs') }}
		{{ Form::text('number_para', '', array('placeholder' => '# of Paragraphs')); }}
		<br>
		{{ Form::label('length','Paragraph Length') }}
		<br>
		{{ Form::label('length','Long') }}
		{{ Form::radio('length', 'Long', false, ['id' => '1']); }}
		<br>
		{{ Form::label('length','Medium') }}
		{{ Form::radio('length', 'Medium', true, ['id' => '2']); }}
		<br>
		{{ Form::label('length','Short') }}
		{{ Form::radio('length', 'Short', false, ['id' => '3']); }}
		<br>
		{{ Form::submit('Generate'); }}
		
	{{ Form::close() }}

	<br>
	<h3>Sample User Generator</h3>
	<br>

	{{ Form::open(array('url' => '/users', 'method' => 'POST')) }}

		{{ Form::label('number_users','Number of Sample Users') }}
		{{ Form::text('number_users', '', array('placeholder' => '# of Sample Users')); }}
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

	{{ Form::close() }}

	<br>
	<h3>Password Generator</h3>
	<br>

	{{ Form::open(array('url' => '/password', 'method' => 'POST')) }}

		{{ Form::label('number_words','Number of Words') }}
		{{ Form::text('number_words', '', array('placeholder' => '# of Words')); }}
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
		{{ Form::submit('Generate'); }}
		<br>

	{{ Form::close() }}

@stop
