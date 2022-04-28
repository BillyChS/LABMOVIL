
<?php
include('../Modelo/ModeloProfesor.php');

class ControladorProfesor
{
    public function __construct()
    {
    }
    //Guardar Carrera
    public function insertData($profesor)
    {
        $profesorModel = new ModeloProfesor();
        $profesorModel->insertar($profesor);
    }
    //Obtener Carreras
    public function getData()
    {
        $profesorModel = new ModeloProfesor();

        return $profesorModel->listar();
    }

    // public function updateData($profesor)
    // {
    //     $profesorModel = new ModeloProfesor();
    //     $profesorModel->modificar($profesor);
    // }
    //Buscar por codigo de profesor
    public function searchDataId($id)
    {
        $profesorModel = new ModeloProfesor();
        $data = $profesorModel->buscarPorCodigo($id);
        return $data;
    }
    //Buscar por nombre
    public function searchDataName($nombre)
    {
        $profesorModel = new ModeloProfesor();
        $data = $profesorModel->buscarPorNombre($nombre);
        return $data;
    }

    // public function deleteData($id)
    // {
    //     $profesorModel = new ModeloProfesor();
    //     return $profesorModel->eliminar($id);
    // }
}
