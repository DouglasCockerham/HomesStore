<?php namespace HomesStore\MLS\Controllers;

use HomesStore\MLS\Models\GeoCode;
use HomesStore\MLS\Models\MLSData,HomesStore\Notifications\Flash,View,BaseController,Redirect;

class MLSController extends BaseController {

    public function showAllFields($MLSNumber) {

        $result = MLSData::where('MLSNumber', '=', $MLSNumber)->first();

        if($result->count()) {
            $MLSPropertyFields = $result->attributesToArray();
            return View::make('property_details',compact('MLSPropertyFields'));
        }
        return Redirect::intended('/')
                ->with(Flash::warning($MLSNumber . ' not found.',''));
    }

    public function showCivicFields($MLSNumber) {

        $MLSPropertyFields = \DB::table('MLSData')->select('CountyOrParish',
            'Taxes',
            'ParcelNumber',
            'LegalDescription',
            'LegalSubdivisionName',
            'HomesteadYN',
            'CDDYN',
            'AnnualCDDFee',
            'LandLeaseFee',
            'Zoning')->where('MLSNumber', '=', $MLSNumber)->get();

        dd($MLSPropertyFields);

//            return View::make('property_details',compact('MLSPropertyFields'));

    }

    public function showCoordinates($MLSNumber) {

//        $result = MLSData::where('MLSNumber', '=', $MLSNumber)->first();
        $Geo = GeoCode::where('mls_number', '=', $MLSNumber)->first();
        dd($Geo);

    }

}