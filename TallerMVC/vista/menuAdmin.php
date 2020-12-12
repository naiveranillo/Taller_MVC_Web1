<?php

if (!isset($_SESSION['Reg']) || $_SESSION['Reg'] != 'ok' ) {
	header('Location: login.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Proximy</title>
	<link rel="shortcut icon" href="img/icono.jpg">
</head>
<body class="fondo">
	<ul class="nav navg">
			<li class="nav-item cerrses">
		    	<a class="btn btn-danger btn-lg" href="index.php?c=det">Cerrar Sesion</a>
		    </li>
		  <li class="nav-item opc">
		  	<blockquote class="nav-link" style="position: relative; top:1px; right: 90%;"><h5 class="zoom" style="color: #E95232; text-align: center;"><?php echo $_SESSION['tpusu'],"<br>",$_SESSION['nomlogin']; ?></h5></blockquote>
		  </li>
		  
		  <li class="nav-item">
		    	<a class="nav-link zoom" style="position: relative; top:10px; left:140%;" href="index.php?a=cre"><h4 class="opc">Crear Usuario</h4></a>
		  </li>
		  <li class="nav-item">
		    	<a class="nav-link zoom" style="position: relative; top:10px; left:165%;" href="index.php?a=list"><h4 class="opc">Listar Usuarios</h4></a>
		  </li>
	</ul><br><br>
</body>
</html>