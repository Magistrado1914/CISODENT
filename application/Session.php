<?php
class Session {
	// Iniciar sesión del Usuaro.
	public static function Iniciar(){
		session_start();
	}
	// Eliminar sesion del Usuario.
	public static function Eliminar($Clave = false){
		if($Clave){
			// Revisa si $Clave es un array.
			if(is_array($Clave)){
				// Lo recorre.
				for($i = 0; $i < count($Clave); $i++){
					// Por cada coincidencia.
					if(isset($_SESSION[$Clave[$i]])){
						// Elimina $Clave de sesión.
						unset($_SESSION[$Clave[$i]]);
					}
				}
			// Si no es un arreglo.
			}else{
				// Verfica $Clave. 
				if(isset($_SESSION[$Clave])){
					// Elimina $Clave de sesión.
					unset($_SESSION[$Clave]);
				}
			}
		// Si no se envió una $Clave destruye la sesión.
		}else{
			session_destroy();
		}
	}

	public static function Escrbr($Clave, $Valor){
		// Si $Clave no está vacia.
		if(!empty($Clave)){
			$_SESSION[$Clave] = $Valor;
		}
	}

	public static function Mstrr($Clave){
		// Si $Clave no está vacia.
		if(isset($_SESSION[$Clave])){
			return $_SESSION[$Clave];
		}
	}

	public static function acceso($Nivel){
		if(!Session::Mstrr('autenticado')){
			header('location:' . BASE_URL . 'error/acceso/restringido');
			exit;
		}
		Session::tiempo();

		if(Session::MstrrNivel($Nivel) > Session::MstrrNivel(Session::Mstrr('Nivel'))){
			header('location:' . BASE_URL . 'error/acceso/restringido');
			exit;
		}
	}
	// Metodo que restringa al Usuario opciones.
	public static function accesoVista($Nivel){
		if(!Session::Mstrr('autenticado')){
			return false;
		}

		if(Session::MstrrNivel($Nivel) > Session::MstrrNivel(Session::Mstrr('Nivel'))){
			return false;
		}
		return true;
	}

	// Aquí donde vamoa a colocar los diferentes niveles de accessos.
	public static function MstrrNivel($Nivel){
		$Rol['Administrador'] = 3;
		$Rol['Especial'] = 2;
		$Rol['Usuario'] = 1;
		$Rol['Invitado'] = 0;

		if(!array_key_exists($Nivel, $Rol)){
			throw new Exception("Error de Acceso");
			
		}else{
			return $Rol[$Nivel];
		}
	}

	// Acceso especifico a los Usuarios
	public static function accesoEspecifico(array $Nivel, $noAdmin = false){

		if(!Session::Mstrr('autenticado')){
			header('location:' . BASE_URL . 'error/acceso/restringido');
			exit;
		}
		Session::tiempo();
		if($noAdmin == false){
			if(Session::Mstrr('Nivel') == 'Administrador'){
				return;
			}
		}

		// Verificar los niveles de usuarios que van a ser permitidos.
		if(count($Nivel)){
			if(in_array(Session::Mstrr('Nivel'), $Nivel)){
				return;
			}
		}

		//Si ninguna condiciones se cumplen, redireccionará.
		header('location:' . BASE_URL . 'error/acceso/restringido');
	}

	// Acceso Especifico a los Usuarios en lainterfaz gráfica. 
	public static function accesoVistaEspecifico(array $Nivel, $noAdmin = false){

		if(!Session::Mstrr('autenticado')){
			return false;
		}
		if($noAdmin == false){
			if(Session::Mstrr('Nivel') == 'Administrador'){
				return true;
			}
		}

		// Verificar los niveles de usuarios que van a ser permitidos.
		if(count($Nivel)){
			if(in_array(Session::Mstrr('Nivel'), $Nivel)){
				return true;
			}
		}

		return false;
	}

	public static function tiempo(){
		if(!Session::Mstrr('tiempo') || !defined('SESSION_TIME')){
			throw new Exception("No se ha definido el tiempo de sesión.");			
		}
		if(SESSION_TIME == 0){
			return;
		}
		if(time() - Session::Mstrr('tiempo') > (SESSION_TIME * 60)){
			Session::Eliminar();
			header('location:' . BASE_URL . 'error/acceso/restringido');			
		}else{
			Session::Escrbr('tiempo', time());
		}
	}
}
?>