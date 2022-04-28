
<?php
include('../Modelo/ModeloCiclo.php');

class ControladorCiclo
{
    public function __construct()
    {
    }
    //Guardar Carrera
    public function insertData($ciclo)
    {
        $modeloCiclo = new ModeloCiclo();
        $modeloCiclo->insertar($ciclo);
    }

    public function getData()
    {
        $modeloCiclo = new ModeloCiclo();
        return $modeloCiclo->obtenerCiclos();
    }

    //Por carrera
    public function searchDataYear($anio)
    {
        $modeloCiclo = new ModeloCiclo();
        $data = $modeloCiclo->buscarPorAnio($anio);
        return $data;
    }

    public function deleteData($no_ciclo)
    {
        $modeloCiclo = new ModeloCiclo();
        return $modeloCiclo->eliminar($no_ciclo);
    }
}
