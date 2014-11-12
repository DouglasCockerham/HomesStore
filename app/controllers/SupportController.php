<?php

class SupportController extends \BaseController {

    function create()
    {
        return View::make('support.create');
    }

	public function store()
	{
		// get the post data
        $input = Input::all();

        // create UserVoice client
        $client = new \UserVoice\Client('homesstore',
                                        $_ENV['USERVOICE_API_KEY'],
                                        $_ENV['USERVOICE_SECRET']);

        $result = $client->post("/api/v1/tickets.json", array(
                'email'     => $input['email'],
                'ticket'    => array(
                        'state'     => 'open',
                        'subject'   => 'Support Request',
                        'message'   => $input['body']
                )
        ));

        // email message directly to tickets@homesstore.uservoice.com
//        Mail::queue('emails.support', Input::all(), function($message) use ($input)
//        {
//            $message->from($input['email']);
//            $message->to('tickets@homesstore.uservoice.com')
//                    ->subject('Support Request');
//
//        });
        return Redirect::home()
            ->with(
                Flash::success('Thank you for your support request. We will be in touch soon.', 'top')
            );
	}
}