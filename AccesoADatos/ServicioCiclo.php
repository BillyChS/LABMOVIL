<?php
include('Servicio.php');
include('../Entidades/Ciclo.php');
//include 'Exceptions/GlobalException.php';
//include 'Exceptions/NoDataException.php';


class ServicioCiclo extends Servicio
{
    private  $INSERTAR_CICLO = "call INSERTAR_CICLO(?,?,?,?,?)";
    private  $MODIFICAR_CICLO = "call MODIFICAR_CICLO(?,?,?)";
    private  $ELIMINAR_CICLO = "call ELIMINAR_CICLO(?)";
    //private $laCarrera = new Carrera("","","");

    public function __construct()
    {
    }


    public function insertar_ciclo($ciclo)
    {
        try {
            $this->conectar();
        } catch (Exception $e) {
            echo "Exception:" . $e->getMessage();
        }

        //Statement
        $stmt = null;
        try {
            //objeto conexion
            $con = $this->conexion;
            //Llamado al prodecimiento almacenado
            $stmt = $con->prepare($this->INSERTAR_CICLO);

            //variables
            $no_Ciclo = $ciclo->getNo_ciclo();
            $anio = $ciclo->getAnio();
            $numero = $ciclo->getNumero();
            $fecha_inicio = $ciclo->getFecha_inicio();
            $fecha_fin = $ciclo->getFecha_fin();

            //Seteamos los parametros 
            $stmt->bind_param("sssss", $no_Ciclo, $anio, $numero, $fecha_inicio, $fecha_fin);
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


    //Busqueda por carrera
    public function buscar_por_anio($anio)
    {

        try {
            $this->conectar();
        } catch (Exception $e) {
            echo "Exception:" . $e->getMessage();
        }

        //Statement
        $stmt = null;
        try {
            //objeto conexion
            $con = $this->conexion;
            //
            $BUSCAR_CICLOPOANIO = "SELECT * FROM CICLO WHERE ANIO='" . $anio . "'";

            //Llamado al prodecimiento almacenado
            $stmt = $con->query($BUSCAR_CICLOPOANIO);
            //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
            //$stmt->execute();

            //rs = (ResultSet) pstmt.getObject(1);
            if ($stmt->num_rows > 0) {
                // output data of each row
                while ($row = $stmt->fetch_assoc()) {
                    $coleccion = array(
                        "No_Ciclo" => $row["NO_CICLO"],
                        "Anio" => $row["ANIO"],
                        "Numero" => $row["NUMERO"],
                        "Fecha_Inicio" => $row["FECHA_INICIO"],
                        "Fecha_Fin" => $row["FECHA_FIN"]
                    );
                }
            } else {
                $coleccion = array(
                    "Error" => "No existe el ciclo",
                );
            }
        } catch (Exception $EX) {
            echo "Exception, sentencia no valida: " . $EX->getMessage();
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
        return $coleccion;
    }





    public function eliminar_ciclo($no_Ciclo)
    {

        try {
            $this->conectar();
        } catch (Exception $e) {
            echo "Exception:" . $e->getMessage();
        }

        //Statement
        $stmt = null;
        try {
            //objeto conexion
            $con = $this->conexion;
            //Llamado al prodecimiento almacenado
            $stmt = $con->prepare($this->ELIMINAR_CICLO);

            $stmt->bind_param("s", $no_Ciclo);
            //Ejecutar el statement
            $res = $stmt->execute();

            if ($res == 0) {
                return true;
            } else {
                return false;
            }
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
