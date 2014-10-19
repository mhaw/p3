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

//Lorem App
Route::get('/lorem', function()
{
	

	$generator = new Badcow\LoremIpsum\Generator();
	$paragraphs = $generator->getParagraphs(5);
	echo implode('<p>', $paragraphs);

	return 'Lorem Ipsum Generator';


});


//User App
Route::get('/users', function()
{
	$num = 25;
	$birth = 1; 
	$email = 1;
	$profile = 1;
	$fname_arr = file(app_path().'/database/first.txt');
	$lname_arr = file(app_path().'/database/last.txt');
	$domain_arr = file(app_path().'/database/domains.txt');

	for($i = 0; $i < $num; $i++)
	{
		$rand_num1 = rand(0, count($fname_arr)-1);
		$fname = rtrim($fname_arr[$rand_num1]);

		$rand_num2 = rand(0, count($lname_arr)-1);
		$lname = rtrim($lname_arr[$rand_num2]);

		$name = ucwords(strtolower($fname . " " . $lname));

		if($birth = 1)
		{
			$month = rand(1, 12);
			//to-do: make accurate to days in the selected days in a given month
			$day = rand(1, 28); 
			$year = rand(1950, 2005);

			$birthday = $month . "/" . $day . "/" . $year;
		}

		if($email = 1)
		{
			$email_name = strtolower(substr($fname, 0).$lname);
			$email_domain = rtrim($domain_arr[rand(0, count($domain_arr)-1)]);
			$email_add = $email_name."@".$email_domain;
		}
		if($profile = 1)
		{
				$prof_generator = new Badcow\LoremIpsum\Generator();
				$prof_text = implode($prof_generator->getSentences(rand(1, 3)));

		}

		echo $name;
		echo "<br>";
		echo $birthday;
		echo "<br>";
		echo $email_add;
		echo "<br>";
		echo $prof_text;
		echo "<br>";
		echo "<br>";
	}

});

//Display Lorem Results
Route::get('/lorem/results', function() {

});

// Display User Results
Route::get('/user/results', function() {

    return 'User Results';

});

