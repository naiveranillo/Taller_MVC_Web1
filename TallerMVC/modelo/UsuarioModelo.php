<?php 

/**
 * 
 */
class UsuarioModelo
{
	

	private $db;
	private $usuarios;
	
	function __construct()
	{
		require_once("Conexion.php");
		$this->db=Conexion::conectar();
		$this->usuarios=array();
	}

	public function AgregarUsu($usu){
		$tipousu=$usu->getTipUsu();
        $nombre=$usu->getNombre();
		$cod=$usu->getCod();
		$pass=$usu->getPass();
		$nick=$usu->getNick();
		$creador=$_SESSION['nomlogin'];
		$idcreador=$_SESSION['cedlogin'];

		if($this->db->query("INSERT INTO usuario(tipo_usu, nombre, nickname, cedula, password, creador, idcreador)VALUES('$tipousu','$nombre','$nick','$cod', '$pass', '$creador', '$idcreador')")){
			return true;
		} else{
			return false;
		}
	}

	public function DatosUsu (){
		$usuarios = array();
       	$creador=$_SESSION['nomlogin'];
		$idcreador=$_SESSION['cedlogin'];

        $consulta=$this->db->query("SELECT * FROM usuario WHERE creador = '$creador' AND idcreador = '$idcreador' "); 
        $i = 0;
		while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$usu = new Usuario();
						$usu->setTipUsu($fila["tipo_usu"]);
                        $usu->setNombre($fila["nombre"]);
                        $usu->setNick($fila["nickname"]);
                        $usu->setCod($fila["cedula"]);
                        $usu->setPass($fila["password"]);
                        $usuarios[$i]=$usu;
                        $i = $i + 1;
		}
		return $usuarios;
	} 

	public function BuscarUsu($nick, $pass){
		$consulta=$this->db->query("SELECT * FROM usuario WHERE nickname = '$nick' AND password = '$pass'"); 	
		$arr=array();
		while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$arr[]=$fila;
		}
		
		return($arr);
	}

	public function ValidarUsu($nick, $ced)
	{
		$arr = array();
		$consulta=$this->db->query("SELECT * FROM usuario WHERE nickname = '$nick' or cedula = '$ced'"); 	

		while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
			$arr[]=$fila;
		}
		
		return($arr);
	}


}


?>