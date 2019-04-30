<?php
  include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Catatan Keuangan</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="css/date_style.css">
<!--===============================================================================================-->
<style type="text/css">
  option, select {
    font-family: Poppins-Regular;
  }
  .input-group-addon {
    background-color: rgb(131,146,167); 
    color: white
  }
  #ha, a, button {
    font-family: Montserrat-Medium;
    font-size: 10pt
  }
  label {
    font-family: Montserrat-SemiBold; 
    font-size: 10pt
  }
</style>
</head>
<body>
	<div class="container-fluid">
		<div class="row"><br></div>
		<div class="row">
			<div class="col-sm-2">
				<a id="ha" style="border-radius: 50px; padding-right: 36px" class="btn btn-danger" href="index.php"><i class="fa fa-long-arrow-left m-l-7"></i> Halaman Awal</a>
			</div>
			<div class="col-sm-10">
				<h2 style="font-family: Montserrat-Black; font-weight: bold;">Catatan Keuangan</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<br>
				<ul class="nav nav-tabs">
          <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#ckg">Catatan Keuangan</a>
            </li>
    				<li class="nav-item">
      					<a class="nav-link" data-toggle="tab" href="#cpj">Catatan Penjualan</a>
    				</li>
    				<li class="nav-item">
      					<a class="nav-link" data-toggle="tab" href="#cpg">Catatan Pengeluaran</a>
    				</li>
    				<li class="nav-item">
      					<a class="nav-link" data-toggle="tab" href="#lck">Laporan Catatan Keuangan</a>
    				</li>
  				</ul>
  				<div class="tab-content">
            <div id="ckg" class="container tab-pane active">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-12">
                    <br>
                    <h5 style="font-family: Montserrat-SemiBold">Selamat datang...</h5>
                    <br>
                    <p style="font-family: Montserrat-Medium">Disini Anda bisa melihat catatan penjualan, melihat catatan pengeluaran, dan mencetak laporan catatan keuangan.</p>
                  </div>
                </div>
              </div>
            </div>
    				<div id="cpj" class="container tab-pane fade"><br>
    					<div class="container-fluid">
    						<div class="row">
    							<div class="col-sm-2">
                    <?php
                      $penjualan = mysqli_query($conn, "SELECT * FROM penjualan LEFT JOIN pembeli ON penjualan.id_pembeli = pembeli.id_pembeli");
                          if (isset($_POST['cpj_show'])) {
                            $cpj_b = $_POST['cpj_bln'];
                            $cpj_t = $_POST['cpj_thn'];
                          }
                          else{
                            $cpj_b = date("m");
                            $cpj_t = date("Y");
                          }
                    ?>
                    <form action="" method="post">
                      <div class="form-group">
                      <span style="border-radius: 3px; margin-bottom: 1px; width: 87%" class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </span>
                      <div class="form-inline">
                        <div>
                          <label>Bulan</label>
                          <select name="cpj_bln" class="form-control">
                          <?php 
                            if (!isset($_POST['cpj_show'])){
                          ?>
                            <option value="<?php echo date('m', time()) ?>"><?php echo date('m', time()) ?></option>
                            <option disabled value="">---</option>
                          <?php
                            for ($i=1; $i <= 12 ; $i++) { 
                          ?>
                              <option value="<?php echo date('m', mktime(0, 0, 0, $i, 10)) ?>"><?php echo date('m', mktime(0, 0, 0, $i, 10)) ?></option>
                          <?php
                            }
                          ?>
                          <?php
                            }
                            else{
                          ?>
                              <option value="<?php echo $cpj_b ?>"><?php echo $cpj_b ?></option>
                              <option disabled value="">---</option>
                          <?php
                              for ($i=1; $i <= 12 ; $i++) { 
                          ?>
                              <option value="<?php echo date('m', mktime(0, 0, 0, $i, 10)) ?>"><?php echo date('m', mktime(0, 0, 0, $i, 10)) ?></option>
                          <?php
                            }}
                          ?>
                        </select>
                        </div>
                        <div>
                          <label>Tahun</label>
                          <select name="cpj_thn" class="form-control">
                          <?php
                            if (!isset($_POST['cpj_show'])){
                          ?>
                          <option value="<?php echo date('Y', time()) ?>"><?php echo date('Y', time()) ?></option>
                          <option disabled value="">-----</option>
                          <?php
                            $thn = array();
                            while($u_thn = mysqli_fetch_array($penjualan)){
                              $thn[] = date("Y", strtotime($u_thn['Tgl']));
                            }
                            array_unique($thn);
                            rsort($thn);
                            foreach($thn as $thns){
                          ?>
                          <option value="<?php echo $thns ?>"><?php echo $thns ?></option>
                          <?php
                            }}
                            else{
                          ?>
                          <option value="<?php echo $cpj_t ?>"><?php echo $cpj_t ?></option>
                          <option disabled value="">-----</option>
                          <?php
                            $thn = array();
                            while($u_thn = mysqli_fetch_array($penjualan)){
                              $thn[] = date("Y", strtotime($u_thn['Tgl']));
                            }
                            array_unique($thn);
                            rsort($thn);
                            foreach($thn as $thns){
                          ?>
                          <option value="<?php echo $thns ?>"><?php echo $thns ?></option>
                          <?php
                            }}
                          ?>
                        </select>
                        </div>
                      </div>
                      <input class="btn btn-primary" style="border-radius: 50px; margin: 5px 0px 0px 15px; width: 113px; font-family: Montserrat-Medium; font-size: 10pt; cursor: pointer" type="submit" name="cpj_show" value="Tampilkan">
                  </div>
                    </form>
    							</div>
    							<div class="col-sm-10">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <?php
                          $f_penjualan = mysqli_query($conn, "SELECT * FROM penjualan LEFT JOIN pembeli ON penjualan.id_pembeli = pembeli.id_pembeli WHERE MONTH(Tgl) = '".$cpj_b."' AND YEAR(Tgl) = '".$cpj_t."'");
                          $cek = mysqli_num_rows($f_penjualan);
                          if ($cek <= 0) {
                            echo "<h5 style='font-family: Montserrat-SemiBold'>Maaf... :(</h5>
                                  <br>
                                  <p style='font-family: Montserrat-Medium'>Data penjualan pada bulan ".$cpj_b.", tahun ".$cpj_t." tidak ditemukan.</p>";
                          }
                        else{
                        ?>
                        <thead>
                          <tr>
                            <th>Tanggal</th>
                            <th>Kerupuk</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Pembeli</th>
                            <th>Info Pembeli</th>
                            <th>Catatan</th>
                          </tr> 
                        </thead>
                        <tbody>
                        <?php
                          while ($data = mysqli_fetch_array($f_penjualan)) {
                        ?>
                          <tr>
                            <td><?php echo $data['Tgl']; ?></td>
                            <td><?php echo $data['Tgl'] ?></td>
                            <td><?php echo $data['bnyk_krupuk'] ?></td>
                            <td><?php echo $data['jum_penjualan'] ?></td>
                            <td><?php echo "(".$data['jenis'].") ".$data['nama'] ?></td>
                            <td><?php echo "(".$data['tlp'].") ".$data['alamat'] ?></td>
                            <td><?php echo $data['catatan'] ?></td>
                          </tr>
                        <?php
                          }}
                        ?>
                        </tbody>
                      </table>
                    </div>
    							</div>
    						</div>
    					</div>
    				</div>
    				<div id="cpg" class="container tab-pane fade"><br>
      					<div class="container-fluid">
    						<div class="row">
    							<div class="col-sm-2">
    								<?php
                      $pengeluaran = mysqli_query($conn, "SELECT * FROM pengeluran");
                          if (isset($_POST['cpg_show'])) {
                            $cpg_b = $_POST['cpg_bln'];
                            $cpg_t = $_POST['cpg_thn'];
                          }
                          else{
                            $cpg_b = date("m");
                            $cpg_t = date("Y");
                          }
                    ?>
                    <form action="" method="post">
                      <div class="form-group">
                      <span style="border-radius: 3px; margin-bottom: 1px; width: 87%" class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </span>
                      <div class="form-inline">
                        <div>
                          <label>Bulan</label>
                          <select name="cpg_bln" class="form-control">
                          <?php 
                            if (!isset($_POST['cpg_show'])){
                          ?>
                            <option value="<?php echo date('m', time()) ?>"><?php echo date('m', time()) ?></option>
                            <option disabled value="">---</option>
                          <?php
                            for ($i=1; $i <= 12 ; $i++) { 
                          ?>
                              <option value="<?php echo date('m', mktime(0, 0, 0, $i, 10)) ?>"><?php echo date('m', mktime(0, 0, 0, $i, 10)) ?></option>
                          <?php
                            }
                          ?>
                          <?php
                            }
                            else{
                          ?>
                              <option value="<?php echo $cpg_b ?>"><?php echo $cpg_b ?></option>
                              <option disabled value="">---</option>
                          <?php
                              for ($i=1; $i <= 12 ; $i++) { 
                          ?>
                              <option value="<?php echo date('m', mktime(0, 0, 0, $i, 10)) ?>"><?php echo date('m', mktime(0, 0, 0, $i, 10)) ?></option>
                          <?php
                            }}
                          ?>
                        </select>
                        </div>
                        <div>
                          <label>Tahun</label>
                          <select name="cpg_thn" class="form-control">
                          <?php
                            if (!isset($_POST['cpg_show'])){
                          ?>
                          <option value="<?php echo date('Y', time()) ?>"><?php echo date('Y', time()) ?></option>
                          <option disabled value="">-----</option>
                          <?php
                            $thn = array();
                            while($u_thn = mysqli_fetch_array($pengeluaran)){
                              $thn[] = date("Y", strtotime($u_thn['tgl']));
                            }
                            array_unique($thn);
                            rsort($thn);
                            foreach($thn as $thns){
                          ?>
                          <option value="<?php echo $thns ?>"><?php echo $thns ?></option>
                          <?php
                            }}
                            else{
                          ?>
                          <option value="<?php echo $cpg_t ?>"><?php echo $cpg_t ?></option>
                          <option disabled value="">-----</option>
                          <?php
                            $thn = array();
                            while($u_thn = mysqli_fetch_array($pengeluaran)){
                              $thn[] = date("Y", strtotime($u_thn['tgl']));
                            }
                            array_unique($thn);
                            rsort($thn);
                            foreach($thn as $thns){
                          ?>
                          <option value="<?php echo $thns ?>"><?php echo $thns ?></option>
                          <?php
                            }}
                          ?>
                        </select>
                        </div>
                      </div>
                      <input class="btn btn-primary" style="border-radius: 50px; margin: 5px 0px 0px 15px; width: 113px; font-family: Montserrat-Medium; font-size: 10pt; cursor: pointer" type="submit" name="cpg_show" value="Tampilkan">
                  </div>
                    </form>
    							</div>
    							<div class="col-sm-10">
                    <div class="table-responsive">
    								  <table class="table table-striped">
                      <?php
                          $f_pengeluaran = mysqli_query($conn, "SELECT * FROM pengeluran WHERE MONTH(tgl) = '".date("m", mktime(0, 0, 0, $cpg_b, 10))."' AND YEAR(tgl) = '".date("Y", mktime(0, 0, $cpg_t, 0, 10))."'");
                          $cek = mysqli_num_rows($f_pengeluaran);
                          if ($cek <= 0) {
                            echo "<h5 style='font-family: Montserrat-SemiBold'>Maaf... :(</h5>
                                  <br>
                                  <p style='font-family: Montserrat-Medium'>Data pengeluaran pada bulan ".$cpg_b.", tahun ".$cpg_t." tidak ditemukan.</p>";
                          }
                        else{
                        ?>
                      ?>
      									<thead>
      										<tr>
      											<th>Tanggal</th>
      											<th>Total</th>
                            <th>Peruntukan</th>
      											<th>Catatan</th>
      										</tr>	
      									</thead>
      									<tbody>
                        <?php
                          while ($data = mysqli_fetch_array($f_pengeluaran)){
                        ?>
      										<tr>
      											<td><?php echo $data['tgl']; ?></td>
      											<td><?php echo $data['jumlah']; ?></td>
      											<td><?php echo $data['jenis']; ?></td>
                            <td><?php echo $data['catatan']; ?></td>
      										</tr>
                        <?php
                          }}
                        ?>
      									</tbody>
      								</table>
    							 </div>
                </div>
    						</div>
    					</div>
    				</div>
    				<div id="lck" class="container tab-pane fade"><br>
      					<div class="container-fluid">
    						<div class="row">
    							<div class="col-sm-2">
    								<form action="" method="post">
                      <div class="form-group">
                      <span style="border-radius: 3px; margin-bottom: 1px; width: 82%" class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </span>
                      <div class="form-inline">
                        <div>
                          <label>Bulan</label>
                          <select name="lck_bln" class="form-control" onchange="">
                          <option>4</option>
                          <option>3</option>
                        </select>
                        </div>
                        <div>
                          <label>Tahun</label>
                          <select name="lck_thn" class="form-control">
                          <option>2019</option>
                          <option>2019</option>
                        </select>
                        </div>
                      </div>
                      <input class="btn btn-primary" style="border-radius: 50px; margin-top: 5px; width: 113px; font-family: Montserrat-Medium; font-size: 10pt; cursor: pointer" type="submit" name="lck_show" value="Tampilkan">
                  </div>
                    </form>
    							</div>
    							<div class="col-sm-8">
    								<center>
                      <h5>Kerupuk Sahabat</h5>
                      <br>
                      <h3>Laporan Catatan Keuangan</h3> 
                      <br>
                      <h6>Per 23 April 2019</h6>
                    </center>
                      <br>
                      <div class="table-responsive">
                        <table class="table table-sm">
                          <thead>
                            <tr>
                              <th>Tanggal</th>
                              <th>Penjualan</th>
                              <th>Pengeluaran</th>
                              <th>Keuntungan</th>
                            </tr> 
                          </thead>
                          <tbody>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td>23/4/2019</td>
                              <td>Rp. 120000</td>
                              <td>Rp. 100000</td>
                              <td>Rp. 20000</td>
                            </tr>
                            <tr>
                              <td colspan="4"></td>
                            </tr>
                            <tr>
                              <th><center>Total</center></th>
                                <td>Rp. 120000</td>
                                <td>Rp. 100000</td>
                                <td>Rp. 20000</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                  </div>
    							<div class="col-sm-2">
                    <br>
                    <center>
                      <button style="border-radius: 50px; width: 120px; font-family: Montserrat-Medium; font-size: 10pt" class="btn btn-info" onclick="window.open('print.php');">
                      <i class="fa fa-print"></i> Cetak
                      </button>  
                    </center>
                    <br>
    							</div>
    						</div>
    					</div>
    				</div>
  				</div>
			</div>
		</div>
	</div>
	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="js//jquery-ui.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});


			$(".js-select2").each(function(){
				$(this).on('select2:close', function (e){
					if($(this).val() == "Please chooses") {
						$('.js-show-service').slideUp();
					}
					else {
						$('.js-show-service').slideUp();
						$('.js-show-service').slideDown();
					}
				});
			});
		})
	</script>
  <script>
        //open recently visited tab, reseted when click "Halaman Awal"
        $(document).ready(function () {
            $('#ha').click(function(){
              localStorage.clear();
            });
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                localStorage.setItem('lastTab', $(this).attr('href'));
                $('h2').text($(this).text());
            });
            var lastTab = localStorage.getItem('lastTab');
            if (lastTab) {
              $('[href="' + lastTab + '"]').tab('show');
            }
        })
    </script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="js/date_index.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/noui/nouislider.min.js"></script>
	<script>
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 1500, 3900 ],
	        connect: true,
	        range: {
	            'min': 1500,
	            'max': 7500
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]);
	        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
	        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
  		gtag('js', new Date());
  		gtag('config', 'UA-23581568-13');
	</script>
</body>
</html>