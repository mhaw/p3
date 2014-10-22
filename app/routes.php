<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Introduction
Route::get('/', function()
{
	return View::make('index');
});

Route::get('/lorem', function()
{
	return View::make('lorem')->with('para_final');
});

Route::get('/users', function()
{
	return View::make('users')->with('users_final');
});

Route::get('/password', function()
{
	return View::make('password')->with('passwordfinal');
});

//Lorem App
Route::post('/lorem', function()
{
	$rules = array('number_para' => array('required', 'min:1', 'max:20', 'numeric'));

	$validator = Validator::make(Input::all(), $rules);

	if ($validator->fails()) {
		$messages = $validator->messages();

		return Redirect::to('/lorem')->withErrors($validator);

	}
	else {

	$number_para = $_POST["number_para"];
	$para_length = $_POST["length"];
	$generator = new Badcow\LoremIpsum\Generator();

	if($number_para > 0 && $number_para < 25) {
		if($para_length == "Long")
		{
			$generator->setParagraphMean(5.8);
			$generator->setParagraphStDev(1.93);
		}
		if($para_length == "Medium")
		{
			$generator->setParagraphMean(3.8);
			$generator->setParagraphStDev(1.23);
		}
		if($para_length == "Short")
		{
			$generator->setParagraphMean(1.8);
			$generator->setParagraphStDev(0.8);
		}

		$paragraphs = $generator->getParagraphs($number_para);
	}
	else $paragraphs = "Please enter a number between 1 and 25.";
	
	$para_final = implode('<br><br>', $paragraphs);

	return View::make('lorem')->with('para_final', $para_final);

	}
});


//User App
Route::post('/users', function()
{
	
   	$rules = array('number_users' => array('required', 'min:1', 'max:99', 'numeric'));

	$validator = Validator::make(Input::all(), $rules);

	if ($validator->fails()) {
		$messages = $validator->messages();

		return Redirect::to('/users')->withErrors($validator);

	}
	else {

	$num = $_POST["number_users"];

	$fname_arr = file(app_path().'/database/first.txt');
	$lname_arr = file(app_path().'/database/last.txt');
	$loc_arr = file(app_path().'/database/locations.txt');
	$domain_arr = file(app_path().'/database/domains.txt');


	for($i = 0; $i < $num; $i++)
	{
		$rand_num1 = rand(0, count($fname_arr)-1);
		$fname = rtrim($fname_arr[$rand_num1]);

		$rand_num2 = rand(0, count($lname_arr)-1);
		$lname = rtrim($lname_arr[$rand_num2]);

		$name = ucwords(strtolower($fname . " " . $lname));

		$data_arr[$i]["Name"] = $name;

		if(isset($_POST["bday"]))
		{
			$month = rand(1, 12);
			//to-do: make accurate to days in the selected days in a given month
			$day = rand(1, 28); 
			$year = rand(1950, 2005);

			$birthday = $month . "/" . $day . "/" . $year;
			$data_arr[$i]["Birthday"] = $birthday;
		}

		if(isset($_POST["email"]))
		{
			$email_name = strtolower(substr($fname, 0).$lname);
			$email_domain = rtrim($domain_arr[rand(0, count($domain_arr)-1)]);
			$email_add = $email_name."@".$email_domain;
			$data_arr[$i]["Email"] = $email_add;
		}

		if(isset($_POST["location"]))
		{
			$loc = rtrim($loc_arr[rand(0, count($loc_arr)-1)]);
			$data_arr[$i]["Location"] = $loc;
		}

		if(isset($_POST["profile"]))
		{
				$prof_generator = new Badcow\LoremIpsum\Generator();
				$prof_text = implode($prof_generator->getSentences(rand(1, 3)));
				$data_arr[$i]["Profile"] = $prof_text;
		}

	}

	return View::make('users')->with('users_final', $data_arr);
	}
});

Route::post('/password', function()
{
	
	$rules = array('number_words' => array('required', 'min:1', 'max:8', 'numeric'));

	$validator = Validator::make(Input::all(), $rules);

	if ($validator->fails()) {
		$messages = $validator->messages();

		return Redirect::to('/password')->withErrors($validator);

	}
	else {

	$numwords = $_POST["number_words"];

	$words = file(app_path().'/database/words.txt');

	$sym = '';
	$num = '';

	//logic to customize separator type
	if(isset($_POST["seperator"])) {
		$septype = $_POST["seperator"];

		if($septype == 'H'){
			$separator = '-';
		}
		if($septype == 'U') {
			$separator = '_';
		}
		if($septype == 'S') {
			$separator = ' ';
		}
	}

	//logic to pick and insert random symbol
	if(isset($_POST["symbol"])) {
		$available_symbols = array('!', '@', '#', '$', '%', '&');
		shuffle($available_symbols);
		$sym = $available_symbols[0];
	}
	else $sym = '';

	//insert a number from
	if(isset($_POST["number"])) {
		$num = rand(0,9);
	}
	else $num = '';

	for ($i=0; $i < $numwords; $i++) {
		$rand_num = rand(0, count($words)-1);
		$pass_words[$i] = rtrim($words[$rand_num]);
	}

	$seperated_words = implode($separator, $pass_words);

	if(isset($_POST["upper"])) {
		$seperated_words = strtoupper($seperated_words);
	}

	$fpass = $seperated_words.$num.$sym;

	return View::make('password')->with('passwordfinal', $fpass);
}
});

