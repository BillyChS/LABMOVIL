<?php

class Ciclo
{

    private $no_ciclo;
    private $anio;
    private $numero;
    private $fecha_inicio;
    private $fecha_fin;

    public function __construct($no_ciclo, $anio, $numero, $fecha_inicio, $fecha_fin)
    {
        $this->no_ciclo = $no_ciclo;
        $this->anio = $anio;
        $this->numero = $numero;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
    }

    public function getNo_ciclo()
    {
        return $this->no_ciclo;
    }

    public function setNo_ciclo($no_ciclo)
    {
        $this->no_ciclo = $no_ciclo;
    }

    public function getAnio()
    {
        return $this->anio;
    }

    public function setAnio($anio)
    {
        $this->anio = $anio;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getFecha_inicio()
    {
        return $this->fecha_inicio;
    }

    public function setFecha_inicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function getFecha_fin()
    {
        return $this->fecha_fin;
    }

    public function setFecha_fin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }

    public function __toString()
    {
        try {
            return (string) "Ciclo{" . "no_ciclo=" . $this->no_ciclo . ", anio=" . $this->anio . ", numero=" . $this->numero . ", fecha_inicio=" . $this->fecha_inicio . ", fecha_fin=" . $this->fecha_fin . '}';;
        } catch (Exception $e) {
            return '';
        }
    }
}
