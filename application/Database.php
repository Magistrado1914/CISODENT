<?php
class Database extends PDO {
	private $_Dialogflow;
		/*private $_servername;
        private $_username;
        private $_password;
        private $_database;*/
	public function __construct(){
		
			parent::__construct(
				'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
				DB_USER,
				DB_PASS,
				array(PDO::MYSQL_ATTR_INIT_COMMAND => ' SET NAMES ' . DB_CHAR)
				);
			$this->_Dialogflow = new Dialogflow();
			//$this->_Dialogflow->credenciales();
			
		
	}	

		//Función para conectarse a la base de datos
        /*public function conect(){
            $result = false;
            $this->servername = DB_HOST;
            $this->username = DB_USER;
            $this->password = DB_PASS;
            $this->database = DB_NAME;
            $mysqli = new mysqli($this->servername, $this->username, $this->password, $this->database);
            return $mysqli;
        }*/

}

?>