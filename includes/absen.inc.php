<?php
	class Absen{
	
	private $conn;
	private $table_name = "absen";

	public $nik;
	public $tahun;
	public $rata;

	public function __construct($db){
		$this->conn = $db;
	}


	function insert() { 
 
		$query = "insert into ".$this->table_name." values(?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nik);
		$stmt->bindParam(2, $this->tahun);
		$stmt->bindParam(3, $this->rata);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
}
?>