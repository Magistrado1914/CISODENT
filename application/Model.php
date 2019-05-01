<?php
class Model {
	protected $_DB;
	protected $_DialogFlow;
	public function __construct(){
		$this->_DB = new Database();
		$this->_DialogFlow = new Dialogflow();
		//$this->_DB->conect();
	}
}
?>