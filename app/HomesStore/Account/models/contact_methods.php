<?php namespace HomesStore\Account\Models;

class contact_methods extends \Eloquent {

    public function user() {
        return $this->belongsTo('User');
    }

}