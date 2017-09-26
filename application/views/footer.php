<!-- PAGE FOOTER -->
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<span class="txt-color-white">Jonero Inc 0.10.16 - SMS Notifikasi </span> © 2016</span>
				</div>

				<div class="col-xs-6 col-sm-6 text-right hidden-xs">
					<div class="txt-color-white inline-block">
						<i class="txt-color-blueLight hidden-mobile">Last account activity <i class="fa fa-clock-o"></i> <strong><?php echo date("d/m/Y H:i:s", strtotime($this->session->userdata('lastvisit_at'))+7*60*60);?> &nbsp;</strong> </i>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE FOOTER -->

		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php echo base_url()?>js/plugin/pace/pace.min.js"></script>
		
		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?php echo base_url()?>js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="<?php echo base_url()?>js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="<?php echo base_url()?>js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?php echo base_url()?>js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="<?php echo base_url()?>js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="<?php echo base_url()?>js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="<?php echo base_url()?>js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="<?php echo base_url()?>js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?php echo base_url()?>js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY SELECT2 INPUT -->
		<script src="<?php echo base_url()?>js/plugin/select2/select2.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="<?php echo base_url()?>js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="<?php echo base_url()?>js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="<?php echo base_url()?>js/plugin/fastclick/fastclick.min.js"></script>

		<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

		
		<!-- MAIN APP JS FILE -->
		<script src="<?php echo base_url()?>js/app.min.js"></script>

		<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
		<!-- Voice command : plugin -->
		<script src="<?php echo base_url()?>js/speech/voicecommand.min.js"></script>

		<!-- SmartChat UI : plugin -->
		<script src="<?php echo base_url()?>js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="<?php echo base_url()?>js/smart-chat-ui/smart.chat.manager.min.js"></script>
		
		<!-- PAGE RELATED PLUGIN(S) -->
		
		<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
		<script src="<?php echo base_url()?>js/plugin/flot/jquery.flot.cust.min.js"></script>
		<script src="<?php echo base_url()?>js/plugin/flot/jquery.flot.resize.min.js"></script>
		<script src="<?php echo base_url()?>js/plugin/flot/jquery.flot.orderBar.min.js"></script>
		<script src="<?php echo base_url()?>js/plugin/flot/jquery.flot.time.min.js"></script>
		<script src="<?php echo base_url()?>js/plugin/flot/jquery.flot.tooltip.min.js"></script>
		
		<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
		<script src="<?php echo base_url()?>js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="<?php echo base_url()?>js/plugin/vectormap/jquery-jvectormap-world-mill-en.js"></script>
		
		<!-- Full Calendar -->
		<script src="<?php echo base_url()?>js/plugin/moment/moment.min.js"></script>
		<script src="<?php echo base_url()?>js/plugin/chartjs/chart.min.js"></script>
		<script src="<?php echo base_url()?>js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
		<script src="<?php echo base_url()?>js/plugin/bootstrap-tags/bootstrap-tagsinput.min.js"></script>

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<script type="text/javascript">
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script');
				ga.type = 'text/javascript';
				ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();

		</script>

	</body>

</html>