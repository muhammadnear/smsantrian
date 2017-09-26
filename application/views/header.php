<!DOCTYPE html>
<?php
    $this->load->library('session');
	$id = $this->session->userdata('id_login');
	if (!$id)
		header("Location: ".base_url());
	?>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> SMS Notifikasi Kantor Imigrasi Surabaya </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/smartadmin-skins.min.css">

		<!-- SmartAdmin RTL Support  -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>css/smartadmin-rtl.min.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="<?php echo base_url()?>img/logo.ico" type="image/x-icon">
		<link rel="icon" href="<?php echo base_url()?>img/logo.ico" type="image/x-icon">
		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="<?php echo base_url()?>js/libs/jquery-2.1.1.min.js"></script>
		<script src="<?php echo base_url()?>js/libs/jquery-ui-1.10.3.min.js"></script>
		<script type="text/javascript" charset="utf-8">
 		
			function addmsg(type, msg)
			{
				if(msg !=0 )
					$('#notification_count').html(msg);
			}
			 
			function waitForMsg()
			{
			 
				$.ajax(
				{
					type: "GET",
					url: "<?php echo base_url()?>index.php/pesan/notif",
					 
					async: true,
					cache: false,
					timeout:50000,
					 
					success: function(data)
					{
						addmsg("new", data);
						setTimeout(
							waitForMsg,
							10000
						);
					},
					error: function(XMLHttpRequest, textStatus, errorThrown)
					{
						addmsg("error", textStatus + " (" + errorThrown + ")")
						setTimeout(
							waitForMsg,
							150000
						);
					}
				});
			};
			 
			$(document).ready(function(){
			 
			waitForMsg();
			 
			});
			 
		</script>
	</head>

	<body class="">

		<!-- HEADER -->
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					<a href="<?php echo base_url()?>/index.php/login/signout">
						<img src="<?php echo base_url()?>img/employee_default.png" alt="me" class="online" /> 
						
						<span>
							 Sign Out <i class="fa fa-sign-out"></i> 
						</span>
					</a>
				</span>
			</div>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive-->
			<nav>
				<!-- 
				NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional href="" links. See documentation for details.
				-->

				<ul>
					<li>
						<a href="<?php echo base_url()?>index.php/login/beranda_pegawai/" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Dashboard</span></a>
					</li>
					<li>
						<a href="<?php echo base_url()?>index.php/pesan/tulis/"><i class="fa fa-lg fa-fw fa-envelope"></i> <span class="menu-item-parent">Tulis Pesan</span></a>
					</li>
					<li>
						<a href="<?php echo base_url()?>index.php/pesan/tulis_multiple/"><i class="fa fa-lg fa-fw fa-envelope-o"></i> <span class="menu-item-parent">Tulis Multiple Pesan</span></a>
					</li>
					<li>
						<a href="<?php echo base_url()?>index.php/pesan/inbox/"><i class="fa fa-lg fa-fw fa-inbox"></i> <span class="menu-item-parent">Kotak Masuk</span><span class="badge pull-right inbox-badge margin-right-13" id="notification_count"></span></a>
					</li>
					<li>
						<a href="<?php echo base_url()?>index.php/pesan/outbox/"><i class="fa fa-lg fa-fw fa-mail-reply-all"></i> <span class="menu-item-parent">Kotak Keluar</span></a>
					</li>
					<li>
						<a href="<?php echo base_url()?>index.php/pesan/sent/"><i class="fa fa-lg fa-fw fa-check"></i> <span class="menu-item-parent">Pesan Terkirim</span></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-lg fa-fw fa-gear"></i> <span class="menu-item-parent">Settings</span></a>
						<ul>
							<li>
								<a href="<?php echo base_url()?>index.php/auto/settingrespond/"> <span class="menu-item-parent">Auto-respond</span></a>
							</li>
							<li>
								<a href="<?php echo base_url()?>index.php/auto/settingsend/"> <span class="menu-item-parent">Auto-send</span></a>
							</li>
						</ul>
					</li>	
					<li>
						<a href="<?php echo base_url()?>index.php/pesan/laporan/"><i class="fa fa-lg fa-fw fa-bar-chart-o"></i> <span class="menu-item-parent">Laporan</span></a>
					</li>
				</ul>
			</nav>
			

			<span class="minifyme" data-action="minifyMenu"> 
				<i class="fa fa-arrow-circle-left hit"></i> 
			</span>

		</aside>
		<!-- END NAVIGATION -->