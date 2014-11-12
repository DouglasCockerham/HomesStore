<?php

class SupportControllerTest extends TestCase {

    public function tearDown()
    {
        Mockery::close();
    }

    public function test_displays_form_to_submit_support_request()
    {
        $this->call('GET', 'support/create');
        $this->assertResponseOk();
    }

    public function test_submits_support_request_upon_form_submission()
    {

        $postData = [
            'email' => 'joe@example.com',
            'name'  => 'Joe',
            'body'  => 'Test stub message'
        ];

        Mail::shouldReceive('queue')->once()
                ->with('emails.support', $postData, Mockery::on(function($closure) {
                    $message = Mockery::mock('Illuminate\Mail\Message');

                    $message->shouldReceive('from')
                            ->with('joe@example.com')
                            ->once();

                    $message->shouldReceive('to')
                            ->with('tickets@homesstore.uservoice.com')
                            ->once()
                            ->andReturn(Mockery::self());

                    $message->shouldReceive('subject')
                            ->with('Support Request')
                            ->once();

                    $closure($message);

                    return true;
                }));

        $this->call('POST', 'support/store', $postData);
        $this->assertRedirectedToRoute('home', null, ['flash_notification.message']);
    }

}