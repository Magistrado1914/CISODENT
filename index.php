<?php
	ini_set('display_errors', 1);
	//echo uniqid(); exit;
	define('DS', DIRECTORY_SEPARATOR);
	/*RUTA BASE*/
	define('ROOT', realpath(dirname(__FILE__)) . DS);

	define('APP_PATH', ROOT . 'application' . DS);

	require_once APP_PATH . 'Bootstrap.php';
	require_once APP_PATH . 'Config.php';
	require_once APP_PATH . 'Controller.php';
	require_once APP_PATH . 'Database.php';
	require_once APP_PATH . 'Dialogflow.php';
	require_once APP_PATH . 'Hash.php';
	require_once APP_PATH . 'Registro.php';
	require_once APP_PATH . 'Request.php';
	require_once APP_PATH . 'Session.php';
	require_once APP_PATH . 'Model.php';
	require_once APP_PATH . 'View.php';

	// Prueba de Contraseña Encriptada.
	//echo Hash::MstrrHash('sha1', '1234', HASH_KEY);

	// Es para iniciar sesion.
	Session::Iniciar();
	
	try{
		Bootstrap::run(1, 0, new Request());
	}catch(Exception $e){
		echo $e->getMessage();
	}

	
?>