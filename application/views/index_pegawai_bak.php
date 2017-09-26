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
								<h5> Kotak Masuk Tahun ini <span class="txt-color-blue"><?php echo $masuk;?></span></h5>
							</li>
							<li class="sparks-info">
								<h5> Kotak Keluar tahun ini <span class="txt-color-purple"><?php echo $keluar;?></span></h5>
							</li>
							<li class="sparks-info">
								<h5> Pertanyaan Tahun ini <span class="txt-color-green"><?php echo $tanya;?></span></h5>
							</li>
							<li class="sparks-info">
								<h5> Keluhan tahun ini <span class="txt-color-red"><?php echo $keluh;?></span></h5>
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

									<div class="widget-body">
										<!-- content -->
										<div id="myTabContent" class="tab-content">
											<div class="tab-pane fade active in padding-10 no-padding-bottom" id="s1">
												<div class="padding-10">
													<div id="statsChart" class="chart-large has-legend-unique"></div>
												</div>
												<div class="padding-10">
													<div id="statsChart2" class="chart-large has-legend-unique"></div>
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
				var 
				pertanyaan = [[1, 27], [2, 34], [3, 51], [4, 48], [5, 55], [6, 65], [7, 61], [8, 70], [9, 65], [10, 75], [11, 57], [12, 59], [13, 62]], 
				keluhan = [[1, 25], [2, 31], [3, 45], [4, 37], [5, 38], [6, 40], [7, 47], [8, 55], [9, 43], [10, 50], [11, 47], [12, 39], [13, 47]];
				/*kotak_masuk = data.masuk_det,
				kotak_keluar = data.keluar_det,
				*/
				//kotak_masuk = [[1, 27], [2, 34], [3, 51], [4, 48], [5, 55], [6, 65], [7, 61], [8, 70], [9, 65], [10, 75], [11, 57], [12, 59], [13, 62]], 
				//kotak_keluar = [[1, 25], [2, 31], [3, 45], [4, 37], [5, 38], [6, 40], [7, 47], [8, 55], [9, 43], [10, 50], [11, 47], [12, 39], [13, 47]], 
				var datas =[];
				var len = data.kelas.length;
				for (var i=0; i<len; i++)
				{
					datas.push({
						label : data.kelas[i].nama,
						data : kelas[i],
						lines : {
							show : true,
							lineWidth : 1,
							fill : true,
							fillColor : {
								colors : [{
									opacity : 0.1
								}, {
									opacity : 0.13
								}]
							}
						},
						points : {
							show : true
						}
					});
				}

				var datab = [{
					label : "kotak keluar",
					data : kotak_keluar,
					lines : {
						show : true,
						lineWidth : 1,
						fill : true,
						fillColor : {
							colors : [{
								opacity : 0.1
							}, {
								opacity : 0.13
							}]
						}
					},
					points : {
						show : true
					}
				}, {
					label : "kotak masuk",
					data : kotak_masuk,
					lines : {
						show : true,
						lineWidth : 1,
						fill : true,
						fillColor : {
							colors : [{
								opacity : 0.1
							}, {
								opacity : 0.13
							}]
						}
					},
					points : {
						show : true
					}
				}];

				var options = {
					grid : {
						hoverable : true
					},
					colors : ["#568A89", "#3276B1"],
					tooltip : true,
					tooltipOpts : {
						//content : "Value <b>$x</b> Value <span>$y</span>",
						defaultTheme : false
					},
					xaxis : {
						ticks : [[1, "JAN"], [2, "FEB"], [3, "MAR"], [4, "APR"], [5, "MAY"], [6, "JUN"], [7, "JUL"], [8, "AUG"], [9, "SEP"], [10, "OCT"], [11, "NOV"], [12, "DEC"]]
					},
					yaxes : {

					}
				};

				var options2 = {
					grid : {
						hoverable : true
					},
					colors : ["#568A89", "#3276B1","#DA70D6","#9932CC","#483D8B","#6495ED"],
					tooltip : true,
					tooltipOpts : {
						//content : "Value <b>$x</b> Value <span>$y</span>",
						defaultTheme : false
					},
					xaxis : {
						ticks : [[1, "JAN"], [2, "FEB"], [3, "MAR"], [4, "APR"], [5, "MAY"], [6, "JUN"], [7, "JUL"], [8, "AUG"], [9, "SEP"], [10, "OCT"], [11, "NOV"], [12, "DEC"]]
					},
					yaxes : {

					}
				};

				var plot3 = $.plot($("#statsChart"), datab, options);
				var plot4 = $.plot($("#statsChart2"), datas, options2);
				// END TAB 2
			});
		</script>