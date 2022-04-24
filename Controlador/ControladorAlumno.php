<?php
include('../Modelo/ModeloAlumno.php');

class ControladorAlumno
{
    public function __construct()
    {
    }
    //Guardar Carrera
    public function insertData($alumno)
    {
        $alumnoModel = new ModeloAlumno();
        $alumnoModel->insertar($alumno);
    }
    //Obtener Alumnos
    public function getData()
    {
        $alumnoModel = new ModeloAlumno();
        $data = array();



        foreach ($alumnoModel->listar() as $s) {
            $d = array(
                "Cedula_alumno" => $s->getCedula_alumno(),
                "Nombre" => $s->getNombre(),
                "Telefono" => $s->getTelefono(),
                "Email" => $s->getEmail(),
                "Fecha_nacimineto" => $s->getFech_nac(),
                "Carrera" => $s->getCarrera()
            );
            array_push($data, $d);
        }

        return $data;
    }

    // public function updateData($alumno)
    // {
    //     $alumnoModel = new ModeloAlumno();
    //     $alumnoModel->modificar($alumno);
    // }
    //Buscar por codigo de alumno
    public function searchDataId($id)
    {
        $alumnoModel = new ModeloAlumno();
        $data = $alumnoModel->buscarPorCodigo($id);
        return $data;
    }
    //Buscar por nombre
    public function searchDataName($nombre)
    {
        $alumnoModel = new ModeloAlumno();
        $data = $alumnoModel->buscarPorNombre($nombre);
        return $data;
    }
    
    //Buscar por carrera
    public function searchDataCareer($carrera)
    {
        $alumnoModel = new ModeloAlumno();
        $data = $alumnoModel->buscarPorCarrera($carrera);
        return $data;
    }
    
    public function deleteData($id)
    {
        $alumnoModel = new ModeloAlumno();
        return $alumnoModel->eliminar($id);
    }
}