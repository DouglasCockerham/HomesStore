<?php namespace HomesStore\MLS\Models;

class ListPriceHistory extends \Eloquent {

    protected $guarded = array('ID',
                                'sysid',
                                'MLSNumber',
                                'EnteredDate',
                                'PriceChangeDate',
                                'OldListPrice',
                                'NewListPrice',
                                'price_drop_amount',
                                'price_drop_percent',
    );

    protected $table = 'ListPriceHistory';
    protected $primaryKey   = 'ID';
    public $incrementing    = false;
    public $timestamps      = false;
    protected $connection   = 'mysql_prod';

    public function MLSData() {
        return $this->belongsTo('MLSData','MLSNumber','MLSNumber');
    }

}