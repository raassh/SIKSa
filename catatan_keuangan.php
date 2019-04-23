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
	<div class="container-fluid">
		<div class="row">
			<br>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<button class="btn btn-danger">Halaman Awal</button>
			</div>
			<div class="col-sm-8">
				<h2>Catatan Keuangan</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<br>
				<ul class="nav nav-tabs">
    				<li class="nav-item">
      					<a class="nav-link active" data-toggle="tab" href="#cpj">Catatan Penjualan</a>
    				</li>
    				<li class="nav-item">
      					<a class="nav-link" data-toggle="tab" href="#cpg">Catatan Pengeluaran</a>
    				</li>
    				<li class="nav-item">
      					<a class="nav-link" data-toggle="tab" href="#lck">Laporan Catatan Keuangan</a>
    				</li>
  				</ul>
  				<div class="tab-content">
    				<div id="cpj" class="container tab-pane active"><br>
    					<div class="container-fluid">
    						<div class="row">
    							<div class="col-sm-2">
    								<div class="form-group">
  										<label for="sel1">Bulan/Tahun :</label>
  										<select class="form-control" id="sel1">
    										<option>4/2019</option>
    										<option>3/2019</option>
  										</select>
									</div>
    							</div>
    							<div class="col-sm-10">
    								<table class="table table-hover table-striped">
      									<thead>
      										<tr>
      											<th>Tanggal</th>
      											<th>Prediksi Penjualan</th>
      											<th>Riil Penjualan</th>
      										</tr>	
      									</thead>
      									<tbody>
      										<tr class="<?php if (mt_rand(0, 5) <= 2) echo "table-danger" ?>">
      											<td>23/4/2019</td>
      											<td>Rp. 120000</td>
      											<td>Rp. 120000</td>
      										</tr>
      									</tbody>
      								</table>
    							</div>
    						</div>
    					</div>
    				</div>
    				<div id="cpg" class="container tab-pane fade"><br>
      					<div class="container-fluid">
    						<div class="row">
    							<div class="col-sm-2">
    								<div class="form-group">
  										<label for="sel1">Bulan/Tahun :</label>
  										<select class="form-control" id="sel1">
    										<option>4/2019</option>
    										<option>3/2019</option>
  										</select>
									</div>
    							</div>
    							<div class="col-sm-10">
    								<table class="table table-hover table-striped">
      									<thead>
      										<tr>
      											<th>Tanggal</th>
      											<th>Jumlah Pengeluaran</th>
      											<th>Keterangan</th>
      										</tr>	
      									</thead>
      									<tbody>
      										<tr>
      											<td>23/4/2019</td>
      											<td>Rp. 100000</td>
      											<td>bahan baku</td>
      										</tr>
      									</tbody>
      								</table>
    							</div>
    						</div>
    					</div>
    				</div>
    				<div id="lck" class="container tab-pane fade"><br>
      					<div class="container-fluid">
    						<div class="row">
    							<div class="col-sm-2">
    								<div class="form-group">
  										<label for="sel1">Bulan/Tahun :</label>
  										<select class="form-control" id="sel1">
    										<option>4/2019</option>
    										<option>3/2019</option>
  										</select>
									</div>
    							</div>
    							<div class="col-sm-8">
    								<center>
    									<h3>Laporan Catatan Keuangan</h3>	
    								</center>
    								
    								Bulan : 4<br>
    								Tahun : 2019
    								<table class="table table">
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
      									</tbody>
      								</table>
    							</div>
    							<div class="col-sm-2">
    								<button class="btn btn-info">
    									Cetak
    								</button>
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