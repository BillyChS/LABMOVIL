<?php
include('Servicio.php');
include('../Entidades/Curso.php');
//include 'Exceptions/GlobalException.php';
//include 'Exceptions/NoDataException.php';


class ServicioCarrera extends Servicio
{
    private  $INSERTAR_CARRERA = "call INSERTAR_CARRERA(?,?,?)";
    private  $MODIFICAR_CARRERA = "call MODIFICAR_CARRERA(?,?,?)";
    private  $ELIMINAR_CARRERA = "call ELIMINAR_CARRERA(?)";
    //private $laCarrera = new Carrera("","","");

    public function __construct()
    {
    }

    public function insertar_carrera($laCarrera)
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
            $stmt = $con->prepare($this->INSERTAR_CARRERA);

            //variables
            $codigo_carrea = $laCarrera->getCodigo_carrera();
            $nombre = $laCarrera->getNombre();
            $titulo = $laCarrera->getTitulo();
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

    /**/
    public function listar_carrera()
    {

        try {
            $this->conectar();
        } catch (Exception $e) {
            echo "Exception:" . $e->getMessage();
        }

        $coleccion = array();

        //Statement
        $stmt = null;
        try {
            //objeto conexion
            $con = $this->conexion;
            //
            $LISTAR_CARRERA = "SELECT * FROM CARRERA";
            //Llamado al prodecimiento almacenado
            $stmt = $con->query($LISTAR_CARRERA);
            //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
            //$stmt->execute();

            //rs = (ResultSet) pstmt.getObject(1);

            foreach ($stmt as $key) {
                $laCarrera = new Carrera(
                    $key["CODIGO_CARRERA"],
                    $key["NOMBRE"],
                    $key["TITULO"]
                );
                array_push($coleccion, $laCarrera);
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
        if ($coleccion == null || sizeof($coleccion) == 0) {
            echo "No hay datos";
        }
        return $coleccion;
    }

    //MODIFICAR CARRERA
    public function modificar_carrera($laCarrera)
    {
        try {
            $this->conectar();
        } catch (Exception $e) {
            echo "Exception:" . $e->getMessage();
        }

        $stmt = null;

        //Statement
        $stmt = null;
        try {
            //objeto conexion
            $con = $this->conexion;
            //Llamado al prodecimiento almacenado
            $stmt = $con->prepare($this->MODIFICAR_CARRERA);

            //variables
            $codigo_carrea = $laCarrera->getCodigo_carrera();
            $nombre = $laCarrera->getNombre();
            $titulo = $laCarrera->getTitulo();

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

    public function buscar_carrera($codigo_carrea)
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
            $LISTAR_CARRERA = "SELECT CODIGO_CARRERA,NOMBRE,TITULO FROM CARRERA WHERE CODIGO_CARRERA='" . $codigo_carrea . "'";

            //Llamado al prodecimiento almacenado
            $stmt = $con->query($LISTAR_CARRERA);
            //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
            //$stmt->execute();

            //rs = (ResultSet) pstmt.getObject(1);
            if ($stmt->num_rows > 0) {
                // output data of each row
                while ($row = $stmt->fetch_assoc()) {
                    $coleccion = array(
                        "Codigo_carrera" => $row["CODIGO_CARRERA"],
                        "Nombre" => $row["NOMBRE"],
                        "Titulo" => $row["TITULO"]
                    );
                }
            } else {
                echo "0 results";
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




    public function eliminar_carrera($codigoCarrera)
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
            $stmt = $con->prepare($this->ELIMINAR_CARRERA);

            $stmt->bind_param("s", $codigoCarrera);
            //Ejecutar el statement
            $res = $stmt->execute();
            /*
            if ($res == 0) {
                echo "No se realizo el borrado";
            } else {
                echo "\nEliminación Satisfactoria!";
            }
            */
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
