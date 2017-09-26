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
					<li>Home</li><li>Pesan</li><li>Kotak Masuk</li>
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
								Pesan 
							<span>> 
								Kotak Masuk
							</span>
						</h1>
					</div>
				</div>
				
				<div class="alert alert-block alert-info">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading">Catatan!</h4>
					<p>
						- Penggunaan filter pencarian dengan tanggal menggunakan format <strong>yyyy/mm/dd</strong> contoh 31 Januari 2016 dutulis <strong>2016/01/31</strong>
					</p>
					<p>
						- Warna kuning menandakan bahwa pesan tersebut belum dibaca. Silahkan klik isi pesan atau tombol edit.
					</p>
				</div>
				<!-- widget grid -->
				<section id="widget-grid" class="">
				
					<!-- row -->
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
				
										
										<table id="datatable_fixed_column" class="table table-striped table-bordered" width="100%">
					
									        <thead>
												<tr>
													<th class="hasinput" style="width:17%">
														<input type="text" class="form-control" placeholder="Filter No HP" />
													</th>
													<th class="hasinput" style="width:16%">
														<input type="text" class="form-control" placeholder="Filter Isi Pesan" />
													</th>
													<th class="hasinput icon-addon">
														<input id="dateselect_filter" type="text" placeholder="Filter Tanggal" class="form-control datepicker" data-dateformat="yy/mm/dd">
														<label for="dateselect_filter" class="glyphicon glyphicon-calendar no-margin padding-top-15" rel="tooltip" title="" data-original-title="Filter Date"></label>
													</th>
													<th class="hasinput" style="width:16%">
														<input type="text" class="form-control" placeholder="Filter Klasifikasi" />
													</th>
													<th class="hasinput" style="width:16%">
														<input type="text" class="form-control" placeholder="Filter Status Baca" />
													</th>
													<th class="hasinput" style="width:16%">
													</th>
												</tr>
									            <tr>
								                    <th data-class="expand">No HP</th>
								                    <th data-hide="phone">Isi Pesan</th>
								                    <th data-hide="phone" data-priority="1">Tanggal Masuk</th>
								                    <th data-hide="phone,tablet">Klasifikasi</th>
								                    <th data-hide="phone,tablet">Status Baca</th>
								                    <th data-hide="phone,tablet"></th>
									            </tr>
									        </thead>
											<tbody>
												<?php 
													foreach ($masuk as $key) 
													{
														# code...
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
										            		echo $key2->keterangan;
										            }
										            ?></td>
										            <td><?php echo $key->status_baca;?></td>
									                <td><center><a href="<?php echo base_url()?>index.php/pesan/baca_lengkap/1/<?php echo $key->ID;?>" class="btn btn-info" style="width:40%; height:125%">edit</a></center></td>
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
						<!-- WIDGET END -->
				
					</div>
				
					<!-- end row -->
				
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
