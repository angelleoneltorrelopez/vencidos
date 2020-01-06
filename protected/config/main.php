<?php

// uncomment the following to define a path alias
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Vencidos',
	'theme'=>'bootstrap',
	'language'=>'es',
	'sourceLanguage' => 'en',
	'charset'=>'utf-8',
	// preloading 'log' component
	'preload'=>array('bootstrap','log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.vendor.phpexcel.*',
		'ext.yiiexcel.*',
		'ext.bootstrap.widgets.*',
		'ext.bootstrap.helpers.*',
		'bootstrap.helpers.TbHtml',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'12345',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
			'generatorPaths' => array(
			'ext.bootstrap.gii',
		),
		),

	),

	// application components
	'components'=>array(

		'bootstrap' => array(
				'class' => 'bootstrap.components.TbApi',
		),

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		
//******************bootstrap*****************************
		'bootstrap' => array(
		'class' => 'ext.bootstrap.components.Booster',
		'responsiveCss'=> true,
	 ),
//******************************************************************
 'ePdf' => array(
 'class' => 'ext.yii-pdf.EYiiPdf',
 'params' => array(
 'mpdf' => array(
 'librarySourcePath' => 'application.vendor.mpdf.*',
 'constants' => array(
 '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
 ),
 'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
 /*'defaultParams' => array( // More info: http://mpdf1.com/manual/index.php?tid=184
 'mode' => '', // This parameter specifies the mode of the new document.
 'format' => 'A4', // format A4, A5, ...
 'default_font_size' => 0, // Sets the default document font size in points (pt)
 'default_font' => '', // Sets the default font-family for the new document.
 'mgl' => 15, // margin_left. Sets the page margins for the new document.
 'mgr' => 15, // margin_right
 'mgt' => 16, // margin_top
 'mgb' => 16, // margin_bottom
 'mgh' => 9, // margin_header
 'mgf' => 9, // margin_footer
 'orientation' => 'P', // landscape or portrait orientation
 )*/
 ),
 ),
 ),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),


		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
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
		'adminEmail'=>'angeltorrelopez@hotmail.com',
	),
);
