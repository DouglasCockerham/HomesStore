<?php

class ContactMessageController extends \BaseController {

    public function postContactMessage() {

        $validator = Validator::make(Input::all(),
            array(
                'email'     => 'required|email|max:255',
                'name'      => 'required|max:255',
                'phone'     => 'numeric',
                'message'   => 'required|max:4000'
            )
        );

        if($validator->fails()) {
            // If failure, show form with previous input and validation errors
            return Redirect::route('contact')
                ->withErrors($validator)
                ->withInput();
        } else {
            // If passes, save message info

            // escape form input and save to local variables
            $email              = e(Input::get('email'));
            $name               = e(Input::get('name'));
            $phone              = e(Input::get('phone'));
            $originalMessage    = e(Input::get('message'));
            $active             = 1;
            $user_id            = '';

            // If users is logged in, get their userID to pass to the database
            if(Auth::check()) {
                $user_id        = Auth::user()->id;
            }

            // Save the contact message to the database
            $contactMessage = Contact_Message::create(array(
                'given_email'       => $email,
                'given_name'        => $name,
                'given_phone'       => $phone,
                'given_message'     => $originalMessage,
                'active'            => $active,
                'user_id'           => $user_id
            ));

            // If save successful, email user a confirmation
            if($contactMessage) {
                // Send email
                Mail::send('emails.contact.contact_message', array(
                    'name'      => $contactMessage->given_name,
                    'message'   => $contactMessage->given_message
                ), function($message) use($contactMessage) {
                    $message->to($contactMessage->given_email, $contactMessage->given_name)->subject('Message Received');
                });

                // redirect back to Contact page with an overlay (modal) message
                return Redirect::route('contact')
                    ->with(Flash::overlay('We will be in touch with you very soon.  Be sure to check your email.', 'Your message was sent'));

            }

        }

    }

}