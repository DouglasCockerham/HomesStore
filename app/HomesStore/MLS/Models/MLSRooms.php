<?php namespace HomesStore\MLS\Models;

class MLSRooms extends \Eloquent {

    protected $guarded = array('FloorCovering',
                                'InputEntryOrder',
                                'Listing_MUI',
                                'matrix_unique_id',
                                'MatrixModifiedDT',
                                'RoomComments',
                                'RoomDepth',
                                'RoomDimensions',
                                'RoomLevel',
                                'RoomType',
                                'RoomWidth'
    );

    protected $table        = 'MLSRooms';
    protected $primaryKey   = 'matrix_unique_id';
    public $incrementing    = false;
    public $timestamps      = false;
    protected $connection   = 'mysql_prod';

    public function MLSData() {
        return $this->belongsTo('MLSData', 'matrix_unique_id', 'matrix_unique_id');
    }
}