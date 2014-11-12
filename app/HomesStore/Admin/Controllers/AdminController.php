<?php namespace HomesStore\Admin\Controllers;

class AdminController extends \BaseController {

    public function getContactMessages()
    {
        return 'Hey there this is the super secret area!';
    }

    public function getReport()
    {
        return View::make('admin/monthly_solds_rru');
    }

}