<?php
class View {
	private $_controlador;
	private $_Bbltc;
	private $_JS;
	private $_CSS;
	private $_IMG;
	private $_MENU;

	public function __construct(Request $Peticion){
		$this->_controlador = $Peticion->MstrrControlador();
		$this->_JS = array();
		$this->_MENU = array();
	}
	
	public function renderizar($Vista, $item = false) {
		
		// Menú de Sesión.
		if(Session::Mstrr('autenticado')){
			
				$Menu = array(
					array(
						'Referencia' => 0,
						'id' => 'inicio',
						'Titulo' => 'Inicio.',
						'Enlace' => BASE_URL,
						'Activo' => 1,
					),
					array(
						'Referencia' => 1,
						'id' => 'prospectos',
						'Titulo' => 'Prospectos.',
						'Enlace' => BASE_URL . 'prospectos',
						'Activo' => 1,
					),
					array(
						'Referencia' => 2,
						'id' => 'perfil',
						'Titulo' => 'Mi Perfil.',
						'Enlace' => BASE_URL . 'micuenta/perfil',
						'Activo' => 1,
					),
					array(
						'Referencia' => 3,
						'id' => 'cerrar',
						'Titulo' => 'Cerrar Sesión.',
						'Enlace' => BASE_URL . 'inicio/cerrar',
						'Activo' => 1,
					),
				);
		}else{
			$Menu = array();
		}
		// CONTAR ARCHIVOS DE BIBLIOTECAS
		$Bbltcs = array();
		//$this->_Bbltc = array();
		if(count($this->_Bbltc)){
			$Bbltcs = $this->_Bbltc;
		}
		// Contar archivos JavaScript de una ruta especifica.
		$JS = array();
		if(count($this->_JS)){
			$JS = $this->_JS;
		}
			
		//---------------------------------------------------------//
		// Contar archivos CSS de una ruta especifica.
		$CSS = array();
		if(count($this->_CSS)){
			$CSS = $this->_CSS;
		}
		//---------------------------------------------------------//
		$_layoutParams = array(
			'ruta_css' => BASE_URL . 'Views/layout/' . DEFAULT_LAYOUT . '/css/',
			'ruta_img' => BASE_URL . 'Views/layout/' . DEFAULT_LAYOUT . '/img/',
			'ruta_js' => BASE_URL . 'Views/layout/' . DEFAULT_LAYOUT . '/js/',
			'menu' => $Menu,
			// Bibliotecas
			'Bbltcs' => $Bbltcs,
			// Mostrar archivos JavaScript de una ruta especifica.
			'JS' => $JS,
			// Mostrar archivos CSS de una ruta especifica.
			'CSS' => $CSS,
			);
		$Header = ROOT . 'Views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'header' .'.php'; 
		$Menu = ROOT . 'Views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'menu' .'.php'; 
		$Contenido = ROOT . 'Views' . DS . $this->_controlador . DS . $Vista . '.phtml'; 
		$Footer = ROOT . 'Views' . DS . 'layout' . DS . DEFAULT_LAYOUT . DS . 'footer' .'.php'; 
		// Verficar que el archivo existe.
		if(is_readable($Header)){
			include_once $Header;			
		}else{
			echo "Cabecera no encontrada";
			include_once ROOT . 'Views' . DS . 'layout' . DS . 'error' . DS . 'header' .'.phtml';;
			
		}
		if(is_readable($Menu)){
			include_once $Menu;			
		}else{
			echo "Menu no encontrada";
			include_once ROOT . 'Views' . DS . 'layout' . DS . 'error' . DS . 'menu' .'.phtml';;
			
		}
		if(is_readable($Contenido)){
			include_once $Contenido;
		}else{
			echo "Contenido no encontrada";
			include_once ROOT . 'Views' . DS . 'layout' . DS . 'error' . DS . 'contenido' .'.phtml';;
		}

		if(is_readable($Footer)){
			include_once $Footer;			
		}else{
			echo "Pie de página no encontrada";
			include_once ROOT . 'Views' . DS . 'layout' . DS . 'error' . DS . 'footer' .'.phtml';;
			
		}

	}
	// Contar archivos JavaScript de una ruta especifica mediante una función.
	public function AlmcnrJvScrpt($Actvr, $Opcn, array $JS){
		
		switch($Actvr){

			case 0:
				break;

				case 1:
					switch($Opcn){
						
						case 0:
							if(is_array($JS) && count($JS)){
								for($i = 0; $i < count($JS); $i++){
									$this->_JS[] = BASE_URL . 'Views/' . $this->_controlador . '/js/' . $JS[$i] . '.js';
											
								}
							}else{
								include_once ROOT . 'Views' . DS . 'layout' . DS . 'error' . DS . 'error' .'.phtml';;
							}
							break;

							case 1:
								if(is_array($JS) && count($JS)){
									for($i = 0; $i < count($JS); $i++){
										$this->_JS[] = BASE_URL . 'Views/layout/default/js/' . $JS[$i] . '.js';
									}
								}else{
									include_once ROOT . 'Views' . DS . 'layout' . DS . 'error' . DS . 'error' .'.phtml';;
								}
								break;
					}
					break;
		}
		
	}

	// Contar archivos CSS de una ruta especifica mediante una función.
	public function EscrbrCSS($Actvr, $Opcn, array $CSS){

		switch($Actvr){

			case 0:
				break;

				case 1:
					switch($Opcn){

						case 0:
						
							break;
								if(is_array($CSS) && count($CSS)){
									for($i = 0; $i < count($CSS); $i++){
										$this->_CSS[] = BASE_URL . 'Views' . $this->_controlador . '/CSS/' . $CSS[$i] . '.css';
									}
								}else{
									include_once ROOT . 'Views' . DS . 'layout' . DS . 'error' . DS . 'error' .'.phtml';;
								}
							case 1:
								if(is_array($CSS) && count($CSS)){
									for($i = 0; $i < count($CSS); $i++){
										$this->_CSS[] = BASE_URL . 'Views/layout/default/css/' . $CSS[$i] . '.css';
									}
								}else{
									include_once ROOT . 'Views' . DS . 'layout' . DS . 'error' . DS . 'error' .'.phtml';;
								}
								break;
					}
					break;
		}
		
	}
	// Contar archivos CSS de una ruta especifica mediante una función.
	public function Almcnr_Bbltc($Actvr, $Opcn, array $Drctr){
		//$this->_Bbltc = array();
		switch($Actvr){

			case 0:
				break;

				case 1:
					switch($Opcn){

						case 0:
							$this->_Bbltc = $Drctr;
							
							break;
								
							case 1:
								
								break;
					}
					break;
		}
		
	} 

}
?>