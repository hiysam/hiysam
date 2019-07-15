<?php
class Alternatif{
	
	private $conn;
	private $table_name = "karyawan";
	
	public $id;	
	public $kt;
	public $ad;
	public $td;
	public $jm;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert(){
		
		$query = "insert into ".$this->table_name." values(?,?,?,?,'')";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);
		$stmt->bindParam(2, $this->kt);
		$stmt->bindParam(3, $this->ad);
		$stmt->bindParam(4, $this->td);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function readAll($per=null,$limit=null){
		if(!empty($per)){
			if (!empty($limit)) {
				$query = "SELECT * FROM ".$this->table_name." a,rangking r where a.nik=r.nik and year(r.tahun_normalisasi) = '".$per."' group by a.nik ORDER BY hasil_karyawan DESC LIMIT ".$limit;
			}else{
				$query = "SELECT * FROM ".$this->table_name." a,rangking r where a.nik=r.nik and year(r.tahun_normalisasi) = '".$per."' group by a.nik ORDER BY hasil_karyawan DESC";
			}
		}else{
			$query = "SELECT * FROM ".$this->table_name." ORDER BY hasil_karyawan DESC";
		}
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	function readLL($pe){

		$query = "SELECT * FROM ".$this->table_name." a,rangking r where a.nik=r.nik and year(r.tahun_normalisasi) = '".$pe."' group by a.nik ORDER BY hasil_karyawan DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	function readKri($per){

		$query = "SELECT * FROM karyawan d, karyawan a, kriteria b, rangking c where a.nik=c.nik and b.id_kriteria=c.id_kriteria and c.nik=d.nik and year(c.tahun_normalisasi) = '".$per."'ORDER BY d.hasil_karyawan DESC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE nik=? LIMIT 0,1";

		
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		
		$this->kt = $row['nama_karyawan'];
		$this->ad = $row['alamat_karyawan'];
		$this->td = $row['telepon'];
		$this->id = $row['nik'];
	}

	function readKar(){
		
		$query = "SELECT * FROM " . $this->table_name;

		
		
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;	
	}
	

	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
				 nama_karyawan = :kt,   alamat_karyawan = :ad,    telepon = :td   
				WHERE
					nik = :id";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':kt', $this->kt);
		$stmt->bindParam(':ad', $this->ad);
		$stmt->bindParam(':td', $this->td);
		$stmt->bindParam(':id', $this->id);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE nik = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>