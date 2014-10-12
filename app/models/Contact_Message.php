<?php

class Contact_Message extends Eloquent {

    protected $fillable = array('given_email', 'given_name', 'given_phone', 'given_message', 'user_id', 'active', 'reply', 'staff_id');

    protected $table = 'contact_messages';

}