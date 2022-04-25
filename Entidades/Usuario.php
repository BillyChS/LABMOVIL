<?php

class Usuario
{
    //cédula, nombre, teléfono, email, fecha de nacimiento y carrera en que está inscrito. Un alumno solo puede matricular cursos de la carrera en que está inscrito.
    private  $cedula;
    private $clave;
    private $rol;
   


    public function __construct($cedula, $clave, $rol)
    {
        $this->cedula =  $cedula;
        $this->clave = $clave;
        $this->rol = $rol;
       
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }
    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }
    public function getCedula()
    {
        return $this->cedula;
    }

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }
}