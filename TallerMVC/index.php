<!DOCTYPE html>
<html>
<head>
 	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	 <?php
	 	session_start();
	 	if (!isset($_SESSION['Reg']) || $_SESSION['Reg'] != 'ok') {
	 	 	header('Location: login.php');
	 	}else{	
	 		if ($_SESSION['tpusu'] == 'Usuario') {
	 			include("vista/menuUsuario.php");
	        	if($_POST){
		            $controladoru =$_POST['controlador'];
		            $metodou =$_POST['metodo'];
		            $vistau=$_POST['vista'];
	            	if (file_exists("controlador/{$controladoru}.php")){
	                    require_once("controlador/{$controladoru}.php");
	                    $con = new $controladoru();

	                    if (!isset($_POST['crearpro'])) { //Listar
	                    	$list=$con->$metodou();
	                    }
 
	                    require_once("vista/{$vistau}.php");

	                    if(isset($_POST['crearpro'])) //Crear
	                    {
	                    	$vdar1=$con->ValidarPro($_POST);
	                    	if ($vdar1 == 'true') {
	                    		?>	<br>
	                    			<div class="alertas alert alert-danger" role="alert">
  										<strong>Producto no creado, el serial ya esta registrado</strong>
									</div>
	                    		<?php
	                    	}else{
	                    		$resp=$con->$metodou($_POST);
	                    		if ($resp == false) {
	                    			?>
		                    			<br>
		                    			<div class="alertas alert alert-danger" role="alert">
	  										<strong>Producto no creado</strong>
										</div>
	                    			<?php
	                    		}else{
	                    			?>	
		                    			<br>
		                    			<div class="alertas alert alert-success" role="alert">
	  										<strong>Producto Creado</strong>
										</div>
	                    			<?php
	                    		}
	                    	}
	                    }      
	            	}else{
	                    echo"no existe";
	            	}
	        	}else{
					if(isset($_GET['u'])){
						if($_GET['u']=='cre')include("vista/aggProducto.php");
						if($_GET['u']=='list')include("vista/listProducto.php");
					}
				}
	 		}else{
	 			include("vista/menuAdmin.php");
	        	if($_POST){
		            $controladora =$_POST['controlador'];
		            $metodoa =$_POST['metodo'];
		            $vistaa=$_POST['vista'];
	            	if (file_exists("controlador/{$controladora}.php")){
	                    require_once("controlador/{$controladora}.php");
	                    $con = new $controladora();
	                    if (!isset($_POST['crearusu'])) { //Listar
	                    	$list=$con->$metodoa();
	                    }

	                    require_once("vista/{$vistaa}.php");

	                    if(isset($_POST['crearusu'])) //Crear
	                    {
	                    	$vdar=$con->ValidarUsu($_POST);
	                    	if ($vdar == 'true') {
	                    		?>	<br>
	                    			<div class="alertas alert alert-danger" role="alert">
  										<strong>El nickname y/o cedula estan registrados</strong>
									</div>
	                    		<?php
	                    	}else{
	                    		$resp=$con->$metodoa($_POST);
	                    		if ($resp == false) {
	                    			?>	
	                    			<br>
	                    			<div class="alertas alert alert-danger" role="alert">
  										<strong>Usuario no creado</strong>
									</div>
	                    		<?php
	                    		}else{
	                    			?>	
		                    			<br>
		                    			<div class="alertas alert alert-success" role="alert">
	  										<strong>Usuario Creado</strong>
										</div>
	                    			<?php
	                    		}
	                    	}
	                    }               
	            	}else{
	                    echo"no existe";
	            	}
	        	}else{
					if(isset($_GET['a'])){
						if($_GET['a']=='cre')include("vista/aggUsuario.php");
						if($_GET['a']=='list')include("vista/listUsuario.php");
					}
				}
	 		}
		 		if (isset($_GET['c'])) {
			 	 	session_destroy();
			 	 	header('Location: login.php');
		 		} 
	 	}
        ?>
</body>
</html>