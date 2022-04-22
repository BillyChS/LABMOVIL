<?php

class Curso
{

    private $codigo_curso;
    private $codigo_carrera;
    private $no_ciclo;
    private $nombre;
    private $creditos;
    private $horas_semanales;

    public function __construct($codigo_curso, $codigo_carrera, $no_ciclo, $nombre, $creditos, $horas_semanales)
    {
        $this->codigo_curso = $codigo_curso;
        $this->codigo_carrera = $codigo_carrera;
        $this->no_ciclo = $no_ciclo;
        $this->nombre = $nombre;
        $this->creditos = $creditos;
        $this->horas_semanales = $horas_semanales;
    }


    public function getCodigo_curso()
    {
        return $this->codigo_curso;
    }

    public function setCodigo_curso($codigo_curso)
    {
        $this->codigo_curso = $codigo_curso;
    }

    public function getCodigo_carrera()
    {
        return $this->codigo_carrera;
    }

    public function setCodigo_carrera($codigo_carrera)
    {
        $this->codigo_carrera = $codigo_carrera;
    }

    public function getNo_ciclo()
    {
        return $this->no_ciclo;
    }

    public function setNo_ciclo($no_ciclo)
    {
        $this->no_ciclo = $no_ciclo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getCreditos()
    {
        return $this->creditos;
    }

    public function setCreditos($creditos)
    {
        $this->creditos = $creditos;
    }

    public function getHoras_semanales()
    {
        return $this->horas_semanales;
    }

    public function setHoras_semanales($horas_semanales)
    {
        $this->horas_semanales = $horas_semanales;
    }

    public function __toString()
    {
        try {
            return (string) "Curso{" . "codigo_curso=" . $this->codigo_curso . ", codigo_carrera=" . $this->codigo_carrera . ", no_ciclo=" . $this->no_ciclo . ", nombre=" . $this->nombre . ", creditos=" . $this->creditos . ", horas_semanales=" . $this->horas_semanales . '}';
        } catch (Exception $e) {
            return '';
        }
    }
}
