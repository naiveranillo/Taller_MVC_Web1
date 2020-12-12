<?php 

/**
 * 
 */
class UsuarioControlador
{
	
	function __construct()
	{

	}

	function AgregarUsu($arr)
	{
		require_once ('modelo/Usuario.php');
		require_once ('modelo/UsuarioModelo.php');

		$usu = new Usuario();
		$usuM = new UsuarioModelo();
		$usu->setNombre($arr["nomusu"]);
		$usu->setCod($arr["ced"]);
		$usu->setPass($arr["pass"]);
		$usu->setNick($arr["nick"]);
		$usu->setTipUsu($arr["tipousu"]);
		return $usuM->AgregarUsu($usu);
	}

	function ListarUsu(){
        $resp= array();
		require_once ('modelo/Usuario.php');
        require_once ('modelo/UsuarioModelo.php');
        
		$usu = new Usuario();
		$usuM = new UsuarioModelo();
        $usuarios = $usuM->DatosUsu();
		for($i=0;$i<count($usuarios);$i++){
			$usu=$usuarios[$i];
			$resp[]= [$usu->getNombre(),$usu->getCod(),$usu->getPass(),$usu->getNick(),$usu->getTipUsu()];
		}
		return $resp;
    }

    function BuscarUsu($nick, $pass){
    	$usuarios = array();
    	require_once ('modelo/Usuario.php');
        require_once ('modelo/UsuarioModelo.php');
		$usuM = new UsuarioModelo();
        $usuarios = $usuM->BuscarUsu($nick, $pass);

        return $usuarios;
  
    }

    public function ValidarUsu($arr)
    {
    	$usuarios = array();
    	require_once ('modelo/Usuario.php');
        require_once ('modelo/UsuarioModelo.php');
		$usuM = new UsuarioModelo();

        $usuarios = $usuM->ValidarUsu($arr['nick'], $arr['ced']);
       
        if (isset($usuarios[0]['nickname']) and  isset($usuarios[0]['cedula'])) {
        	if ($usuarios[0]['nickname'] == $arr['nick'] || $usuarios[0]['cedula'] == $arr['ced']) {
        		return true;
        	}else{
        		return false;
        	} 	
        }else{
        	return false;
        }
    }
   
}

?>