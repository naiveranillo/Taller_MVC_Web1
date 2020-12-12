<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Pagina para Iniciar Sesion">
	<link rel="shortcut icon" href="img/icono.jpg">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Login</title>
</head>
<body class="fondo">
	
		<ul class="nav navg">
			<li class="nav-item" style="position: relative; top: 5%; left: 2%;">
		    	<h1 style="color: white;">ProximyStyle</h1>
		    </li>
		</ul><br><br>
	<div class="contenidologin">
		<form action="" method="post">
			<h2>Login</h2>
			<h6 class="textright">NickName:</h6><input type="text" class="form-control" name="nick" required><br>
			<h6 class="textright">Contraseña:</h6><input type="password" class="form-control" name="pass" required><br><br>
			<input type="submit" class="btn btn-dark" name="login" value="Iniciar Sesion">
		</form>
	</div>
</body>
</html>

<?php

if (isset($_POST['login'])) {
	
	require_once("modelo/Conexion.php");
	require_once("controlador/UsuarioControlador.php");

	$usuC = new UsuarioControlador();
	$db = new Conexion();

	if (!$db->conectar()) {
		echo "Falló la conexión a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
	}else{
		$nick = $_POST['nick'];
		$pass = $_POST['pass'];
		$sql ="SELECT password FROM usuario WHERE nickname = '$nick' AND password = '$pass'";

		$result = $db->conectar()->query($sql);
	
		if($result->fetch(PDO::FETCH_ASSOC)){
				session_start();
				$arr = $usuC->BuscarUsu($nick, $pass); 
				$_SESSION['nomlogin'] = $arr[0]['nickname'];
				$_SESSION['cedlogin'] = $arr[0]['cedula'];
				$_SESSION['tpusu'] = $arr[0]['tipo_usu']; 
				$_SESSION['Reg']='ok';
				?>
				<?php
				header('Location: index.php');
		}else{
			$_SESSION['Reg']='fail';
				?>
		            <br>
		            <div class="alertas alert alert-danger" role="alert">
	  					<strong>Usuario Incorrecto o no existe</strong>
					</div>
	            <?php
		}
	}

	mysqli_close($db);

}


?>