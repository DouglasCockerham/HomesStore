<?php namespace HomesStore\Account\Controllers;

use \HomesStore\Notifications,View,BaseController,Redirect,Auth,Validator,Input,HomesStore\Notifications\Flash,User,Hash,Mail,URL;

class AccountController extends BaseController {

    public function getCreate() {
        return View::make('account.create');
    }

    public function postCreate() {
        $validator = Validator::make(Input::all(),
            array(
                'email'             => 'required|max:255|email|unique:users',
                'firstname'         => 'required|max:255',
                'lastname'          => 'required|max:255',
                'password'          => 'required|min:6',
                'verifyPassword'    => 'required|min:6|same:password'
            )
        );

        if($validator->fails()) {
            return Redirect::route('account-create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            // Create account
            $email          = Input::get('email');
            $firstname      = Input::get('firstname');
            $lastname       = Input::get('lastname');
            $password       = Input::get('password');
            $code           = str_random(60);   //activation code
            $user           = User::create(array(
                                                'email'         => $email,
                                                'name_first'    => $firstname,
                                                'name_last'     => $lastname,
                                                'password'      => Hash::make($password),
                                                'code'          => $code,
                                                'active'        => 0
                                            ));

            if($user) {

                // Send email
                Mail::send('emails.auth.activate', array(
                    'link'          => URL::route('account-activate', $code),
                    'firstname'     => $firstname
                ), function($message) use($user) {
                   $message->to($user->email, $user->firstanme)->subject('Activate your account');
                });
                return Redirect::home()
                        ->with(Flash::success('Account created. Please check your email.', 'bottom'));
            }

        }
    }

    public function getActivate($code) {
        $user = User::where('code', '=', $code)->where('active', '=', 0);

        if($user->count()) {
            $user = $user->first();

            // Update user to active state
            $user->active = 1;
            $user->code = '';
            if($user->save()) {
                return Redirect::home()
                        ->with(Flash::success('Your account is now active.', 'bottom'));
            }
        }

        return Redirect::home()
                ->with(Flash::error('We could not activate your account.'));
    }

    public function getSignIn() {
        return View::make('account.signin');
    }

    public function getSignOut() {
        Auth::logout();
        return Redirect::home();
    }

    public function postSignIn() {

        $validator = Validator::make(Input::all(),
            array(
                'email'     => 'required|max:255|email',
                'password'  => 'required',
            )
        );

        if($validator->fails()) {
            // Redirect to the sign-in page
            return Redirect::route('account-sign-in')
                    ->withErrors($validator)
                    ->withInput();
        } else {

            $remember = (Input::has('remember')) ? true : false;

            // Attempt user sign in
            $auth = Auth::attempt(array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password'),
                'active'    => 1
            ), $remember);

            if($auth) {
                // Redirect to the intended page
                return Redirect::intended('/');
            } else {
                return Redirect::route('account-sign-in')
                        ->with(Flash::error('Email/Password incorrect.','top'))
                        ->withInput();
            }
        }

        return Redirect::route('account-sign-in')
                ->with(Flash::error('There was a problem signing you in. Have you activated?'))
                ->withInput();

    }

    public function getChangePassword() {
        return View::make('account.password');
    }

    public function postChangePassword() {

        $validator = Validator::make(Input::all(),
            array(
                'oldPassword'       => 'required',
                'newPassword'       => 'required|min:6',
                'verifyPassword'    => 'required|same:newPassword'
            )
        );

        if($validator->fails()) {
            return Redirect::route('account-change-password')
                    ->withErrors($validator);
        } else {

            $user           = User::find(Auth::user()->id);
            $oldPassword    = Input::get('oldPassword');
            $newPassword    = Input::get('newPassword');

            if(Hash::check($oldPassword, $user->getAuthPassword())) {
                // Old password matches stored password
                $user->password = Hash::make($newPassword);

                if($user->save()) {
                    return Redirect::home()
                            ->with(Flash::success('Your password has been changed.', 'bottom'));
                }
            } else {
                return Redirect::route('account-change-password')
                    ->with(Flash::error('The old password is incorrect.'));
            }

        }
        return Redirect::route('account-change-password')
                ->with(Flash::error('Your password could not be changed.'));
    }

    public function getForgotPassword() {
        return View::make('account.forgot');
    }

    public function postForgotPassword() {
        $validator = Validator::make(Input::all(),
            array(
                'email' => 'required|email'
            )
        );

        if($validator->fails()) {
            return Redirect::route('account-forgot-password')
                    ->withErrors($validator)
                    ->withInput();
        } else {

            $user = User::where('email', '=', Input::get('email'));

            if($user->count()) {

                $user                   = $user->first();
                $code                   = str_random(60);
                $generatedPassword      = str_random(10);
                $user->code             = $code;
                $user->password_temp    = Hash::make($generatedPassword);

                if($user->save()) {
                    Mail::send('emails.auth.forgot',
                        array(
                            'link'          => URL::route('account-recover', $code),
                            'email'         => $user->email,
                            'newPassword'   => $generatedPassword
                        ),
                        function($message) use($user) {
                            $message->to($user->email, $user->firstanme)->subject('Password Reset');
                    });
                    return Redirect::home()
                            ->with(Flash::success('Your password has been reset. Check your email.', 'bottom'));
                }
            }
        }
        return Redirect::route('account-forgot-password')
                ->with(Flash::error('Could not request new password.'));
    }

    public function getRecover($code) {
        $user = User::where('code', '=', $code)
                ->where('password_temp', '!=', '');

        if($user->count()) {
            $user = $user->first();

            $user->password         = $user->password_temp;
            $user->password_temp    = '';
            $user->code             = '';

            if($user->save()) {
                return Redirect::home()
                        ->with(Flash::success('Now you can sign in with your new password.', 'bottom'));
            }
        }
    }

}