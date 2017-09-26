		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment"> 
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span> 
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Laporan</li>
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
						<h1 class="page-title txt-color-blueDark">
							<i class="fa fa-table fa-fw "></i> 
								Laporan 
						</h1>
					</div>
				</div>
				
				<!-- widget grid -->
				<section id="widget-grid" class="">
				
					<!-- row -->
					<div class="row">
						<!-- NEW WIDGET START -->
						<article class="col-sm-12 col-md-12 col-lg-6">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false">
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
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h2> Laporan </h2>
				
								</header>
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body no-padding">
										<form id="smart-form-register" class="smart-form" method="post" action="<?php echo base_url()?>index.php/pesan/submitlaporan">
											<header>
												Pilih Data yang akan dibuat dalam Laporan Berdasarkan Filter: 
											</header>
											<fieldset>
												<div class="row">
													<section class="col col-6">
														<label class="input"> <i class="icon-append fa fa-calendar"></i>
															<input type="text" name="tgl_awal" placeholder="Tanggal Awal" class="datepicker" data-dateformat='yy-mm-dd' required="required">
														</label>
													</section>
													<section class="col col-6">
														<label class="input"> <i class="icon-append fa fa-calendar"></i>
															<input type="text" name="tgl_akhir" placeholder="Tanggal Akhir" class="datepicker" data-dateformat='yy-mm-dd' required="required">
														</label>
													</section>
												</div>
												
												<div class="row">
													<label class="label col col-4">Jenis Pesan</label>
												</div>	

												<section>
													<label class="checkbox">
														<input type="checkbox" name="kotak_masuk" id="kotak_masuk">
														<i></i>Kotak Masuk</label>
													<label class="checkbox">
														<input type="checkbox" name="kotak_keluar">
														<i></i>Kotak Keluar</label>
													<label class="checkbox">
														<input type="checkbox" name="pesan_terkirim">
														<i></i>Pesan Terkirim</label>
												</section>

												<div id="simpan" style="display: none;">
													<div class="row">
														<label class="label col col-4">Jenis Kotak Masuk</label>
													</div>
													<div class="row">
														<section class="col col-3">
															<label class="checkbox">
															<input type="checkbox" name="belum_terjawab" checked="checked">
															<i></i>Belum Terjawab</label>
														</section>
														<section class="col col-3">
															<label class="checkbox">
															<input type="checkbox" name="pertanyaan" checked="checked">
															<i></i>Pertanyaan</label>
														</section>
														<section class="col col-3">
															<label class="checkbox">
															<input type="checkbox" name="keluhan" checked="checked">
															<i></i>Keluhan</label>
														</section>
													</div>
													<div class="row">
														<section class="col col-3">
															<label class="checkbox">
															<input type="checkbox" name="jawaban_mesin" checked="checked">
															<i></i>Jawaban Mesin</label>
														</section>
														<section class="col col-3">
															<label class="checkbox">
															<input type="checkbox" name="spam" checked="checked">
															<i></i>Spam</label>
														</section>
													</div>
												</div>
											</fieldset>
											<footer>
												<button type="submit" class="btn btn-primary">
													Submit
												</button>
											</footer>
										</form>		
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							</article>
						<!-- WIDGET END -->
				
					</div>
					
					<div class="row">
						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false">
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
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h2>Kotak Masuk </h2>
				
								</header>
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body no-padding">
										<form method="post" action="<?php echo base_url()?>index.php/Pdf_m/create_pdf">
										<table id="datatable_tabletools" class="table table-striped table-bordered" width="100%">
									        <thead>
							                    <th data-class="expand">No HP</th>
							                    <th data-hide="phone">Isi Pesan</th>
							                    <th data-hide="phone" data-priority="1">Tanggal Masuk</th>
							                    <th data-hide="phone,tablet">Klasifikasi</th>
									        </thead>
											<tbody>
												<?php 
												if(!empty($masuk))
													foreach ($masuk as $key) 
													{
												?>
												<?php if($key->status_baca==0) echo "<tr class='warning'>"; else echo "<tr>";?>											
										            <td><?php echo $key->SenderNumber;?></td>
										            <td>
										            <a href="<?php echo base_url()?>index.php/pesan/baca_lengkap/1/<?php echo $key->ID;?>" style="color: black;">
										            <?php 
										            if(strlen($key->TextDecoded)>70) 
									            	{
									            		for($i=0; $i<70; $i++)
									            			echo $key->TextDecoded[$i];
									            		echo "......";
									            	}
										            else
										            	echo $key->TextDecoded;
										            ?>
										            </a>
										            </td>
									                <td><?php 
									                for($i=0; $i<strlen($key->ReceivingDateTime); $i++)
									                {
									                	if($i==4 || $i==7)
									                		echo"/";
									                	else
									                		echo $key->ReceivingDateTime[$i];
									                }
									                ?></td>
										            <td><?php 
										            foreach ($klasifikasi as $key2) 
										            {
										            	if($key->klasifikasi == $key2->id_klasifikasi)	
										            	{
										            		echo $key2->keterangan;
										            		
														echo '<input type="hidden" name="SenderNumber[]" value="'.$key->SenderNumber.'">';
														echo '<input type="hidden" name="ReceivingDateTime[]" value="'.$key->ReceivingDateTime.'">';
														echo '<input type="hidden" name="Text[]" value="'.$key->TextDecoded.'">';
										            		echo '<input type="hidden" name="Klasifikasi[]" value="'.$key2->keterangan.'">';
										            	}
										            }
										            ?></td>
									            </tr>
									            <?php
									            	}
												?>	
									            </tbody>
										</table>
										<div style="text-align: center; margin-bottom: 60px;">
											<button type="submit" class="btn btn-danger">Laporan PDF Kotak Masuk</button>
										</form>
										</div>
									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
							</article>
						<!-- WIDGET END -->
				
					</div>
					
					<div class="row">
						<!-- NEW WIDGET START -->
						<article class="col-sm-12 col-md-12 col-lg-12">
							<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false">
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
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h2>Kotak Keluar </h2>
				
								</header>
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body no-padding">
				
										
										<table id="datatable_tabletools2" class="table table-striped table-bordered" width="100%">
					
									        <thead>
												<tr>
								                    <th data-class="expand">No HP</th>
								                    <th data-hide="phone">Isi Pesan</th>
								                    <th data-hide="phone">Tanggal Keluar</th>
									            </tr>
									        </thead>
											<tbody>
												<?php 
													if(!empty($keluar))
													foreach ($keluar as $key) 
													{
														# code...
												?>
												<tr>
												    <td><?php echo $key->DestinationNumber;?></td>
										            <td>
										            <a href="<?php echo base_url()?>index.php/pesan/baca_lengkap/2/<?php echo $key->ID;?>" style="color: black;">
										            <?php 
										            if(strlen($key->TextDecoded)>70) 
									            	{
									            		for($i=0; $i<70; $i++)
									            			echo $key->TextDecoded[$i];
									            		echo "......";
									            	}
										            else
										            	echo $key->TextDecoded;
										            ?>
										            </a>
										            </td>
									                <td><?php 
									                for($i=0; $i<strlen($key->SendingDateTime); $i++)
									                {
									                	if($i==4 || $i==7)
									                		echo"/";
									                	else
									                		echo $key->SendingDateTime[$i];
									                }
									                ?></td>
									            </tr>
									            <?php
									            	}
												?>	
									            </tbody>
										</table>

									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
						</article>
					</div>
					<!-- end row -->
					
					<div class="row">
						<!-- NEW WIDGET START -->
						<article class="col-sm-12 col-md-12 col-lg-12">
							<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false">
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
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h2>Pesan Terkirim</h2>
				
								</header>
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body no-padding">
				
										
										<table id="datatable_tabletools2" class="table table-striped table-bordered" width="100%">
					
									        <thead>
												<tr>
								                    <th data-class="expand">No HP</th>
								                    <th data-hide="phone">Isi Pesan</th>
								                    <th data-hide="phone">Tanggal Keluar</th>
									            </tr>
									        </thead>
											<tbody>
												<?php 
													if(!empty($terkirim))
													foreach ($terkirim as $key) 
													{
														# code...
												?>
												<tr>
												    <td><?php echo $key->DestinationNumber;?></td>
										            <td>
										            <a href="<?php echo base_url()?>index.php/pesan/baca_lengkap/3/<?php echo $key->ID;?>" style="color: black;">
										            <?php 
										            if(strlen($key->TextDecoded)>70) 
									            	{
									            		for($i=0; $i<70; $i++)
									            			echo $key->TextDecoded[$i];
									            		echo "......";
									            	}
										            else
										            	echo $key->TextDecoded;
										            ?>
										            </a>
										            </td>
									                <td><?php 
									                for($i=0; $i<strlen($key->SendingDateTime); $i++)
									                {
									                	if($i==4 || $i==7)
									                		echo"/";
									                	else
									                		echo $key->SendingDateTime[$i];
									                }
									                ?></td>
									            </tr>
									            <?php
									            	}
												?>	
									            </tbody>
										</table>

									</div>
									<!-- end widget content -->
				
								</div>
								<!-- end widget div -->
				
							</div>
						</article>
					</div>
					<!-- end row -->
				
				</section>
				<!-- end widget grid -->

			</div>
			<!-- END MAIN CONTENT -->

		</div>

		<script src="<?php echo base_url()?>js/plugin/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url()?>js/plugin/datatables/dataTables.colVis.min.js"></script>
		<script src="<?php echo base_url()?>js/plugin/datatables/dataTables.tableTools.min.js"></script>
		<script src="<?php echo base_url()?>js/plugin/datatables/dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url()?>js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

		<script type="text/javascript">
		
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		
		$(document).ready(function() {
			
			pageSetUp();
			
			/* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
			*/	



			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			var responsiveHelper_datatable_tabletools2 = undefined;


			var breakpointDefinition = {
				tablet : 1024,
				phone : 480
			};
			
		    var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth()+1; //January is 0!
			var yyyy = today.getFullYear();

			if(dd<10) {
			    dd='0'+dd
			} 

			if(mm<10) {
			    mm='0'+mm
			} 

			today = dd+'-'+mm+'-'+yyyy;

			 var buttonCommon = {
		        exportOptions: {
		            format: {
		                body: function ( data, column, row, node ) {
		                    // Strip $ from salary column to make it numeric
		                    return column === 0 ?
		                        data.replace( /[$,]/g, '' ) :
		                        data;
		                }
		            }
		        }
		    };
			
			$('#datatable_tabletools').dataTable({
				
				// Tabletools options: 
				//   https://datatables.net/extensions/tabletools/button_options
				"order": [[ 2, "desc" ]],
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
				"oLanguage": {
					"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
				},
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_tabletools) {
						responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($('#datatable_tabletools'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_tabletools.respond();
				}
			});

			$('#datatable_tabletools2').dataTable({
				
				// Tabletools options: 
				//   https://datatables.net/extensions/tabletools/button_options
				"order": [[ 2, "desc" ]],
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
				"oLanguage": {
					"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
				},
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_tabletools2) {
						responsiveHelper_datatable_tabletools2 = new ResponsiveDatatablesHelper($('#datatable_tabletools2'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_tabletools2.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_tabletools2.respond();
				}
			});
		
		})
		</script>
		<script type="text/javascript">
			$('#kotak_masuk').click(function() {
			    $("#simpan").toggle(this.checked);
			});

		</script>