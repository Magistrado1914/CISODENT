<?php
class prospectosController extends Controller{
	private $_Prospectos;
	public function __construct(){
		parent::__construct();
		$this->_Prospectos = $this->loadModel('prospectos');
		
	}

	public function index(){
		$this->_View->Prospectos = $this->_Prospectos->Mstrr_Prspcts(1);
		
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
					'Archivo' => 'github.css',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'highlightjs/styles/',
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
					'Archivo' => 'jquery.dataTables.min.css',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'datatables.net-dt/css/',
					'Tipo' => 'css',
					'Ubicacion' => 'Cabecera'
				),
				array(
					'Archivo' => 'responsive.dataTables.min.css',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'datatables.net-responsive-dt/css/',
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
					'Archivo' => 'highlight.pack.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'highlightjs/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'jquery.dataTables.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'datatables.net/js/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'dataTables.dataTables.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'datatables.net-dt/js/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pîe'
				),
				array(
					'Archivo' => 'dataTables.responsive.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'datatables.net-responsive/js/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'responsive.dataTables.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'datatables.net-responsive-dt/js/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				array(
					'Archivo' => 'select2.min.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/'.'select2/js/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
				),
				
				array(
					'Archivo' => 'bracket.js',
					'Directorio' => BASE_URL . 'Libs/Bibliotecas/bracketsplusadmin/v14/',
					'Tipo' => 'js',
					'Ubicacion' => 'Pie'
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
			
		$this->_View->Titulo = 'Registrar Prospectos';
		$this->_View->Subtitulo = '';
		$this->_View->renderizar('index', 'prospectos');
	}
}
?>