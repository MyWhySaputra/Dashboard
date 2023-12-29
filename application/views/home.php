<!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
            	<a href="<?php echo site_url('anggota_ajax/read');?>">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">                   
                     <p class="text-lg font-weight-bold text-primary text-uppercase mb-1">Jumlah Anggota</p>
                     <p class="text-lg" data-counter="counterup" data-value="<?php if (isset($member)) {echo $member;} else {echo "Data tidak muncul!";} ?>">0</p>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
            	<a href="<?php echo site_url('buku_ajax/read');?>">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">               
                      <p class="text-lg font-weight-bold text-success text-uppercase mb-1">Jumlah Buku</p>
                      <p class="text-lg" data-counter="counterup" data-value="<?php if (isset($buku)) {echo $buku;} else {echo "Data tidak muncul!";} ?>">0</p>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>                   
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
            	<a href="<?php echo site_url('peminjaman_ajax/read');?>">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">               	
                      <div class="text-lg font-weight-bold text-info text-uppercase mb-1">Jumlah Peminjaman</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                           <p class="text-lg" data-counter="counterup" data-value="<?php if (isset($peminjaman)) {echo $peminjaman;} else {echo "Data tidak muncul!";} ?>">0</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>                    
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>




<div class="col-xl-6">
				<div class="card card-box">
					<div class="card-head">
						<header>Buku Populer</header>

					</div>
					<div class="card-body no-padding height-9" style="overflow-y:scroll; height:390px;">
						<div class="row">
							<ul class="docListWindow">
								<?php foreach ($qpopuler as $qp) : ?>
									<li>
										<div class="prog-avatar">
											<img src="<?= base_url() ?>img/book.png" alt="">
										</div>
										<div class="details">
											<div class="doctitle">
												<a href="<?= base_url() ?>Buku_ajax/read/<?= $qp->judul ?>"><?= $qp->judul ?></a>
											</div>

										</div>
									</li>
								<?php endforeach; ?>

						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card card-box">
					<div class="card-head">
						<header>List Buku</header>

					</div>
					<div class="card-body no-padding height-9" style="overflow-y:scroll; height:390px;">
						<div class="row">
							<ul class="docListWindow">
								<?php foreach ($qbuku as $qb) : ?>
									<li>
										<div class="prog-avatar">
											<img src="<?= base_url() ?>img/book.png" alt="">
										</div>
										<div class="details">
											<div class="doctitle">
												<a href="<?= base_url() ?>Buku_ajax/read/<?= $qb->judul ?>"><?= $qb->judul ?></a>
											</div>
											<!--
											<div>
												<?php
												if ($qb->jumlah > 0) {
													echo '<span class="clsAvailable float-right">Tersedia</span>';
												} else {
													echo '<span class="clsNotAvailable float-right">Tidak Tersedia</span>';
												}
												?>
											</div>-->
										</div>
									</li>
								<?php endforeach; ?>

						</div>
					</div>
				</div>
			</div>

<div class="col-xl-7 col-md-3 mb-3">
<div class="card card-box">
<div class="card-body">
<div class="row no-gutters align-items-center">

<div id="peminjaman"></div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
	// Build the chart
	Highcharts.chart('peminjaman', {
	    chart: {
	        plotBackgroundColor: null,
	        plotBorderWidth: null,
	        plotShadow: false,
	        type: 'pie'
	    },
	    title: {
	        text: '<?php echo $judulpie;?>'
	    },
	    tooltip: {
	        pointFormat: '{series.name}: <b>{point.y}</b>'
	    },
	    accessibility: {
	        point: {
	            valueSuffix: '%'
	        }
	    },
	    plotOptions: {
	        pie: {
	            allowPointSelect: true,
	            cursor: 'pointer',
	            dataLabels: {
	                enabled: false
	            },
	            showInLegend: true
	        }
	    },
	    series: [{
	        name: 'Peminjaman',
	        colorByPoint: true,

	        //format data penduduk kota
	        data: [
	        		<?php foreach($data_peminjaman as $peminjaman):?>
	        		{
			            name: '<?php echo $peminjaman['nama_peminjam'];?>',
			            y: <?php echo $peminjaman['kode_buku'];?>
			        },
			        <?php endforeach?>
			   	]
	    }]
	});
</script>
<div class="col-auto"> 
</div>
</div>
</div>
</div>
</div>

<div class="col-xl-5 col-md-3 mb-3">
<div class="card card-box">
<div class="card-body">

<div id="pengembalian"></div>

<script type="text/javascript">
	// Build the chart
		Highcharts.chart('pengembalian', {
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Grafik Pengembalian Buku'
	    },
	   
	    xAxis: {
	        categories: [
	            'Telat (Hari)',
	            'Rusak',
	            'Hilang'
	        ],
	        crosshair: true
	    },
	    yAxis: {
	        min: 0,
	        title: {
	            text: 'Pengembalian'
	        }
	    },
	    tooltip: {
	        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
	        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
	            '<td style="padding:0"><b>{point.y}</b></td></tr>',
	        footerFormat: '</table>',
	        shared: true,
	        useHTML: true
	    },
	    plotOptions: {
	        column: {
	            pointPadding: 0.2,
	            borderWidth: 0
	        }
	    },

	    series:  [
	        		<?php foreach($data_pengembalian as $pengembalian):?>
	        		{
			            name: '<?php echo $pengembalian['nama_peminjam'];?>',
			            data: [<?php echo $pengembalian['telat'];?>,<?php echo $pengembalian['rusak'];?>,<?php echo $pengembalian['hilang'];?>]
			        },
			        <?php endforeach?>
			   	]
	});
</script>
<div class="col-auto"> 
</div>
</div>
</div>
</div>
</div>

