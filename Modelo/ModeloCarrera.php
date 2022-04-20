<?php

include '../Entidades/Carrera.php';

class CarreraModelo
{

    private $carrera;
    private $servicioCarrera;

    public  function __construct()
    {
        $this->carrera = new Carrera("", "", "");
        $this->servicioCarrera = new ServicioCarrera();
    }

    public function getCarrera()
    {
        return $this->carrera;
    }

    public function setCarrera(Carrera $carrera)
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

    public function insertar(Carrera $carrera)
    {
        $this->servicioCarrera->insertar_carrera($carrera);
        /*
        setChanged();
        this.notifyObservers(null);
        */
    }

    public function modificar()
    {
    }
    public function eliminar()
    {
    }
    public function buscar()
    {
        return $this->carrera;
    }

    public function listar()
    {

        //return $this->servicioCarrera->listar();
    }
}
