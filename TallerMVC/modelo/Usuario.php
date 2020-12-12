<?php 

/**
 * 
 */
class Usuario
{
	private $tipusu;
	private $nombre;
	private $cod;
	private $pass;
	private $nick;
	
	function __construct()
	{
		
	}

	function getTipUsu() {
		return $this->tipusu;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getNick() {
		return $this->nick;
	}

	function getCod() {
		return $this->cod;
	}

	function getPass() {
		return $this->pass;
	}

	function setTipUsu($tipusu) {
        $this->tipusu = $tipusu;
    }

	function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setNick($nick) {
        $this->nick = $nick;
    }

    function setCod($cod) {
        $this->cod = $cod;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }
}

?>