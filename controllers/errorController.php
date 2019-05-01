<?php
/**
	Es para mostrar los errores a los usuarios.
*/
class errorController extends Controller{
	public function __construct(){
		parent::__construct();
	}

	public function Archvs($Actvr, $TpArchv, $Opcns){
		switch($Actvr){
			case 0:
				break;

				case 1:
					switch($TpArchv){

						case 'CSS':
							switch($Opcns){
								case 0:
									// Esto es par mostrar los archivos CSS que estna alojados en el directorio especifico
									// array('banner') es el nombre del archivo.		
									$this->_View->EscrbrCSS(1, 1, array('banner', 
										'contenido',
										'estilos',
										'estilos-index',
										'footer',
										'menu',
										'servicios',
										));
									break;

								case 1:
									break;
							}
							break;

						case 'JS':
							switch($Opcns){
								case 0:
									// Esto es par mostrar los archivos JavaScript que estna alojados en el directorio especifico
									// array('nuevo') es el nombre del archivo.
									$this->_View->EscrbrJvScrpt(1, 0, array('nuevo'));
									break;

								case 1:
									break;
							}
							break;
					}
					break;
		}
	}

	public function index(){
		$this->_View->Titulo = "Error";
		$this->_View->Mensaje = $this->_MstrrErrr();
		$this->Archvs(1, 'CSS', 0);
		$this->_View->renderizar('index');
	}

	public function acceso($Codigo){
		$this->_View->Titulo = "Error";
		$this->_View->Mensaje = $this->_MstrrErrr($Codigo);
		$this->Archvs(1, 'CSS', 0);
		$this->_View->renderizar('acceso');
	}

	private function _MstrrErrr($Codigo = false){

		if($Codigo){
			$Codigo = $this->filtrarTxt($Codigo);
			if(is_string($Codigo)){
				$Codigo = $Codigo;
			}
		}else{
			$Codigo = 'default';
		}
		

		$Error['default'] = "Ha ocurrido un error y la página no puede mostrarse.";
		$Error['restringido'] = "Acceso Restringido.";
		$Error['tiempoagotado'] = "Tiempo de sesión agotado.";
		$Error['404'] = "Página no encontrada.";

		if(array_key_exists($Codigo, $Error)){
			return $Error[$Codigo];
		}else{
			return $Error['default'];
		}

	} 
}
?>