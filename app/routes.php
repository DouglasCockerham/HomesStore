<?php

use \HomesStore\Notifications\Flash;

Route::get('support/create', 'SupportController@create');
Route::post('support/store', 'SupportController@store');


Route::get('/', array(
    'as'    => 'home',
    'uses'  => 'HomeController@home'
));

Route::get('contact', array(
    'as'    => 'contact',
    'uses'  => 'HomeController@contact'
));

// Send Contact Message
Route::post('sendContactMessage', array(
    'as'    => 'send-contact-message',
    'uses'  => 'ContactMessageController@postContactMessage'
));

// Authenticated group
Route::group(array('before' => 'auth', 'namespace' => 'HomesStore\Account\Controllers'), function() {

    if (Auth::user()) {
        $user = Auth::user();
        $user->last_active = new DateTime;
        $user->save();
    }

    // CSRF Protection Group
    Route::group(array('before' => 'csrf'), function() {

        // Change password (POST)
        Route::post('/account/change-password', array(
            'as'    => 'account-change-password-post',
            'uses'  => 'AccountController@postChangePassword'
        ));

    });

    Route::get('phpinfo', function() {
        return 'doug' . phpinfo();
    })->before('role:AppAdministator' || 'role:AppOwner');

    // Change password (GET)
    Route::get('/account/change-password', array(
        'as'    => 'account-change-password',
        'uses'  => 'AccountController@getChangePassword'
    ));

    // Sign out (GET)
    Route::get('/account/sign-out', array(
        'as'    => 'account-sign-out',
        'uses'  => 'AccountController@getSignOut'
    ));

    // Show user profile page
    Route::get('/user/{email}', array(
        'as'    => 'profile-user',
        'uses'  => 'ProfileController@user'
    ));

});

 // Unauthenticated group
Route::group(array('before' => 'guest', 'namespace' => 'HomesStore\Account\Controllers'), function() {

    // CSRF protection (cross-site request forgery) group
    Route::group(array('before' => 'csrf'), function() {
        // Create account (POST)
        Route::post('/account/create', array(
            'as'    => 'account-create-post',
            'uses'  => 'AccountController@postCreate'
        ));

        // Sign in (POST)
        Route::post('/account/signin', array(
            'as'    => 'account-sign-in-post',
            'uses'  => 'AccountController@postSignIn'
        ));

        // Forgot password (POST)
        Route::post('/account/forgot-password', array(
            'as'    => 'account-forgot-password-post',
            'uses'  => 'AccountController@postForgotPassword'
        ));

    });

    // Forgot password (GET)
    Route::get('/account/forgot-password', array(
        'as'    => 'account-forgot-password',
        'uses'  => 'AccountController@getForgotPassword'
    ));

    // Recover password (GET)
    Route::get('/account/recover/{code}', array(
        'as'    => 'account-recover',
        'uses'  => 'AccountController@getRecover'
    ));

    // Sign in (GET)
    Route::get('/account/signin', array(
        'as'    => 'account-sign-in',
        'uses'  => 'AccountController@getSignIn'
    ));

    // Create account (GET)
    Route::get('/account/create', array(
        'as'    => 'account-create',
        'uses'  => 'AccountController@getCreate'
    ));
    // Activate account(GET)
    Route::get('/account/activate/{code}', array(

        'as'    => 'account-activate',
        'uses'  => 'AccountController@getActivate'

    ));

});

    // Admin area - access by admins and up only!!!!
//    Route::get('/admin/contactmessages', array(
//       'as'     => 'show-contact-messages',
//       'uses'   => 'AdminController@getContactMessages'
//    ))->before('role:administrator');
    Route::get('reports', function()
    {
        return 'Super secret reporting area!!!!';
    })->before('role:administrator');

    Route::get('/admin/reports/monthly_solds_rru', array(
        'as'    => 'admin-report-monthly-solds',
        'uses'  => 'AdminController@getReport'
    ));

    Route::post('/admin/reports/monthly_solds_rru', function()
    {
       return Input::get('dateFrom');
    });

    Route::get('/PropertyDetails/{MLSNumber}', array(
        'as'    => 'PropertyDetails',
        'uses'  => 'HomesStore\MLS\Controllers\MLSController@showAllFields'
    ));

    Route::get('/PropertyDetails/Civic/{MLSNumber}', array(
        'as'    => 'PropertyDetails-Civic',
        'uses'  => 'HomesStore\MLS\Controllers\MLSController@showCivicFields'
    ));

    Route::get('/PropertyDetails/Coorindates/{MLSNumber}', array(
        'as'    => 'PropertyDetails-Coordinates',
        'uses'  => 'HomesStore\MLS\Controllers\MLSController@showCoordinates'
    ));

    Route::get('login/fb', function() {
        $facebook = new Facebook(Config::get('facebook'));
        $params = array(
            'appId'         => $_ENV('FACEBOOK_APP_ID'),
            'secret'        => $_ENV('FACEBOOK_APP_SECRET'),
            'redirect_uri'  => url('/login/fb/callback'),
            'scope'         => 'email',
        );

        dd($params);

        return Redirect::to($facebook->getLoginUrl($params));
    });

    Route::get('login/fb/callback', function() {
        $code = Input::get('code');
        if (strlen($code) == 0) return Redirect::to('/')->with(Flash::error('There was an error communicating with Facebook'));

        $facebook = new Facebook(Config::get('facebook'));
        $uid = $facebook->getUser();

        if ($uid == 0) return Redirect::to('/')->with(Flash::error('There was an error'));

        $me = $facebook->api('/me');

        dd($me);

    });