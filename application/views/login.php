<!DOCTYPE html>
<html lang="en">
<head>
	<title>SMS Notifikasi Kantor Imigrasi Surabaya</title>
    <link href="<?php echo base_url()?>/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>/css/bootstrap.min.css2.css" rel="stylesheet">
    
    <link rel="shortcut icon" href="<?php echo base_url()?>img/logo.ico">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: rgba(250,250,250,0.5);
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
</head>

<body style="background-color:#f1f2f7">
	<div class="container">
  		<p class="text-center"> <img src="<?php echo base_url() ?>img/logoIMIFIX.png" style="width:218px; height:218px;"> </p>
  		<h3><p class="form-signin-heading text-center text-info" style="color:#000000"> SMS Notifikasi Imigrasi Surabaya </p></h3>

      <form class="form-signin" action="<?php echo base_url()?>index.php/login/signin" method="POST" style="background-color:#212369">
	      <h4 class="form-signin-heading text-left text-info" style="color:#FFFFFF">Silakan Login</h4>
        <input id="username" name="username" type="text" class="form-control" placeholder="Nama Pengguna">
        <input id="password" name="password" type="password" class="form-control" placeholder="Kata Kunci">
        <input class="btn btn-large btn-success" type="submit" id="submit" name="submit" value="Masuk">	
      </form>
      
      <center>@Copyright 2016. Jonero <span>Inc</span>, V.0.10.16</center>
      <?php 
          if($error)
            echo "<center><p class='bg-danger' style='padding:15px;'>$error</p></center>";
        ;?>
    </div>
</body>
</html>