<?php

class Alumno
{
    //cédula, nombre, teléfono, email, fecha de nacimiento y carrera en que está inscrito. Un alumno solo puede matricular cursos de la carrera en que está inscrito.
    private  $cedula_alumno;
    private $nombre;
    private $telefono;
    private $email;
    private $fech_nac;
    private $carrera;


    public function __construct($cedula_alumno, $nombre, $telefono, $email, $fech_nac, $carrera)
    {
        $this->cedula_alumno =  $cedula_alumno;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->fech_nac = $fech_nac;
        $this->carrera = $carrera;
    }

    public function getCedula_alumno()
    {
        return $this->cedula_alumno;
    }

    public function setCedula_alumno($cedula_alumno)
    {
        $this->cedula_alumno = $cedula_alumno;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCarrera()
    {
       return  $this->carrera;
    }

    public function setCarrera($carrera)
    {
        $this->carrera = $carrera;
    }
    public function getFech_nac()
    {
       return  $this->fech_nac;
    }

    public function setFech_nac($fech)
    {
        $this->email = $fech;
    }
    public function __toString()
    {
        return (string)"Alumno{" . "cedula_alumno=" . $this->cedula_alumno . ", nombre=" . $this->nombre . ", telefono=" . $this->telefono . ", email=" . $this->email . ", fecha_nacimiento=".$this->fech_nac .   '}';//falta el valor de carrera pero no deja por extension
    }
}
