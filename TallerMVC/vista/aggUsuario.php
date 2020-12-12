<?php
if (!isset($_SESSION['Reg']) || $_SESSION['Reg'] != 'ok') {
	 	 	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crear Usuario</title>
</head>
<body>
	<div class="contenidocreusu">
		<form method="post" action="index.php">
			<h1>Crear Usuario</h1>
			<h6 class="textright">Nombre:</h6> <input type="text" class="form-control" name="nomusu" placeholder="Ingrese Nombre" required><br>
			<h6 class="textright">NickName:</h6> <input type="text" class="form-control" name="nick" placeholder="Ingrese NickName" required><br>
			<h6 class="textright">Cedula:</h6> <input type="text" class="form-control" name="ced" placeholder="Ingrese Cedula" required><br>
			<h6 class="textright">&nbsp;&nbsp;&nbsp;&nbsp;Contraseña:</h6> <input type="password" class="form-control" name="pass" placeholder="Ingrese Contraseña" required><br>
			<h6 class="textright">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo de Usuario:</h6>
			<select name="tipousu" class="custom-select mr-sm-2"> 
				<option value="Administrador" selected>Administrador</option>
				<option value="Usuario">Usuario</option>
			</select><br><br>
			<input type="Hidden" name="controlador" value="UsuarioControlador">
			<input type="Hidden" name="metodo" value="AgregarUsu">
			<input type="Hidden" name="vista" value="aggUsuario">
			<input type="submit" class="btn btn-dark" name="crearusu" value="Agregar Usuario">
		</form>
	</div>
	
</body>
</html>