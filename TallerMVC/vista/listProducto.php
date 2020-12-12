<?php
if (!isset($_SESSION['Reg']) || $_SESSION['Reg'] != 'ok') {
	 	 	header('Location: login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lista de Productos</title>
</head>
<body>
	<div class="contenedorlistpro">
		<h2>Presione el boton para listar.</h2><br>
	
	<form method="post" action="index.php">
		<input type="Hidden" name="controlador" value="ProductoControlador">
		<input type="Hidden" name="metodo" value="ListarPro">
		<input type="Hidden" name="vista" value="listProducto">
		<input type="submit" class="btn btn-dark" name="listpro" value="Listar">
	</form>
	
	<?php
		if (isset($_POST['listpro'])) {
			if (empty($list)) {
				?>
					<br>
	                <div class="alert alert-warning" role="alert">
  						<strong>No hay Registros</strong>
					</div>
				<?php	
				}else{
					?>
						<hr>
						<h1>Listar Productos</h1><br>
							<table class="table">
							  <thead>
							    <tr class="tr1">
							      <th scope="col">Nombre</th>
							      <th scope="col">Serial</th>
							    </tr>
							  </thead>
							  <?php
							  for($i=0;$i<count($list);$i++){
							  ?>
							  <tbody>	
							    <tr class="tr2">
							      <td><?php echo $list[$i][0]?></td>
							      <td><?php echo $list[$i][1]?></td>
							    </tr>
							  </tbody>
						<?php
								}
						?>
						</table>
						<?php
				}
				
		}
	?>
	</div>
</body>
</html>