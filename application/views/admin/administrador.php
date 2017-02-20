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
</style>


<!-- Start Formoid form-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<link rel="stylesheet" href="https://formoid.net/lib/form.css" type="text/css">
<link rel="stylesheet" href="<?php echo base_url();?>css/formoid-solid-blue.css" type="text/css">
<script type='text/javascript' src='<?php echo base_url();?>js/enloszapatos.js'></script>
<script type="text/javascript" src="<?php echo base_url();?>js/formoid-solid-blue.js"></script>
<br><br><br><br><br><br>

<div align="center" id="alert">
<?php
    if ($flag != null){
        switch ($flag) {
            case "0":
                echo "<div id='alerta' style='background-color:#FF9999;width: 35%;margin: 2%; color:black' >Usuario y/o contraseña inválido</div>";
                break;
            default:
                break;
        }

    }
?>
    <script languaje="javascript">
        setTimeout(function(){
             $("#alerta").slideToggle("slow");
        },3000);
    </script>
</div>
<div>
<form action="AdminLogin" class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post" onsubmit="return login_admin(this)"><div class="title"><h2>Login</h2></div>
	<div class="element-input">
		<label class="title"></label>
			<div class="item-cont">
                            <input class="large" type="email" name="email" placeholder="E-mail"/>
				<span class="icon-place"></span>
			</div>
	</div>

	<div class="element-password">
		<label class="title"></label>
		<div class="item-cont">
			<input class="large" id="pass" type="password" name="password" value="" placeholder="Contraseña"/>
			<span class="icon-place"></span>
		</div>
	</div>
<div class="submit"><a id="reset" href="resetAdmin">¿Olvidaste tu contraseña?</a><input type="submit" value="Ingresar"/></div>
	
</form>

</div>
<script type="text/javascript" src="<?php echo base_url();?>formoid_files/formoid1/formoid-solid-blue.js"></script>
<!-- Stop Formoid form-->



</body>
</html>
