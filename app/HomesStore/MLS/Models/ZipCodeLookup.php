<?php namespace HomesStore\MLS\Models;

class ZipCodeLookup extends \Eloquent {

    protected $guarded = ['ID',
                            'ZipCode',
                            'Zip+4',
                            'Type',
                            'PrimaryCity',
                            'County',
                            'Timezone',
                            'AreaCodes',
                            'Latitude',
                            'Longitude',
                            'Decommissioned',
                            'AlternateCities'
                        ];

    protected $table = 'ZipCodeLookup';
    protected $primaryKey   = 'ZipCode';
    public $incrementing    = false;
    public $timestamps      = false;
    protected $connection   = 'mysql_prod';

    public function MLSData() {
        return $this->belongsToMany('MLSData','ZipCode','PostalCode');
    }

}