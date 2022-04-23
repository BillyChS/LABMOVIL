<?php

//include_once("Entidades/Carrera.php");
include_once("../AccesoADAtos/ServicioCiclo.php");

class ModeloCiclo
{

    private $ciclo;
    private $servicioCiclo;


    public  function __construct()
    {
        $this->ciclo = new Ciclo("", "", "", "", "", "");
        $this->servicioCiclo = new ServicioCiclo();
    }

    public function getCiclo()
    {
        return $this->carrera;
    }

    public function setCiclo($ciclo)
    {
        $this->ciclo = $ciclo;
    }

    public function insertar($ciclo)
    {
        $this->servicioCiclo->insertar_ciclo($ciclo);
    }

    public function eliminar($no_ciclo)
    {
        return $this->servicioCiclo->eliminar_ciclo($no_ciclo);
    }
    //Buscar por codigo
    public function buscarPorAnio($anio)
    {
        return $this->servicioCiclo->buscar_por_anio($anio);
    }
}
