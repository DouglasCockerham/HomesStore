<?php

class FlashNotificationTest extends TestCase {

    // setUp method to declare dependencies that are global for the entire test class
    public function setUp()
    {
        parent::setUp();
        Session::start();
    }

    /*test*/
    public function test_it_displays_default_flash_notifications() {
        Flash::message('Welcome aboard', 'info');
        $this->call('GET', '/');
        $this->see('Welcome aboard', '.alert-info');
    }
    public function test_it_displays_success_flash_notifications() {
        Flash::success('Welcome aboard','bottom');
        $this->call('GET', '/');
        $this->see('Welcome aboard', '.alert-success');
        $this->see('Welcome aboard', '.bottom');
    }
    public function test_it_displays_error_flash_notifications() {
        Flash::error('Uh Oh!','top');
        $this->call('GET', '/');
        $this->see('Uh Oh!', '.alert-danger');
        $this->see('Uh Oh!', '.top');
    }
    public function test_it_displays_warning_flash_notifications() {
        Flash::warning('Danger Will Robinson!', 'top');
        $this->call('GET', '/');
        $this->see('Danger Will Robinson!', '.alert-warning');
        $this->see('Danger Will Robinson!', '.top');
    }
    public function test_it_displays_flash_overlay_notifications() {
        Flash::overlay('Welcome Aboard!','HEY HEY HEY');
        $this->call('GET', '/');
        $this->see('Welcome Aboard!', '.modal');
    }
}
