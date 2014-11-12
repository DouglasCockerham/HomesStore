<?php namespace HomesStore\Account\Controllers;

class ProfileController extends \BaseController {

    public function user($email) {

        $user = \User::where('email', '=', $email);

        if($user->count()) {
            $user = $user->first();
            return \View::make('profile.user')
                    ->with('user', $user);
        }

        return \App::abort(404);

    }

}