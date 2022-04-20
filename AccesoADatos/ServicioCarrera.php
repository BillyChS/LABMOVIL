<?php
include 'Servicio.php';
include '../Entidades/Carrera.php';
include 'Exceptions/GlobalException.php';
include 'Exceptions/NoDataException.php';
class ServicioCarrera extends Servicio
{
    private static $INSERTAR_CARRERA = "{call INSERTAR_CARRERA(?,?,?)}";
    private static $MODIFICAR_CARRERA = "{call MODIFICAR_CARRERA(?,?,?)}";


    public function __construct()
    {
    }
    public function insertar_carrera(Carrera $carrera)
    {
        try {
            $servicio = new Servicio();
        } catch (Exception $e) {
            echo 'Exception:' . $e->getMessage();
        }
    }
}
