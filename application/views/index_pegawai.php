			<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Dashboard</li>
				</ol>
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Dashboard <span>> Pegawai</span></h1>
					</div>
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
						<ul id="sparks" class="">
							<li class="sparks-info">
								<h5> Kotak Masuk tahun ini <span class="txt-color-blue"><?php echo $masuk;?></span></h5>
							</li>
							<li class="sparks-info">
								<h5> Kotak Keluar tahun ini <span class="txt-color-red"><?php echo $keluar;?></span></h5>
							</li>
							<li class="sparks-info">
								<h5> Pesan Terkirim tahun ini <span class="txt-color-green"><?php echo $terkirim;?></span></h5>
							</li>
						</ul>
					</div>
				</div>
				<!-- widget grid -->
				<section id="widget-grid" class="">

					<!-- row -->
					<div class="row">
						<article class="col-sm-12">
							<!-- new widget -->
							<div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
								<!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"

								-->
								<header>
									<span class="widget-icon"> <i class="glyphicon glyphicon-stats txt-color-darken"></i> </span>
									<h2>Grafik SMS</h2>

									<ul class="nav nav-tabs pull-right in" id="myTab">
										<li class="active">
											<a data-toggle="tab" href="#s2"> <span class="hidden-mobile hidden-tablet">Tahun 2016</span></a>
										</li>
									</ul>
								</header>

								<!-- widget div-->
								<div class="no-padding">
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										test
									</div>
									<!-- end widget edit box -->

									<div class="widget-body no-padding">
										<!-- content -->
										<div id="myTabContent" class="tab-content">
											<div class="tab-pane fade active in padding-10 no-padding-bottom" id="s1">
												<div class="padding-10">
													<canvas id="barChart" height="100"></canvas>
												</div>
											</div>
											<!-- end s2 tab pane -->

										</div>

										<!-- end content -->
									</div>

								</div>
								<!-- end widget div -->
							</div>
							<!-- end widget -->

						</article>
					</div>

					<!-- end row -->

					<!-- row -->

					<!-- end row -->

				</section>
				<!-- end widget grid -->

			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->			
		<script>
			$(document).ready(function() {

				// DO NOT REMOVE : GLOBAL FUNCTIONS!
				pageSetUp();

				/*
				 * PAGE RELATED SCRIPTS
				 */
				 
				 jQuery.extend({
				    getValues: function() {
				        var result = null;
				        $.ajax({
					    url: "<?php echo base_url();?>index.php/login/GetAjax",
					    type: 'POST',				    
					    dataType:"json",
					    async:false,
					    success: function(data) {
					        result = data;
					   }});
				       return result;
				    }
				});

				var data = $.getValues();
				//alert(data.kelas[0][0][0]);

				$(".js-status-update a").click(function() {
					var selText = $(this).text();
					var $this = $(this);
					$this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
					$this.parents('.dropdown-menu').find('li').removeClass('active');
					$this.parent().addClass('active');
				});

				var kotak_masuk = new Array(13);
				var kotak_keluar = new Array(13);
					for (var i = 0; i < 13; i++) {
					  kotak_masuk[i] = new Array(2);
					  kotak_keluar[i] = new Array(2);
					}

				for (var i = 0; i < 12; i++) {
					kotak_masuk[i][0] = data.masuk_det[i].tahun;
					kotak_masuk[i][1] = data.masuk_det[i].value;

					kotak_keluar[i][0] = data.keluar_det[i].tahun;
					kotak_keluar[i][1] = data.keluar_det[i].value;
				}

				var kelas = new Array(data.kelas.length);
				for(var i=0; i<data.kelas.length; i++)
					kelas[i] = new Array(13);
				for(var j=0; j<data.kelas.length; j++)
					for (var i=0; i<12; i++)
						kelas[j][i] = new Array(2)

				for (var i = 0; i < data.kelas.length; i++) 
				{
					for (var j=0; j<12; j++)
					{
						kelas[i][j][0] = data.kelas[i][j][0];	
						kelas[i][j][1] = data.kelas[i][j][1];	
					}
				}
				var len = data.kelas.length;

				/* bar chart */
				var randomColorFactor = function() {
		            return Math.round(Math.random() * 255);
		        };
		        var randomColor = function() {
		            return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + '0.5)';
		        };
				var randomScalingFactor = function() {
		            return Math.round(Math.random() * 100);
		            //return 0;
		        };

		        var komposisi = [
		        	"rgba(220,220,220,0.5)",
		        	"rgba(151,187,205,0.5)",
		        	"rgba(220,20,60,0.5)",
		        	"rgba(144,138,60,0.5)",
		        	"rgba(225,140,60,0.5)",
		        	"rgba(189,183,107,0.5)",
		        	"rgba(0,200,60,0.5)"
		        	
		        ]

		        var showGraph = [];
		        var temp = [];
		        for(i=0; i<len; i++)
		        {
		        	for(j=0; j<12; j++)
		        	{
		        		temp.push(kelas[i][j][1]);
		        	}
		        	showGraph.push({
	        			label: data.kelas[i].nama,
	        			backgroundColor: komposisi[i],
	        			data: temp
	        		});
	        		temp = [];
		        }

				var barChartData = {
		            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
		            datasets: showGraph
		        };

		        window.onload = function() {
		            window.myBar = new Chart(document.getElementById("barChart"), {
		                type: 'bar',
		                data: barChartData,
		                options: {
		                    responsive: true,
		                }
		            });
		        };
			});
		</script>