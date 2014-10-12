<?php

return array(

	'host'      => $_ENV['EMAIL_HOST'],
	'port'      => $_ENV['EMAIL_PORT'],
	'from'      => array('address' => $_ENV['EMAIL_ACCOUNT'], 'name' => $_ENV['EMAIL_NAME']),
	'username'  => $_ENV['EMAIL_ACCOUNT'],
	'password'  => $_ENV['EMAIL_PASSWORD'],
    'encryption' => 'ssl',
	'pretend'   => true,

);
