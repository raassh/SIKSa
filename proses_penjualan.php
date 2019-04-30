<?php 
	include 'koneksi.php';

if (isset($_POST['jual'])) {
	
	$query = "SELECT max(id_penjualan) as maxId FROM penjualan";
	$hasil = mysqli_query($conn,$query);
	$data = mysqli_fetch_array($hasil);
	$idPenjualan = $data['maxId'];
	$noUrut = (int) substr($idPenjualan, 3, 3);
	$noUrut++;
	$char = "10";
	$idPenjualan = $char . sprintf("%03s", $noUrut);

	$tgl = $_POST['tanggal'];
	$jml_kerupuk = $_POST['jml_kerupuk'];
	$jml_penjualan = $_POST['jml_penjualan'];
	$jns_kerupuk = $_POST['jns_kerupuk'];
	$jns_pembeli = $_POST['jns_pembeli'];
	$nm_pembeli = $_POST['nm_pembeli'];
	$no_telp_pembeli = $_POST['no_telp_pembeli'];
	$almt_pembeli = $_POST['almt_pembeli'];
	$catatan = $_POST['catatan'];

	$insert = mysqli_query($conn,"INSERT INTO penjualan(id_penjualan,tgl,jml_krupuk,jml_penjualan,jns_kerupuk,jns_pembeli,nm_pembeli,no_telp,alamat,catatan) VALUES('$idPenjualan','$tgl','$jml_kerupuk','$jml_penjualan','$jns_kerupuk','$jns_pembeli','$nm_pembeli','$no_telp_pembeli','$almt_pembeli','$catatan')");

	if ($insert) {
		echo "<script>alert('Input Data Berhasil')</script>";
		echo "<script>location.href='index.php'</script>";
	} else {
		echo "<script>alert('Input Data Gagal')</script>";
		echo "<script>location.href='catat_penjualan.php'</script>";
	}
}

?>