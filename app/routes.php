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

//Lorem App
Route::post('/lorem', function()
{
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

});


//User App
Route::post('/users', function()
{
	$num = $_POST["number_users"];

	$fname_arr = file(app_path().'/database/first.txt');
	$lname_arr = file(app_path().'/database/last.txt');
	$loc_arr = file(app_path().'/database/locations.txt');
	$domain_arr = file(app_path().'/database/domains.txt');

	if(isset($_POST["number_users"]) && $num > 0 && $num < 101) {
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
	}
	else $data_arr[] = "Please enter a number between 1 and 100.";

	return View::make('users')->with('users_final', $data_arr);
});


