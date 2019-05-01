<?php
class registrarModel extends Model{

	public function __construct(){
		parent::__construct();
	}

	public function verificarUsuario($Usuario){
		$Referencia = $this->_DB->query(
			"SELECT `Referencia` FROM `Usuarios` AS Usrs WHERE Usrs.`Usuario` = '$Usuario';"
		);
		// Si existe el Usuario.
		if($Referencia->fetch()){
			return true;
		}
		// Si no existe el Usuario.
		return false;
	}

	public function verificarCorreo($Correo){
		$Referencia = $this->_DB->query(
			"SELECT `Referencia` FROM `Usuarios` AS Usrs WHERE Usrs.`Correo` = '$Correo';"
		);
		// Si existe el Correo.
		if($Referencia->fetch()){
			return true;
		}
		// Si no existe el Correo.
		return false;
	}

	public function MstrrServicios(){
		
		$Servicios = $this->_DB->query("SELECT * FROM `Servicios` AS Srvcs WHERE Srvcs.`ACTIVO` = 1;");
		return $Servicios->fetchall();
	}
	
	public function AgrrUsrs($Usuario, $Correo, $Contrasena){
		$this->_DB->prepare("INSERT INTO `Usuarios` (`Referencia`, `Usuario`, `Correo`, `Contrasena`, `FechaIngreso`, `Rol`, `Estado`, `Activo`) " .
			"VALUES (NULL, :Usuario, :Correo, :Contrasena, :FechaIngreso, :Rol, :Estado, :Activo);")
			->execute(
					array(
							':Usuario' => $Usuario,
							':Correo' => $Correo,
							':Contrasena' => Hash::MstrrHash('sha1', $Contrasena, HASH_KEY),
							':FechaIngreso' => date("m-d-y"),
							':Rol' => 'Usuario',
							':Estado' => 1,
							':Activo' => 1,
						)
				);
	}
	public function MstrrUsrsEspcfcs($Actvr, $Opcn, $Referencia){
		switch($Actvr){

			case 0:
				
				break;

			case 1:
				switch($Opcn){
					case 0:
						$Referencia = (int) $Referencia;
						$Servicios = $this->_DB->query("SELECT * FROM `Usuarios` AS Usrs WHERE Usrs.`Referencia` = $Referencia;");
						break;

					case 1:
						$Servicios = $this->_DB->query("SELECT * FROM `Usuarios` AS Usrs WHERE Usrs.`Usuario` = $Referencia;");
						break;
				}
				break;
		}		
		return $Servicios->fetch();
	}
	public function MdfcrInfmcnUsrs($Usuario, $Correo, $Rol, $Estado, $Activo){
		$Referencia = (int) $Referencia;
		
			$this->_DB->prepare("UPDATE `Usuarios` SET `Usuario` = :Usuario, `Correo` = :Correo, `Rol` = :Rol, `Estado` = :Estado, `Activo` = :Activo WHERE `Referencia` = :Referencia;")
			->execute(
					array(
							':Usuario' => $Usuario,
							':Correo' => $Correo,
							':FechaIngreso' => date("m-d-y"),
							':Rol' => 'Usuario',
							':Estado' => 1,
							':Activo' => 1,
						)
				);
	}
	public function ElmnrUsrs($Referencia){
		$Referencia = (int) $Referencia;
		$this->_DB->query("DELETE FROM `Usuarios` WHERE `Referencia` = $Referencia;");
	}
}
?>