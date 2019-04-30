<?php
		include "koneksi.php";
		$query = "SELECT max(Id_pengeluaran) as maxKode FROM pengeluran";
		$hasil = mysqli_query($conn,$query);
		$data = mysqli_fetch_array($hasil);
		$kodeBarang = $data['maxKode'];
		$noUrut = (int) substr($kodeBarang, 3, 3);
		$noUrut++;
		$char = "10";
		$kodeBarang = $char . sprintf("%03s", $noUrut);
        $jml = $_POST['jml_pengeluaran'];
        $jns = $_POST['jns_pengeluaran'];
        $cttn = $_POST['catatan'];
        $tgl = $_POST['tgl'];
        mysqli_query($conn, "INSERT INTO pengeluran VALUES('$kodeBarang','$tgl','$jml','$jns','$cttn')");
        header("location:catat_pengeluaran.php");
     
?>