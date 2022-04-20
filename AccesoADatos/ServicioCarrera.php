<?php
include 'Servicio.php';
include '../Entidades/Carrera.php';
include 'Exceptions/GlobalException.php';
include 'Exceptions/NoDataException.php';


class ServicioCarrera extends Servicio
{
    private  $INSERTAR_CARRERA = "call INSERTAR_CARRERA(?,?,?)";
    private static $MODIFICAR_CARRERA = "{call MODIFICAR_CARRERA(?,?,?)}";

    public function __construct()
    {
    }

    public function insertar_carrera(Carrera $carrera)
    {
        try {
            $this->conectar();
        } catch (Exception $e) {
            echo "Exception:" . $e->getMessage();
        }
        $stmt = null;
        try {
            //objeto conexion
            $con = $this->conexion;
            //Llamado al prodecimiento almacenado
            $stmt = $con->prepare($this->INSERTAR_CARRERA);

            $codigo_carrea = $carrera->getCodigo_carrera();
            $nombre = $carrera->getNombre();
            $titulo = $carrera->getTitulo();
            //Seteamos los parametros 
            $stmt->bind_param("sss", $codigo_carrea, $nombre, $titulo);
            //Ejecutar el statement
            $stmt->execute();
        } catch (Exception $EX) {
            echo "Error" . $EX->getMessage();
        } finally {
            try {
                //Se cierra el statement
                if ($stmt != null) {
                    $stmt->close();
                }
                $this->desconectar();
            } catch (mysqli_sql_exception $s) {
                echo "Error" . $s->getMessage();
            }
        }
    }
}
