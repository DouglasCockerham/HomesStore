<?php
/**
 * Created by PhpStorm.
 * User: padretres
 * Date: 10/14/14
 * Time: 9:20 PM
 */

class Profile extends Eloquent {

    public function user()
    {
        return $this->belongsTo('User');
    }

}