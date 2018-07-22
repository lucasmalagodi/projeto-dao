<?php 

class Sql extends PDO{
	
	

	private $host;
	private $bd;
	private $user;
	private $pass;
	private $conn;

	public function __construct($host,$bd, $user,$pass){
		
				
		$this->conn = new PDO("mysql:host=$host;dbname=$bd", "$user","$pass");

	}


	private function setParams($statment, $parameters = array()){

		foreach ($parameters as $key => $value) {
			
			$statment->setParam($key, $value);

		}		
	}

	private function setParam($statment, $key, $value){

		$statment->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array()){
		
		$stmt  = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt; 
	
	}

	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->query($rawQuery, $params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);


	}

}



 ?>