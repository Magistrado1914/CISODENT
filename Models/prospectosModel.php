<?php
class prospectosModel extends Model{
	
	public function __construct(){
		parent::__construct();
	}
    /**
     * Mstrr_Prspcts (Mostrar: Prospectos)
     */
	public function Mstrr_Prspcts($Actvr){
        switch($Actvr){
            case 0:
                break;

            case 1:
                //$Datos = $this->_DB->autocommit(FALSE);
                $Datos = $this->_DB->query(
                    "SELECT * FROM `prospecto`;"
                );
				
            break;
		}
		return $Datos->fetchAll();
		
    }
    
    public function Agrr_Prspcts($Asunto, $Contenido, $Activar){
		$this->_DB->prepare("INSERT INTO `prospecto` (`cod_prospe`, `cod_empresa`, `ape_paterno`, `ape_materno`, `nombres`, `fec_contac`, `tel_cel`, `num_pros`, `flgprior`, `flg_sexo`, `est_reg`, `fec_reg`, `usr_reg`, `fec_mod`, `usr_mod`, `maq_ip`, `cod_tip_cap`, `observa`, `cod_tip_ori`, `flg_asisten`) VALUES('0', '', '', '', '$Nombres', '', '$Numero', '', '', '', '', '', '', '', '', '', '', '', '', '');")
			->execute(
					array(
							':Asunto' => $Asunto,
							':Contenido' => $Contenido,
							':Activar' => $Activar,
						)
				);
	}
	public function Mstr_PrspctsEspcfcs($Actvr, $Opcn, $Texto){
		switch($Actvr){

			case 0:
				
				break;

			case 1:
				switch($Opcn){
					case 0:
						
						$Servicios = $this->_DB->query("SELECT * FROM `prospecto` AS `prspct` WHERE `prspct`.`nombre` = '$Texto';");
						break;

					case 1:
						$Servicios = $this->_DB->query("SELECT * FROM `prospecto` AS `prspct` WHERE `prspct`.`nombre` = '$Texto';");
						break;
				}
				break;
		}		
		return $Servicios->fetch();
	}
	public function Mdfcr_Prspcts($Referencia, $Asunto, $Contenido, $Activar){
		$Referencia = (int) $Referencia;
		$this->_DB->prepare("UPDATE `prospecto` SET `Asunto` = :Asunto, `Contenido` = :Contenido, `ACTIVO` = :Activar WHERE `Referencia` = :Referencia;")
			->execute(
					array(
							':Referencia' => $Referencia,
							':Asunto' => $Asunto,
							':Contenido' => $Contenido,
							':Activar' => $Activar
						)
				);
	}
	public function Elmnr_Prspcts($Referencia){
		$Referencia = (int) $Referencia;
		$this->_DB->query("DELETE FROM `servicios` WHERE `Referencia` = $Referencia;");
	}
}
?>