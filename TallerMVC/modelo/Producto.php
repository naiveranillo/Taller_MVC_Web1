<?php 


/**
 * 
 */
class Producto
{
	private $nombre;
	private $serial;
	
	function __construct()
	{
		
	}

	function getNombre() {
		return $this->nombre;
	}

	function getSerial() {
		return $this->serial;
	}

	function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setSerial($serial) {
        $this->serial = $serial;
    }

}


?>