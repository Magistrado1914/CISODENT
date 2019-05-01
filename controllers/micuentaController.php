<?php
class micuentaController extends Controller{

	private $_IniciarSesion;
	private $_Registrarse;
	public function __construct(){
		parent::__construct();
		$this->_IniciarSesion = $this->loadModel('iniciarsesion');
		$this->_Registrarse = $this->loadModel('registrar');
	}

	public function index(){
		// Si la sesión del Usuario está iniciada redireccionar
		if(Session::Mstrr('autenticado')){
			$this->redireccionar(1, 0);
		}
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
		$this->_View->AlmcnrJvScrpt(1, 1, array('efectos'));
		if($this->MstrrInt('iniciarsesion') == 1){
			$this->_View->Datos = $_POST;
			if(!$this->MstrrAlphNmrc('correo_usuario')){
				$this->_View->_Error = "Debe introducir el Correo o el Usuario.";
				$this->_View->renderizar('index', 'micuenta');
				exit;
			}
			if(!$this->MstrrSQL('contrasena')){
				$this->_View->_Error = "Debe introducir la Contraseña.";
				$this->_View->renderizar('index', 'micuenta');
				exit;
			}
			$Fila = $this->_IniciarSesion->MstrrUsuario(
				$this->MstrrAlphNmrc('correo_usuario'),
				$this->MstrrSQL('contrasena')
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
			// Quita el formulario de Iniciar Sesión.
			$this->redireccionar(1, 0);
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

	// AgrrSrvc - Agregar Servicio.
	public function registrarse(){
		$this->_View->Titulo = 'Grufer - Registrarse.';
		
		// Esto es par mostrar los archivos CSS que estna alojados en el directorio especifico
		// array('banner') es el nombre del archivo.		
		$this->_View->EscrbrCSS(1, 1, array('banner'));
		$this->_View->EscrbrCSS(1, 1, array('contenido'));
		$this->_View->EscrbrCSS(1, 1, array('estilos'));
		$this->_View->EscrbrCSS(1, 1, array('estilos-index'));
		$this->_View->EscrbrCSS(1, 1, array('iniciarsesion'));
		$this->_View->EscrbrCSS(1, 1, array('registrarse'));
		$this->_View->EscrbrCSS(1, 1, array('footer'));
		$this->_View->EscrbrCSS(1, 1, array('menu'));
		$this->_View->EscrbrCSS(1, 1, array('servicios'));
		$this->_View->AlmcnrJvScrpt(1, 1, array('efectos'));
		//$this->_View->Prueba = $this->MstrrInt('guardar');
		if($this->MstrrInt('registrarse') == 1){
			// Es para mantener los datos dentro los campos HTML, ejemplo los input y textarea
			$this->_View->Datos = $_POST;
			/*if(!$this->MstrrSQL('Nombre')){
				$this->_View->_Error = "Debe introducir su nombre.";
				$this->_View->renderizar('registrarse', 'micuenta');
				exit;
			}*/
			if(!$this->MstrrAlphNmrc('Usuario')){
				$this->_View->_Error = "Debe introducir su nombre de usuario.";
				$this->_View->renderizar('registrarse', 'micuenta');
				exit;
			}
			

			if(!$this->MstrrTxt('Correo')){
				$this->_View->_Error = "Debe introducir el correo.";
				$this->_View->renderizar('registrarse', 'micuenta');
				exit;
			}
			
			if(!$this->MstrrSQL('Contrasena')){
				$this->_View->_Error = "Debe introducir su contraseña.";
				$this->_View->renderizar('registrarse', 'micuenta');
				exit;
			}
			if($this->_Registrarse->verificarUsuario($this->MstrrAlphNmrc('Usuario'))){
				$this->_View->_Error = "El Usuario ". $this->MstrrAlphNmrc('Usuario') . " existe.";
				$this->_View->renderizar('registrarse', 'micuenta');
				exit;
			}
			if(!$this->validarCorreo($this->MstrrPrmtrsPblcn('Correo'))){
				$this->_View->_Error = "La dirección de correo es invalida.";
				$this->_View->renderizar('registrarse', 'micuenta');
				exit;
			}
			if($this->_Registrarse->verificarCorreo($this->MstrrAlphNmrc('Correo'))){
				$this->_View->_Error = "Este Correo ". $this->MstrrPrmtrsPblcn('Correo') . " existe.";
				$this->_View->renderizar('registrarse', 'micuenta');
				exit;
			}
			if($this->MstrrPrmtrsPblcn('Contrasena') != $this->MstrrPrmtrsPblcn('Verificacion')){
				$this->_View->_Error = "Las contraseñas no coinciden.";
				$this->_View->renderizar('registrarse', 'micuenta');
				exit;
			}

			// Ahora llamamos la función que intserta los datos SQL.
			$this->_Registrarse->AgrrUsrs(
				$this->MstrrSQL('Usuario'), 
				$this->MstrrPrmtrsPblcn('Correo'), 
				$this->MstrrSQL('Contrasena')
				);
			// Verficar si se completo el registro.
			if(!$this->_Registrarse->verificarUsuario($this->MstrrAlphNmrc('Usuario'))){
				$this->_View->_Error = "Error al registrar Usuario.";
				$this->_View->renderizar('registrarse', 'micuenta');
				exit;
			}
			// Borra los datos que estan en los formularios.
			$this->_View->Datos = false;
			$this->_View->_Mensaje = "Registro completado.";

		}
		$this->_View->renderizar('registrarse', 'micuenta');
	}

	// AgrrSrvc - Agregar Servicio.
	public function recuperar(){
		$this->_View->Titulo = 'Grufer - Recuperar Contraseña.';
		
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
		$this->_View->AlmcnrJvScrpt(1, 1, array('efectos'));
		//$this->_View->Prueba = $this->MstrrInt('guardar');
		if($this->MstrrInt('recuperar') == 1){
			// Es para mantener los datos dentro los campos HTML, ejemplo los input y textarea
			$this->_View->Datos = $_POST;
			if(!$this->MstrrTxt('Usuario')){
				$this->_View->_Error = "Debe introducir el Asunto.";
				$this->_View->renderizar('nuevo', 'SERVICIOS');
				exit;
			}
			if(!$this->MstrrTxt('Correo')){
				$this->_View->_Error = "Debe introducir el Contenido.";
				$this->_View->renderizar('nuevo', 'SERVICIOS');
				exit;
			}

			// Ahora llamamos la función que intserta los datos SQL.
			$this->_Registrarse->RcprrCntrsn(
				$this->MstrrPrmtrsPblcn('Asunto'), 
				$this->MstrrPrmtrsPblcn('Contenido'), 
				$this->MstrrInt('Activar'));

			$this->Redireccionar(1, 0, 'micuenta');

		}
		$this->_View->renderizar('recuperar', 'micuenta');
	}

	public function cerrar(){
		Session::Eliminar();
		//$this->redireccionar(1, 0, 'iniciarsesion/Simular');
		$this->redireccionar(1, 0, 'micuenta');
	}
}
?>