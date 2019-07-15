<?php
	session_start();
	include("koneksi.php");
	if (@$_SESSION['userlogin'] == "")
	{
		header("location:login.php?pesan=Belum Login");
		exit;
	}
	mysql_query("DELETE FROM alternatif_kriteria WHERE id_alternatif_kriteria = '$_GET[id_alternatif_kriteria]'");
	header("location:dataAlternatifKriteria.php");
?>