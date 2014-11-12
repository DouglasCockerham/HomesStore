<?php namespace HomesStore\MLS\Models;

class GeoCode extends \Eloquent {

    protected $guarded = array('sysid',
                                'mls_number',
                                'Latitude',
                                'Longitude',
                                'FormattedAddress',
                                'Neighborhood',
                                'Timestamp'
    );

    protected $table        = 'GeoCode';
    protected $primaryKey   = 'sysid';
    public $incrementing    = false;
    public $timestamps      = false;
    protected $connection   = 'mysql_prod';

    public function MLSData() {
        return $this->belongsTo('MLSData','sysid','matrix_unique_id');
    }

}