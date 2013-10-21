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
Route::group(array('before' => 'emailCheck'), function(){

	Route::get('/', function() {
		$view = View::make('lifts-table');
		$view->lifters = User::whoHaveLifts();

		return $view;
	});


	Route::get('register', function() {
		return View::make('register');
	});

	Route::post('register', function() {
		$form = new RegistrationForm(Input::all());

		if ($form->save()) {
			return View::make('register-success');
		}

		return Redirect::to('/register')->withErrors($form->validator);
	});



	Route::get('login', function() {
		return View::make('login');
	});

	Route::post('login', function() {
		$credentials = array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
			);

		if (Auth::attempt($credentials)) {
			return Redirect::intended('/');
		}

		return Redirect::to('login')->withErrors(array('login' => 'Invalid credentials.'));
	});


	Route::any('logout', function() {
		Auth::logout();
		return Redirect::to('/');
	});

	Route::get('forgot-password', function() {
		return View::make('forgot-password');
	});

	Route::post('forgot-password', function() {
		$credentials = array('username' => Input::get('username'));

		$user = User::whereUsername(Input::get('username'))->first();

		if (! $user) {
			return Redirect::to('forgot-password')->withErrors(array('username' => 'Sorry, it doesn\'t look like anyone is registered with that username!'));
		}

		if (! $user->email) {
			return Redirect::to('forgot-password')->withErrors(array('username' => 'We don\'t have an email address on file for you, yikes!'));
		}

		return Password::remind($credentials, function($message) {
			$message->subject('Starting Strength Lifter Rankings Password Reset');
		});
	});

	Route::get('password/reset/{token}', function($token) {
		return View::make('password-reset')->with('token', $token);
	});

	Route::post('password/reset/{token}', function()
	{
		$email = User::whereUsername(Input::get('username'))->first()->email;
		$credentials = array('email' => $email);

		return Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();

			return Redirect::to('/');
		});
	});

	Route::group(array('before' => 'auth'), function() {
		Route::get('update-lifts', function() {
			$view = View::make('update-lifts');
			$view->squatVariations = Lift::whereName('Squat')->first()->variations->lists('name', 'id');
			$view->benchVariations = Lift::whereName('Bench Press')->first()->variations->lists('name', 'id');
			$view->deadliftVariations = Lift::whereName('Deadlift')->first()->variations->lists('name', 'id');
			$view->pressVariations = Lift::whereName('Press')->first()->variations->lists('name', 'id');

			return $view;
		});

		Route::post('update-lifts', function() {
			$form = new UpdateLiftsForm(Input::all(), Auth::user());

			if ($form->save()) {
				return Redirect::to('/');
			}

			return Redirect::to('/update-lifts')->withErrors($form->validator);
		});



	});
});

Route::get('add-email-address', array('before' => 'auth', function() {
	return View::make('add-email-address');
}));

Route::post('add-email-address', array('before' => 'auth', function() {
	$email = Input::get('email');

	$validation = Validator::make(
		array('email' => $email), 
		array('email' => 'required|email')
		);

	if ($validation->fails()) {
		return Redirect::to('add-email-address')->withErrors('email', 'Please enter a valid email.');
	}

	$user = Auth::user();
	$user->email = $email;
	$user->save();

	return Redirect::intended('/');
}));
