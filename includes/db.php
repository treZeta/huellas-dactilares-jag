<?php
class db{
	private $host;
	private $user;
	private $db;
	private $password;
	private $charset;

	public function __construct(){
		
		$this->host = "localhost";
		$this->user = "root";
		$this->password = "01081940";
		$this->charset = "utf8mb4";
		$this->db = "jagdb";

	}

	public function connect(){
		try{
			$connection = "mysql:host=" . $this->host . "; dbname=" . $this->db . "; charset=" . $this->charset;

			$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
						PDO::ATTR_EMULATE_PREPARES => false];

			$pdo = new PDO($connection, $this->user, $this->password, $options);

			return $pdo;
		} catch(PDOException $e){
			print_r("Error en la conexion " . $e->getMessage());
		}
	}
}
?>