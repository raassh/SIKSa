<?php 
include('koneksi.php');
include('proseslogin.php');

if(login_check()){
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.0.0.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/home.css">

	<title>Home</title>
</head>
<body style="margin-top: 100px; margin-left: 50px">
	<section>
  	<div>
      <center>
      		<div>
        		<p>
 					<div class="container">
	              		<a href="catat_pengeluaran.php" class="btn btn-primary btn-lg"  role="button" style="width: 700px" >
		 					<div class="overlay">
			              		<img src="images/FieldNote.png" width="80" height="80" class="image" />
			              	</div>
	               		 Catat Pengeluaran
	              		</a>
	              	</div>
            	</p>
          </div>
      <div>
        		<p>
        			<div class="container">
        				<a href="catat_penjualan.php" class="btn btn-primary btn-lg"  role="button" style="width: 700px">
							<div class="overlay">
        						<img src="images/Calculator_icon.png" width="80" height="80" alt=""/> 
							</div>
        					Catat Penjualan</a>
        			</div>
        		</p>
      </div>

      <div>
        		<p>
        			<div class="container">
	        			<a href="catatan_keuangan.php" class="btn btn-primary btn-lg"  role="button" style="width: 700px">
	        				<div class="overlay">
	        					<img src="images/graph.png" width="80" height="80" alt="" />
	        				</div>
	        				Lihat catatan Penjualan</a>
        			</div>
        		</p>
      </div>

      <div>
            <p><a href="proseslogin.php?logout"  class="btn btn-primary btn-lg" style="width: 700px"> LogOut</a></p>
      </div>
      </center>
</div>
    </section>
</body>
</html>
<?php }
	else{
          echo '<script type="text/javascript">
                alert("Silahkan login terlebih dahulu.");
                window.location.href="login.php";
            </script>';
        }

 ?>