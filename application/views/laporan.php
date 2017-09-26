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

			var breakpointDefinition = {
				tablet : 1024,
				phone : 480
			};
			
			/* COLUMN FILTER  */
		    var otable = $('#datatable_fixed_column').DataTable({
		    	//"bFilter": false,
		    	//"bInfo": true,
		    	//"bLengthChange": true,
		    	//"bAutoWidth": false,
		    	//"bPaginate": true,
		    	//"bStateSave": true, // saves sort state using localStorage
		    	"order": [[ 2, "desc" ]],
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-3 col-xs-12 hidden-xs'l><'col-sm-3 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"oLanguage": {
					"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
				},
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_datatable_fixed_column) {
						responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($('#datatable_fixed_column'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_datatable_fixed_column.respond();
				}		
			
		    });
		    	   
		    // Apply the filter
		    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
		    	
		        otable
		            .column( $(this).parent().index()+':visible' )
		            .search( this.value )
		            .draw();
		            
		    } );
		    /* END COLUMN FILTER */   
		
		})
		</script>
		<script type="text/javascript">
			$('#kotak_masuk').click(function() {
			    $("#simpan").toggle(this.checked);
			});

		</script>