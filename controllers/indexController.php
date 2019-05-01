<?php
class indexController extends Controller{

	public function __construct(){
		parent::__construct();
		$this->_IniciarSesion = $this->loadModel('iniciarsesion');
		
	}

	public function index(){
	
	if(Session::Mstrr('autenticado')){
		$this->_View->Almcnr_Bbltc(1, 0, 
			array(
				// CSS
				array(
					'Archivo' => 'all.min.css',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'@fortawesome/fontawesome-free/css/',
					'Tipo' => 'css',
					'Ubicacion' => 'Cabecera'
				),
				array(
					'Archivo' => 'ionicons.min.css',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'ionicons/css/',
					'Tipo' => 'css',
					'Ubicacion' => 'Cabecera'
				),
				array(
					'Archivo' => 'rickshaw.min.css',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'rickshaw/',
					'Tipo' => 'css',
					'Ubicacion' => 'Cabecera'
				),
				array(
					'Archivo' => 'select2.min.css',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'select2/css/',
					'Tipo' => 'css',
					'Ubicacion' => 'Cabecera'
				),
				array(
					'Archivo' => 'bracket.css',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/',
					'Tipo' => 'css',
					'Ubicacion' => 'Cabecera'
				),

				// JAVASCRIPT
				array(
					'Archivo' => 'jquery.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'jquery/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'datepicker.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'jquery-ui/ui/widgets/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'bootstrap.bundle.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'bootstrap/js/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'perfect-scrollbar.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'perfect-scrollbar/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'moment.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'moment/min/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'jquery.peity.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'peity/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'd3.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'rickshaw/vendor/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'd3.layout.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'rickshaw/vendor/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'rickshaw.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'rickshaw/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pîe'
				),
				array(
					'Archivo' => 'jquery.flot.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'jquery.flot/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'jquery.flot.resize.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'jquery.flot/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'jquery.flot.resize.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'flot-spline/js/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'jquery.sparkline.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'jquery-sparkline/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'echarts.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'echarts/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'select2.full.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'select2/js/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg',
					'Directorio' => 'http://maps.google.com/maps/api/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'gmaps.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'gmaps/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'bracket.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				
				array(
					'Archivo' => 'map.shiftworker.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'ResizeSensor.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'dashboard.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pîe'
				),
				)
			);
	
		// Esto es par mostrar los archivos CSS que estna alojados en el directorio especifico
		// array('banner') es el nombre del archivo.
		//$this->_View->Servicios = $this->_Servicios->MstrrServicios();	
		$this->_View->EscrbrCSS(1, 1, array(
			'',
			)
		);
		$this->_View->AlmcnrJvScrpt(1, 1, 
			array(
				'efectos')
			);
	}else{
		$this->_View->Almcnr_Bbltc(1, 0, 
			array(
				// CSS
				array(
					'Archivo' => 'bootstrap.min.css',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/joshadmintheme/v5.12.5/'.'css/',
					'Tipo' => 'css',
					'Ubicacion' => 'Cabecera'
				),
				array(
					'Archivo' => 'all.css',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/joshadmintheme/v5.12.5/'.'vendors/icheck/skins/',
					'Tipo' => 'css',
					'Ubicacion' => 'Cabecera'
				),
				array(
					'Archivo' => 'login.css',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/joshadmintheme/v5.12.5/'.'css/',
					'Tipo' => 'css',
					'Ubicacion' => 'Cabecera'
				),				

				// JAVASCRIPT
				array(
					'Archivo' => 'jquery.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/joshadmintheme/v5.12.5/'.'js/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'bootstrap.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/joshadmintheme/v5.12.5/'.'js/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'icheck.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/joshadmintheme/v5.12.5/'.'vendors/icheck/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				
				)
			);
	}

			if($this->MstrrInt('iniciarsesion') == 1){
				$this->_View->Datos = $_POST;
				if(!$this->MstrrAlphNmrc('username')){
					$this->_View->_Error = "Debe introducir el Correo o el Usuario.";
					$this->_View->renderizar('index', 'INICIO');
					exit;
				}
				if(!$this->MstrrSQL('password')){
					$this->_View->_Error = "Debe introducir la Contraseña.";
					$this->_View->renderizar('index', 'INICIO');
					exit;
				}
				$Fila = $this->_IniciarSesion->MstrrUsuario(
					$this->MstrrAlphNmrc('username'),
					$this->MstrrSQL('password')
				);
				if(!$Fila){
					$this->_View->_Error = "Debe introducir el Correo o el Usuario/Contraseña.";
					$this->_View->renderizar('index', 'INICIO');
					exit;
				}
				/*if($Fila['Estado'] != 1){
					$this->_View->_Error = "Este usuario no está habilitado.";
					$this->_View->renderizar('index', 'INICIO');
					exit;
				}*/
				//Simulación.
				Session::Escrbr('autenticado', true);
				//Session::Escrbr('Nivel', $Fila['Rol']);
				Session::Escrbr('Usuario', $Fila['cod_usuario']);
				Session::Escrbr('Referencia', $Fila['flg_bloqueo']);
				Session::Escrbr('Estado', $Fila['est_reg']);
				//Session::Escrbr('Activo', $Fila['Activo']);
				Session::Escrbr('tiempo', time());
	
				//print_r($_SESSION);
				$this->_View->renderizar('index', 'INICIO');
			}
		$this->_View->Titulo = 'CISODENT Comunidad Dental - Marketing para Odontologos';
		$this->_View->Subtitulo = '';
		$this->_View->renderizar('index', 'INICIO');
	}
	public function cerrar(){
		Session::Eliminar();
		//$this->redireccionar(1, 0, 'iniciarsesion/Simular');
		$this->redireccionar(1, 0, 'inicio');
	}
}
?>