<?php
class Bootstrap{
	public static function run($Actvr, $Opcn, Request $Peticion){
		switch($Actvr){
			case 0:
				break;

			case 1:
				switch($Opcn){
					case 0:
						$controller = $Peticion->MstrrControlador() . 'Controller';
						$rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';
						$metodo = $Peticion->MstrrMetodo();
						$Args = $Peticion->MstrrArg();
				
				
						if(is_readable($rutaControlador)){
							require_once $rutaControlador ;
							$controller = new $controller;
							if(is_callable(array($controller, $metodo))){
								$metodo = $Peticion->MstrrMetodo();
							}else{
								$metodo = 'index';
							}
				
							if(isset($Args)){
								call_user_func_array(array($controller, $metodo), $Args);
							}else{
								call_user_func(array($controller, $metodo));
							}
						}else{
							include_once ROOT . 'Views' . DS . 'layout' . DS . 'error' . DS . 'error' .'.phtml';
							
						}
						break;
					
					case 1:
						$controller = $Peticion->MstrrControlador();
						$rutaControlador = ROOT . 'controllers' . DS . $controller . '.php';
						$metodo = $Peticion->MstrrMetodo();
						$Args = $Peticion->MstrrArg();
				
				
						if(is_readable($rutaControlador)){
							require_once $rutaControlador ;
							$controller = new $controller;
							if(is_callable(array($controller, $metodo))){
								$metodo = $Peticion->MstrrMetodo();
							}else{
								$metodo = 'index';
							}
				
							if(isset($Args)){
								call_user_func_array(array($controller, $metodo), $Args);
							}else{
								call_user_func(array($controller, $metodo));
							}
						}else{
							include_once ROOT . 'Views' . DS . 'layout' . DS . 'error' . DS . 'error' .'.phtml';
							
						}
						break;
				}
				break;
		}
		
	}
}
?>