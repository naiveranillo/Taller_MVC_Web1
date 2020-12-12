<?php
if (!isset($_SESSION['Reg']) || $_SESSION['Reg'] != 'ok') {
	 	 	header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Crear Producto</title>
</head>
<body>
	<div class="contenidocrepro">
		<form method="post" action="index.php">
			<h1>Crear Producto</h1><br>
			<h6 class="textright">Nombre:</h6> <input type="text" class="form-control" name="nompro" placeholder="Nombre del Producto" required><br>
			<h6 class="textright">Serial:</h6><input type="text" class="form-control" name="serial" placeholder="Ingrese Serial" required><br><br>
			<input type="Hidden" name="controlador" value="ProductoControlador">
			<input type="Hidden" name="metodo" value="AgregarPro">
			<input type="Hidden" name="vista" value="aggProducto">
			<input type="submit" class="btn btn-dark" name="crearpro" value="Agregar Producto">
		</form>
	</div>
</body>
</html>
