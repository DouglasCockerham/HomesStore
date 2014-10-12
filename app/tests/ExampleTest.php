<?php

class ExampleTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
        Session::start();
    }

    /*test*/
    public function test_it_displays_default_flash_notifications() {
        Flash::message('Welcome aboard');
        $this->call('GET', '/');
        $this->see('Welcome aboard', '.alert-info');
    }
    public function test_it_displays_success_flash_notifications() {
        Flash::success('Welcome aboard');
        $this->call('GET', '/');
        $this->see('Welcome aboard', '.alert-success');
    }
    public function test_it_displays_error_flash_notifications() {
        Flash::error('Uh Oh!');
        $this->call('GET', '/');
        $this->see('Uh Oh!', '.alert-danger');
    }
    public function test_it_displays_warning_flash_notifications() {
        Flash::warning('Danger Will Robinson!');
        $this->call('GET', '/');
        $this->see('Danger Will Robinson!', '.alert-warning');
    }
    public function test_it_displays_flash_overlay_notifications() {
        Flash::overlay('Welcome Aboard!','HEY HEY HEY');
        $this->call('GET', '/');
        $this->see('Welcome Aboard!', 'HEY HEY HEY', '.modal');
    }
}
