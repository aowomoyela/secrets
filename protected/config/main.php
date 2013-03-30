<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'(secrets ? lies)',
	'homeUrl'=>array('site/index'),
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.meta_models.*',
		'application.models.*',
		'application.components.*',
		// Extensions.
		'ext.dBug.*',
		'ext.UserIdentity.*',
		'ext.UserInterface.*',
		'ext.UserSecurity.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			// This will be edited to use a function to call a value from outside the web document tree when I'm more concerned about things.
			'password'=>'h1m1ts5d3s5',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(

		'session' => array(
			'autoStart' => true,
			'sessionName' => 'SecretsWebSession',
			'cookieParams' => array( 'httponly' => true, ),
		),
		'authManager' => array(
			'class' => 'CPhpAuthManager',
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				''=>'site/index',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=secrets',
			'emulatePrepare' => true,
			'username' => 'secrets',
			// This will be edited to use a function to call a value from outside the web document tree when I'm more concerned about things.
			'password' => ':#)2r:6}i@E:Q:Cda5z}Gql0ykqplYArp<vTzGtFz~7gd!RSMT{$QZwl-lG^dmw',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'an@owomoyela.com',
	),
);