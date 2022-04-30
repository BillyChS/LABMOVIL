<?php
include('../Modelo/ModeloLogin.php');

class ControladorLogin
{
    public function __construct()
    {
    }
  


    public function inicio($cedula,$usuario){

    $usuarioModel=new ModeloLogin();
    return $usuarioModel->Verficiacion($cedula,$usuario);
        
    

    }

   
}
