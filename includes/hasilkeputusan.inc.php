<?php
class Rangking{
	
	private $conn;
	private $table_name = "rangking";
	
	public $ia;
	public $ik;
	public $nn;
	public $nn2;
	public $nn3;
	public $mnr1;
	public $mnr2;
	public $has;
	public $tahun;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert(){
		$tgl = date('Y-m-d');
		$query = "insert into ".$this->table_name." values(?,?,?,'','',?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->ia);
		$stmt->bindParam(2, $this->ik);
		$stmt->bindParam(3, $this->nn);
		$stmt->bindParam(4, $tgl);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}

	function insertKeputusan($nik,$tahun){
		$tgl = date('Y-m-d');
		$query = "insert into hasil values('".$nik."','".$tahun."','')";
		$stmt = $this->conn->prepare($query);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}

	function cetakKeputusan($nik,$tahun){
		$query = "select * from hasil h inner join karyawan k on h.nik=k.nik where h.nik='".$nik."' and h.tahun='".$tahun."'";
		$stmt = $this->conn->prepare($query);
		
		if($stmt->execute()){
			return $stmt;
		}else{
			return false;
		}
		
	}
	
	function readAll(){

		$query = "SELECT * FROM ".$this->table_name;
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function readKhusus(){
		if (isset($_POST['tahun'])) {
			$tahun = $_POST['tahun'];
			$query = "SELECT * FROM karyawan a, kriteria b, rangking c where a.nik=c.nik and b.id_kriteria=c.id_kriteria and year(c.tahun_normalisasi) = '".$tahun."' order by a.nik asc";
		}else{
			$query = "SELECT * FROM karyawan a, kriteria b, rangking c where a.nik=c.nik and b.id_kriteria=c.id_kriteria order by a.nik asc";
		}
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function readR($a,$pe=null){
		if (!empty($pe)) {
			$query = "SELECT * FROM karyawan a, kriteria b, rangking c where a.nik=c.nik and b.id_kriteria=c.id_kriteria and c.nik='$a' and year(c.tahun_normalisasi) = '".$pe."'";
		}else{
			$query = "SELECT * FROM karyawan a, kriteria b, rangking c where a.nik=c.nik and b.id_kriteria=c.id_kriteria and c.nik='$a'";
		}
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	function readL($a,$pe){
		$query = "SELECT * FROM karyawan a, kriteria b, rangking c where a.nik=c.nik and b.id_kriteria=c.id_kriteria and c.nik='$a' and year(c.tahun_normalisasi) = '".$pe."'";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	function readMax($b){
		
		$query = "SELECT max(nilai_rangking) as mnr1 FROM " . $this->table_name . " WHERE id_kriteria='$b' LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	
	function readMin($b){
		
		$query = "SELECT min(nilai_rangking) as mnr2 FROM " . $this->table_name . " WHERE id_kriteria='$b' LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	
	
	function readHasil($a){
		
		$query = "SELECT sum(bobot_normalisasi) as bbn FROM " . $this->table_name . " WHERE nik='$a' LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}
	
	// used when filling up the update product form
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE nik=? and id_kriteria=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->ia);
		$stmt->bindParam(2, $this->ik);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->ia = $row['nik'];
		$this->ik = $row['id_kriteria'];
		$this->nn = $row['nilai_rangking'];
	}
	
	// update the product
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nilai_rangking = :nn
				WHERE
					nik = :ia 
				AND
					id_kriteria = :ik";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nn', $this->nn);
		$stmt->bindParam(':ia', $this->ia);
		$stmt->bindParam(':ik', $this->ik);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function normalisasi(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nilai_normalisasi = :nn2,
					bobot_normalisasi = :nn3
				WHERE
					nik = :ia 
				AND
					id_kriteria = :ik";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nn2', $this->nn2);
		$stmt->bindParam(':nn3', $this->nn3);
		$stmt->bindParam(':ia', $this->ia);
		$stmt->bindParam(':ik', $this->ik);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	function hasil(){

		$query = "UPDATE 
					karyawan
				SET 
					hasil_karyawan = :has
				WHERE
					nik = :ia";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':has', $this->has);
		$stmt->bindParam(':ia', $this->ia);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE nik = ? and id_kriteria = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->ia);
		$stmt->bindParam(2, $this->ik);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>