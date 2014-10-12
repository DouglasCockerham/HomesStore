<?php

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
    'uses'  => 'HomeController@postContactMessage'
));

// Authenticated group
Route::group(array('before' => 'auth'), function() {

    // CSRF Protection Group
    Route::group(array('before' => 'csrf'), function() {

        // Change password (POST)
        Route::post('/account/change-password', array(
            'as'    => 'account-change-password-post',
            'uses'  => 'AccountController@postChangePassword'
        ));

    });

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
Route::group(array('before' => 'guest'), function() {

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