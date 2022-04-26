<?php

//include_once("Entidades/Carrera.php");
include_once("../AccesoADAtos/ServicioCarrera.php");

class CarreraModelo
{

    private $carrera;
    private $servicioCarrera;
    private $table = "CARRERA";

    public  function __construct()
    {
        $this->carrera = new Carrera("", "", "");
        $this->servicioCarrera = new ServicioCarrera();
    }

    public function getCarrera()
    {
        return $this->carrera;
    }

    public function setCarrera($carrera)
    {
        $this->carrera = $carrera;
    }

    /*
    @Override
    public void addObserver(java.util.Observer o){
        super.addObserver(o);
        setChanged();
        notifyObservers(null);
    }
    */
    public function listar()
    {
        return $this->servicioCarrera->listar_carrera();
    }

    public function insertar(Carrera $carrera)
    {
        return $this->servicioCarrera->insertar_carrera($carrera);
    }

    public function modificar(Carrera $carrera)
    {
        $this->servicioCarrera->modificar_carrera($carrera);
    }
    public function eliminar($id)
    {
        return $this->servicioCarrera->eliminar_carrera($id);
    }
    //Buscar por codigo
    public function buscarPorCodigo($id)
    {
        return $this->servicioCarrera->buscar_carrera_codigo($id);
    }
    //Busca por nombre
    public function buscarPorNombre($nombre)
    {
        return $this->servicioCarrera->buscar_carrera_nombre($nombre);
    }

    //Buscar por carrera
    public function buscarCarrera($id)
    {
        //return $this->servicioCarrera->buscar_carrera($id);
    }
}
