<?php

//include_once("Entidades/Alumno.php");
include_once("../AccesoADAtos/ServicioAlumno.php");

class ModeloAlumno
{

    private $alumno;
    private $servicioAlumno;
    private $table = "ALUMNO";

    public  function __construct()
    {
        $this->alumno = new Alumno("", "", "","","","");
        $this->servicioAlumno = new ServicioAlumno();
    }

    public function getAlumno()
    {
        return $this->alumno;
    }

    public function setAlumno($alumno)
    {
        $this->alumno = $alumno;
    }

    /*
    @Override
    public void addObserver(java.util.Observer o){
        super.addObserver(o);
        setChanged();
        notifyObservers(null);
    }
    */
    public function listar()//ver si es necesario
    {
        return $this->servicioAlumno->listar_alumno();
    }

    public function insertar(Alumno $alumno)
    {
        $this->servicioAlumno->insertar_alumno($alumno);//cambiar metodo cuando se haga el servicio
        /*
        setChanged();
        this.notifyObservers(null);
        */
    }

    // public function modificar(Alumno $alumno)
    // {
    //     $this->servicioAlumno->modificar_profesor($alumno);//
    // }
    // public function eliminar($id)
    // {
    //     return $this->servicioAlumno->eliminar_profesor($id);//
    // }
    //Buscar por codigo
    public function buscarPorCodigo($id)
    {
        return $this->servicioAlumno->buscar_alumno_cedula($id);
    }
    //Busca por nombre
    public function buscarPorNombre($nombre)
    {
        return $this->servicioAlumno->buscar_alumno_nombre($nombre);
    }
    //Busca por nombre
    public function buscarPorCarrera($nombre)
    {
        return $this->servicioAlumno->buscar_alumno_carrera($nombre);
    }
    public function eliminar($id)
    {
        return $this->servicioAlumno->eliminar_alumno($id);
    }


}
