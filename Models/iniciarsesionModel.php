<?php
class iniciarsesionModel extends Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function MstrrUsuario($Usuario, $Contrasena){
		$Datos = $this->_DB->query(
			"SELECT * FROM `Usuario` AS Usrs " .
			"WHERE `cod_usuario` = '$Usuario' " .
			"AND `pwd_usr` = '" . Hash::MstrrHash('sha1', $Contrasena, HASH_KEY) . "';"
		);
		return $Datos->fetch();

	}
}
?>