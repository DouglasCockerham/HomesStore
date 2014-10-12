<?php namespace HomesStore\Account;


class contact_methods extends \Eloquent {

    public function user() {
        return $this->belongsTo('User');
    }

}