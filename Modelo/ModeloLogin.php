<?php

//include_once("Entidades/Alumno.php");
include_once("../AccesoADAtos/ServicioLoggin.php");

class ModeloLogin
{

    
    private $servicioLogin;
    

    public  function __construct()
    {
      
        $this->servicioLogin = new ServicioLoggin();
    }

    public function Verficiacion($cedula,$clave)
    {
        $this->servicioLogin->_login($cedula,$clave);
        return $this->servicioLogin->_existe_usuario();
       
    }
    
}
