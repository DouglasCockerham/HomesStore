<?php namespace HomesStore\Admin\Models;

class MonthlySoldReport_RRU extends \Eloquent {

    protected $connection = 'mysql_prod';
    protected $table = 'Solds';

    public static function storedProcedureCall($dateFrom, $dateTo) {
        return \DB::select('call Report_Monthly_Solds(?,?)', [$dateFrom, $dateTo]);
    }

}