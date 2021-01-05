<?php
/**
 * koneksi
 */
require_once 'conf/databases.php';
class Koneksi{
	private $host= DB_SERER;
	private $name= DB_USER;
	private $pass= DB_PASS;
	private $db_name= DB_NAME;

	protected $stmt;
	protected $dbh;
	
	function __construct()
	{
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;

		$option = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try{ 
			$this->dbh = new PDO($dsn, $this->name, $this->pass, $option);
		}catch(PDOEception $e){
			die($e->getMassage());
		}
	}
}