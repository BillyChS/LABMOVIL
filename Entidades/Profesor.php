<?php

class Profesor
{

    private  $cedula_profesor;
    private $nombre;
    private $telefono;
    private $email;

    public function __construct($cedula_profesor, $nombre, $telefono, $email)
    {
        $this->cedula_profesor = $cedula_profesor;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->email = $email;
    }

    public function getCedula_profesor()
    {
        return $this->cedula_profesor;
    }

    public function setCedula_profesor($cedula_profesor)
    {
        $this->cedula_profesor = $cedula_profesor;
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

    public function __toString()
    {
        return (string)"Profesor{" . "cedula_profesor=" . $this->cedula_profesor . ", nombre=" . $this->nombre . ", telefono=" . $this->telefono . ", email=" . $this->email . '}';
    }
}
