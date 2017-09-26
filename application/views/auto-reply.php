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
					<li>Home</li><li>Auto Reply</li><li>Manajemen Auto Reply</li>
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
								Auto Reply 
							<span>> 
								Manajemen Auto Reply
							</span>
						</h1>
					</div>
				</div>
				
				<div class="alert alert-block alert-info">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading">Catatan!</h4>
					<p>
						- Mohon perhatikan spasi jika mengubah <strong>$</strong>. Jika <strong>$</strong> ada ditengah kalimat, pastikan sebelum dan sesudah <strong>$</strong> ada spasi.
					</p>
				</div>
				<?php if (!empty($sukses))
				{
						?>
				<div class="alert alert-block alert-success">
					<p>
						<?php echo $sukses;?>
					</p>
				</div>	
				<?php 
				}

				?>
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
									<h2>Form Auto Reply </h2>
				
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
										<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
									        <thead>
									            <tr>
								                    <th data-class="expand">No</th>
								                    <th data-hide="phone">Jika Pemohon Mengetik</th>
								                    <th data-hide="phone">Maka Sistem Membalas</th>
													<th data-hide="phone">Apabila Permohonan TIdak Ditemukan</th>
								                    <th data-hide="phone,tablet">Contoh Nilai $</th>
								                    <th data-hide="phone,tablet"></th>
									            </tr>
									        </thead>
											<tbody>
												<?php
													$i=1; 
													foreach ($auto as $key) 
													{
												?>
												<tr>
										            <td><?php echo $i;?></td>
										            <td><?php echo $key->jika;?></td>
										            <td><?php echo $key->maka;?></td>
										            <td><?php echo $key->salah;?></td>
										            <td><?php echo $key->contoh;?></td>
									                <td><center><a href="<?php echo base_url()?>index.php/auto/editrespond/<?php echo $key->id_auto_send;?>" class="btn btn-info">edit</a></center></td>
									            </tr>
									            <?php
									            		$i++;
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
			var responsiveHelper_dt_basic = undefined;

			var breakpointDefinition = {
				tablet : 1024,
				phone : 480
			};
			
			$('#dt_basic').dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
					"t"+
						"<'dt-toolbar-footer'<'col-sm-3 col-xs-12 hidden-xs'l><'col-sm-3 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
		        "oLanguage": {
				    "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
				},
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_dt_basic) {
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
				}
			});		
		})
		</script>