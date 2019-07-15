<?php 
include '../pages/head.php';

include_once '../includes/alternatif.inc.php';
$pro1 = new Alternatif($db);
if (isset($_POST['tahun'])) {
    $stmt1 = $pro1->readAll($_POST['tahun']);
}else{    
    $stmt1 = $pro1->readAll();
}
include_once '../includes/kriteria.inc.php';
$pro2 = new Kriteria($db);
$stmt2 = $pro2->readAll();
include_once '../includes/hasilkeputusan.inc.php';
$pro = new Rangking($db);
$stmt = $pro->readKhusus();

if($pro->insertKeputusan($_GET['nik'],$_GET['tahun'])){
	$hsl = $pro->cetakKeputusan($_GET['nik'],$_GET['tahun']);
	$hasil = $hsl->fetch(PDO::FETCH_ASSOC);
}else{
	echo "gagal simpan";
}
?>


<table>
	<font size="5"><b>Armorindo Artha </b></font>
            <br>PT.ARMORINDO ARTHA</br>
            <tr>Jl.Palmerah Utara Raya No.32A Jakarta Barat 11480 Phone: (021)221-227-59 Fax:(021)221-227-49</tr>
            <hr />

            <font size="4"><br><p class="text-center">Hasil Keputusan Karyawan Terbaik</p></br></font>
            <br>
            <p>Untuk hasil keputusan karyawan terbaik adalah sebagai berikut:</p>

			<tr>
				<td>NIK</td>
				<td>: <?= $hasil['nik'] ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>: <?= $hasil['nama_karyawan'] ?></td>
			</tr>
			<tr>
				<td>Hasil</td>
				<td>: <?= $hasil['hasil_karyawan'] ?></td>
			</tr>
			<tr>
				<td>Tahun</td>
				<td>: <?= $hasil['tahun'] ?></td>
			</tr>
</table>
<br>
	<p>Penilaian diambil berdasarkan hasil 4 kriteria yaitu Absensi, Kualitas kerja, Kerjasama, dan Kedisiplinan.</p>
</br>
			<br>
                <div class="text-right" style="width: 92%">
                	<td>Jakarta,</td>
            		<?php
            		echo date(' d F Y');
            		?>
                </div>
                <p class="text-right" style="width: 87%" >Manager</p>
                <div style="height: 50px;"></div>
                <hr align="right" width="30%" >
                <p class="text-right align-bottom border-top border-dark" style="width: 90%">(Andre Davinci)</p>
<script>window.print();
</script>