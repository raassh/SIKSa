<?php 
include('koneksi.php');
include('proseslogin.php');

if(login_check()){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Catat Penjualan</title>
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
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="post" action="proses_catat_penjualan.php">
				<input id="tgl_penjualan" type="hidden" name="tgl_penjualan" value="" />
				<span class="contact100-form-title">
					Catat Penjualan
				</span>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100">
					<span class="label-input100">TANGGAL *</span>
					  <div class="date-picker">
					  	<div class="input">
					  		<div id="tgl_penjualan_label" class="result">Select Date:</div>
					  		<button><i class="fa fa-calendar"></i></button>
					  	</div>
					  	<div class="calendar"></div>
					  </div>
				</div>
				

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">BANYAK KERUPUK</span>
					<input class="input100" type="text" name="jml_kerupuk" placeholder="Masukkan banyaknya kerupuk">
				</div>


				<div class="wrap-input100 bg1">
					<span class="label-input100">JUMLAH PENJUALAN</span>
					<input class="input100" type="text" name="jml_penjualan" placeholder="Masukkan jumlah penjualan (RP)">
				</div>

				<div class="wrap-input100 validate-input bg1 " data-validate = "Jenis penjualan kosong" >
					<span class="label-input100">JENIS KERUPUK *</span>
					<input class="input100" type="text" name="jns_penjualan" placeholder="Masukkan jenis penjualan ">
				</div>

				
				<div class="wrap-input100 input100-select bg1">
					<span class="label-input100">PEMBELI</span>
					<div>
						<select class="js-select2" name="jns_pembeli">
							<option>Silahkan pilih</option>
							<option>Penjual Kerupuk</option>
							<option>Pembeli Perorangan</option>
						</select>
						<div class="dropDownSelect2"></div>
					</div>
				</div> 

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">NAMA PEMBELI</span>
					<input class="input100" type="text" name="nm_pembeli" placeholder="Masukkan nama pembeli">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100">
					<span class="label-input100">NO. TELP PEMBELI</span>
					<input class="input100" type="text" name="no_telp_pembeli" placeholder="Masukkan no. telepon">
				</div>

				<div class="wrap-input100 bg1">
					<span class="label-input100">ALAMAT PEMBELI</span>
					<input class="input100" type="text" name="almt_pembeli" placeholder="Masukkan alamat pembeli">
				</div>

				<div class="wrap-input100 bg0" >
					<span class="label-input100">Catatan</span>
					<textarea class="input100" name="catatan" placeholder="Catatan Tambahan"></textarea>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
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
	<script>
		$('#result span').val(tgl);
	</script>
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
<?php }
	else{
          echo '<script type="text/javascript">
                alert("Silahkan login terlebih dahulu.");
                window.location.href="login.php";
            </script>';
        }

 ?>