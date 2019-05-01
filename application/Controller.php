<?php
abstract class Controller{
	protected $_View;
	protected $_DB;
	public function __construct(){
		$this->_View = new View(new Request);
	}
	abstract public function index();

	protected function loadModel($Modelo){
		$Modelo = $Modelo . 'Model';
		$rutaModelo = ROOT . 'Models' . DS . $Modelo . '.php';
		if(is_readable($rutaModelo)){
			require_once $rutaModelo;
			$Modelo = new $Modelo;
			return $Modelo;
		}else{
			include_once ROOT . 'Views' . DS . 'layout' . DS . 'error' . DS . 'error' .'.phtml';
		}
	}
	// Es para cargar librerias.
	protected function MstrrLibrerias($Acvr, $Opcn, $Libreria){
		switch($Actvr){
			case 0:
				break;

			case 1:
				switch ($Opcn) {
					case 0:
						$rutaLibreria = ROOT . 'Libs' . DS . $Libreria . '.php';
						if(is_readable($rutaLibreria)){
							require_once $rutaLibreria;
						}else{
							include_once ROOT . 'Views' . DS . 'layout' . DS . 'error' . DS . 'error' .'.phtml';;
						}
						break;
					
					default:
						# code...
						break;
				}
				break;

			default:
				# code...
				break;
		}
	}
	// Es para cargar librerias.
	protected function MstrrBbltcs($Acvr, $Opcn, $Libreria){
		switch($Actvr){
			case 0:
				break;

			case 1:
				switch ($Opcn) {
					case 0:
						$rtCSS = ROOT . 'Bibliotecas' . DS . $Libreria . '.css';
						$rtJS = ROOT . 'Bibliotecas' . DS . $Libreria . '.js';
						if(is_readable($rtCSS)){
							require_once $rtCSS;
						}
						if(is_readable($rtJS)){
							require_once $rtJS;
						}
						break;
					
					default:
						# code...
						break;
				}
				break;

			default:
				# code...
				break;
		}
	}
	protected function MstrrTxt($Clave){
		if(isset($_POST[$Clave]) && !empty($_POST[$Clave])){
			$_POST[$Clave] = htmlspecialchars($_POST[$Clave], ENT_QUOTES);
			return $_POST[$Clave];
		}
		return '';
	}

	protected function MstrrInt($Clave){
		if(isset($_POST[$Clave]) && !empty($_POST[$Clave])){
			$_POST[$Clave] = filter_input(INPUT_POST, $Clave, FILTER_VALIDATE_INT);
			return $_POST[$Clave];
		}
		return 0;
	}
	// Es para verficar URL.
	protected function filtrarInt($int){
		$int = (int) $int;
		if(is_int($int)){
			return $int;
		}else{
			return 0;
		}
	}
	// Es para verficar URL.
	protected function filtrarTxt($Txt){
		if(is_string($Txt)){
			return $Txt;
		}else{
			return '';
		}
	}
	protected function Redireccionar($Actvr, $Opcn, $Ruta = false){
		switch($Actvr){
			case 0:
				break;

			case 1:
				switch($Opcn){

					case 0:
						if($Ruta){
							header('location:' . BASE_URL . $Ruta);
							exit;
						}else{
							header('location:' . BASE_URL);
							exit;
						}
						break;
					case 1:
						break;
				
				}
				break;
		}
	}
	// MstrrPrmtrsPblcn - Mostrar Paramteros de Publicación.
	protected function MstrrPrmtrsPblcn($Clave){
		if(isset($_POST[$Clave])){
			return $_POST[$Clave];
		}
	}
	// Es para evitar XSS
	protected function MstrrSQL($Clave){
		if(isset($_POST[$Clave]) && !empty($_POST[$Clave])){
			$_POST[$Clave] = strip_tags($_POST[$Clave]);

			if(!get_magic_quotes_gpc()){
				$_POST[$Clave] = quotemeta($_POST[$Clave]);
			}
			return trim($_POST[$Clave]);
		}
	}

	protected function MstrrAlphNmrc($Clave){
		if(isset($_POST[$Clave]) && !empty($_POST[$Clave])){
			$_POST[$Clave] = (string) preg_replace('/[^A-Z0-9_]/i', '', $_POST[$Clave]);
			return trim($_POST[$Clave]);
		}
	}

	public function validarCorreo($Correo){
		if(!filter_var($Correo, FILTER_VALIDATE_EMAIL)){
			return false;
		}
		return true;
	}
}
?>