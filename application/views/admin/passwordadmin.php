<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Login - Administrador</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">
<style type="text/css">
	#reset{
		text-decoration: none;
		font-weight: bold;
		padding: 2%;
	}
	#mensaje{
		font-family: Arial;
		width: 40%;
		margin: 0 auto;
		padding-right: 30%;
		padding-left: 30%;
	}
</style>


<!-- Start Formoid form-->
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-2.2.0.min.js'></script>
<link rel="stylesheet" href="https://formoid.net/lib/form.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>css/formoid-solid-blue.css" type="text/css">
<script type='text/javascript' src='<?php echo base_url();?>js/enloszapatos.js'></script>
<script type="text/javascript" src="<?php echo base_url();?>js/formoid-solid-blue.js"></script>
<br><br><br><br><br><br>

<div align="center" id="alert">

</div>
<div>
<form id="frmRestablecerAdmin" class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Restauración Contraseña</h2></div>
	<div class="element-input">
		<label class="title"><?=$flag?></label><br>
	</div>
</form>
<script type="text/javascript" src="<?php echo base_url();?>formoid_files/formoid1/formoid-solid-blue.js"></script>
<!-- Stop Formoid form-->



</body>
</html>
