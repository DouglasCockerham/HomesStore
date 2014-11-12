<?php namespace HomesStore\MLS\Controllers;

use BaseController;
use HomesStore\MLS\Models\MLSData;

class PropertyDetailsController extends BaseController {

    protected $MLSNumber = '';

    public function __construct($MLSNumber) {
        $this->MLSNumber = $MLSNumber;

        // fetch the MLS property record
        $currentProperty = MLSData::find($MLSNumber)->get();
        // check to see if it exists
        // return true if it does exist, false if not
        return $currentProperty->count() ? true : false;

    }

    public function initProperty() {


    }

}