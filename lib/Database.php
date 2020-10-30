<?php

class Database{
	private $hostdb = "localhost";
	private $userdb = "root";
	private $passdb = "";
	private $namedb = "lifedb";
	public $pdo;

	function __construct(){
		if(!isset($this->pdo)){
			try{
				$link = new PDO("mysql:host=".$this->hostdb.";dbname=".$this->namedb,$this->userdb,$this->passdb);
				$this->pdo = $link;
				//echo "COnnected Successfully";
			}catch(PDOException $e){
				die("Failed to connect with Database".$e->getMessage());
			}
		}
	}
}

?>