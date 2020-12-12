<?php 

/**
 * 
 */
class ProductoControlador
{
	
	function __construct()
	{
		
	}

	function AgregarPro($arr)
	{
		require_once ('modelo/Producto.php');
        require_once ('modelo/ProductoModelo.php');

        $pro = new Producto();
        $proM = new ProductoModelo();
        $pro->setNombre($arr["nompro"]); 
        $pro->setSerial($arr["serial"]); 

        return $proM->AgregarPro($pro);
	}

	function ListarPro()
	{
        $resp= array();
		require_once ('modelo/Producto.php');
        require_once ('modelo/ProductoModelo.php');

        $pro = new Producto();
        $proM = new ProductoModelo();
        $productos = $proM->DatosPro();
		for($i=0;$i<count($productos);$i++){
			$pro=$productos[$i];
			$resp[]= [$pro->getNombre(),$pro->getSerial()];
		}
		return $resp;
	}

	public function ValidarPro($arr)
    {
    	$productos = array();
    	require_once ('modelo/Producto.php');
        require_once ('modelo/ProductoModelo.php');
		$proM = new ProductoModelo();

        $productos = $proM->ValidarPro($arr['serial']);
       
        if (isset($productos[0]['numserial'])) {
        	return true;	
        }else{
        	return false;
        }
    }
}

?>