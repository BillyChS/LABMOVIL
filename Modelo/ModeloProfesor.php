<?php

//include_once("Entidades/Profesor.php");
include_once("../AccesoADAtos/ServicioProfesor.php");

class ModeloProfesor
{

    private $profesor;
    private $servicioProfesor;
    private $table = "PROFESOR";

    public  function __construct()
    {
        $this->profesor = new Profesor("", "", "","");
        $this->servicioProfesor = new ServicioProfesor();
    }

    public function getProfesor()
    {
        return $this->profesor;
    }

    public function setProfesor($profesor)
    {
        $this->profesor = $profesor;
    }

    /*
    @Override
    public void addObserver(java.util.Observer o){
        super.addObserver(o);
        setChanged();
        notifyObservers(null);
    }
    */
    // public function listar()//ver si es necesario
    // {
    //     return $this->servicioProfesor->listar_carrera();
    // }

    public function insertar(Profesor $profesor)
    {
        $this->servicioProfesor->insertar_profesor($profesor);//cambiar metodo cuando se haga el servicio
        /*
        setChanged();
        this.notifyObservers(null);
        */
    }

    // public function modificar(Profesor $profesor)
    // {
    //     $this->servicioProfesor->modificar_profesor($profesor);//
    // }
    // public function eliminar($id)
    // {
    //     return $this->servicioProfesor->eliminar_profesor($id);//
    // }
    //Buscar por codigo
    public function buscarPorCodigo($id)
    {
        return $this->servicioProfesor->buscar_profesor_cedula($id);
    }
    //Busca por nombre
    public function buscarPorNombre($nombre)
    {
        return $this->servicioProfesor->buscar_profesor_nombre($nombre);
    }


}
