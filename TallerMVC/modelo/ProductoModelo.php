<?php


/**
 * 
 */
class ProductoModelo 
{
	private $db;
	private $productos;
	
	function __construct()
	{
		require_once("Conexion.php");
		$this->db=Conexion::conectar();
		$this->productos=array();
	}

	public function AgregarPro($pro){
		
        $nombre=$pro->getNombre();
		$serial=$pro->getSerial();
		$creador=$_SESSION['nomlogin'];
		$idcreador=$_SESSION['cedlogin'];

		if($this->db->query("INSERT INTO producto(nombre, numserial, creador, idcreador)VALUES('$nombre','$serial', '$creador', '$idcreador')")){
			return true;
		} else{
			return false;
		}
	}

	public function DatosPro (){
		$productos = array();
       	$creador=$_SESSION['nomlogin'];
		$idcreador=$_SESSION['cedlogin'];

        $consulta=$this->db->query("SELECT * FROM producto WHERE creador = '$creador' AND idcreador = '$idcreador' "); 
        $i = 0;
		while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){

			$pro = new Producto();
                        $pro->setNombre($fila["nombre"]);
                        $pro->setSerial($fila["numserial"]);
                        $productos[$i]=$pro;
            $i = $i + 1;
		}
		return $productos;
	} 

	public function ValidarPro($serial){
		$arr = array();
		$consulta=$this->db->query("SELECT * FROM producto WHERE numserial = '$serial'");
		 
		while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$arr[]=$fila;
		}
		
		return($arr);
	}
}

?>