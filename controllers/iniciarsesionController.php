<?php
class iniciarsesionController extends Controller{

	private $_IniciarSesion;
	
	public function __construct(){
		parent::__construct();
		$this->_IniciarSesion = $this->loadModel('iniciarsesion');
	}

	public function index(){

		$this->_View->Titulo = "Grufer - Mi Cuenta.";
		// Esto es par mostrar los archivos CSS que estna alojados en el directorio especifico
		// array('banner') es el nombre del archivo.		
		$this->_View->EscrbrCSS(1, 1, array('banner'));
		$this->_View->EscrbrCSS(1, 1, array('contenido'));
		$this->_View->EscrbrCSS(1, 1, array('estilos'));
		$this->_View->EscrbrCSS(1, 1, array('estilos-index'));
		$this->_View->EscrbrCSS(1, 1, array('iniciarsesion'));
		$this->_View->EscrbrCSS(1, 1, array('footer'));
		$this->_View->EscrbrCSS(1, 1, array('menu'));
		$this->_View->EscrbrCSS(1, 1, array('servicios'));

		if($this->MstrrInt('iniciarsesion') == 1){
			$this->_View->Datos = $_POST;
			if(!$this->MstrrAlphNmrc('username')){
				$this->_View->_Error = "Debe introducir el Correo o el Usuario.";
				$this->_View->renderizar('index', 'micuenta');
				exit;
			}
			if(!$this->MstrrSQL('password')){
				$this->_View->_Error = "Debe introducir la Contraseña.";
				$this->_View->renderizar('index', 'micuenta');
				exit;
			}
			$Fila = $this->_IniciarSesion->MstrrUsuario(
				$this->MstrrAlphNmrc('username'),
				$this->MstrrSQL('password')
			);
			if(!$Fila){
				$this->_View->_Error = "Debe introducir el Correo o el Usuario/Contraseña.";
				$this->_View->renderizar('index', 'micuenta');
				exit;
			}
			if($Fila['Estado'] != 1){
				$this->_View->_Error = "Este usuario no está habilitado.";
				$this->_View->renderizar('index', 'micuenta');
				exit;
			}
			//Simulación.
			Session::Escrbr('autenticado', true);
			Session::Escrbr('Nivel', $Fila['Rol']);
			Session::Escrbr('Usuario', $Fila['Usuario']);
			Session::Escrbr('Referencia', $Fila['Referencia']);
			Session::Escrbr('Estado', $Fila['Estado']);
			Session::Escrbr('Activo', $Fila['Activo']);
			Session::Escrbr('tiempo', time());

			//print_r($_SESSION);
			$this->_View->renderizar('index', 'micuenta');
		}
		$this->_View->renderizar('index', 'micuenta');

		// Simulación.
		/*Session::Escrbr('var1', 'var1');
		Session::Escrbr('var2', 'var2');
		$this->redireccionar(1, 0, 'iniciarsesion/Simular');*/
		
	}
	// Simulación.
	public function Simular(){
		echo 'Nivel: ' . Session::Mstrr('Nivel') . '<br/>';
		echo 'Var 1: ' . Session::Mstrr('var1') . '<br/>';
		echo 'Var 2: ' . Session::Mstrr('var2') . '<br/>';
	}

	public function cerrar(){
		Session::Eliminar();
		//$this->redireccionar(1, 0, 'iniciarsesion/Simular');
		$this->redireccionar(1, 0, 'inicio');
	}
}
?>