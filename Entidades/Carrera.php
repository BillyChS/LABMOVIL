<?php

class Carrera
{
    private $codigo_carrera = "";
    private $nombre = "";
    private $titulo = "";
    //Array de las carreras
    private $lista_Cursos = array();
    //Constructor
    public function __construct($codigo_carrera, $nombre, $titulo)
    {
        $this->codigo_carrera = $codigo_carrera;
        $this->nombre = $nombre;
        $this->titulo = $titulo;
    }
    public function getCursos()
    {
        return $this->lista_Cursos;
    }
    public function setCursos($listacurso)
    {
        $this->lista_Cursos = $listacurso;
    }

    //Metodos
    public function getCodigo_carrera()
    {
        return $this->codigo_carrera;
    }

    public function setCodigo_carrera($codigo_carrera)
    {
        $this->codigo_carrera = $codigo_carrera;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function __toString()
    {
        try {
            return (string) "Carrera{" . "codigo_carrera=" . $this->codigo_carrera . ", nombre=" . $this->nombre . ", titulo=" . $this->titulo . '}';
        } catch (Exception $e) {
            return '';
        }
    }
}
