<?php
	define('PATH_SYSTEM', __DIR__.'/system');
	define('PATH_APPLICATION', __DIR__.'/site');
	
	require(PATH_SYSTEM.'/config/config.php');

	include_once PATH_SYSTEM.'/core/Common.php';

	_load();
?>