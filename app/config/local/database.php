<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Database Connections
	|--------------------------------------------------------------------------
	|
	| Here are each of the database connections setup for your application.
	| Of course, examples of configuring each database platform that is
	| supported by Laravel is shown below to make development simple.
	|
	|
	| All database work in Laravel is done through the PHP PDO facilities
	| so make sure you have the driver for your particular database of
	| choice installed on your machine before you begin development.
	|
	*/

	'connections' => array(

		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'homesstore',
			'username'  => $_ENV['DATABASE_USERID_LOCAL'],
			'password'  => $_ENV['DATABASE_PASSWORD_LOCAL'],
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
		),

        'mysql_prod' => array(
            'driver'    => 'mysql',
            'host'      => 'matrixmls.db.7926202.hostedresource.com',
            'database'  => 'matrixmls',
            'username'  => $_ENV['DATABASE_USERID_PROD'],
            'password'  => $_ENV['DATABASE_PASSWORD_PROD'],
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ),

	),

);
