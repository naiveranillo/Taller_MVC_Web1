<?php
if (!isset($_SESSION['Reg']) || $_SESSION['Reg'] != 'ok') {
	 	 	header('Location: login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lista de Usuarios</title>
</head>
<body>
	<div class="contenedorlistusu"> 
		<h2>Presione el boton para listar.</h2><br>

		<form method="post" action="index.php">
			<input type="Hidden" name="controlador" value="UsuarioControlador">
			<input type="Hidden" name="metodo" value="ListarUsu">
			<input type="Hidden" name="vista" value="listUsuario">
			<input type="submit" class="btn btn-dark" name="listusu" value="Listar">
		</form>
	
		<?php

			if (isset($_POST['listusu'])) {
				if (empty($list)) {
					?>
						<br>
	                    <div class="alertas alert alert-warning" role="alert">
  							<strong>No hay Registros</strong>
						</div>
					<?php	
				}else{
					?>
						<hr>
						<h1>Listar Usuarios</h1><br>

						<table class="table">
						  <thead>
						    <tr class="tr1">
						      <th scope="col">Nombre</th>
						      <th scope="col">Cedula</th>
						      <th scope="col">Contraseña</th>
						      <th scope="col">NickName</th>
						      <th scope="col">Tipo de Usuario</th>
						    </tr>
						  </thead>
						  <?php
						  for($i=0;$i<count($list);$i++){
						  ?>
						  <tbody>	
						    <tr class="tr2">
						      <td><?php echo $list[$i][0]?></td>
						      <td><?php echo $list[$i][1]?></td>
						      <td><?php echo $list[$i][2]?></td>
						      <td><?php echo $list[$i][3]?></td>
						      <td><?php echo $list[$i][4]?></td>
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