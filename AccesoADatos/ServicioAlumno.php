<?php
include('Servicio.php');
include('../Entidades/Alumno.php');
//include 'Exceptions/GlobalException.php';
//include 'Exceptions/NoDataException.php';


class ServicioProfesor extends Servicio
{
    private  $INSERTAR_PROFESOR = "call INSERTAR_PROFESOR(?,?,?,?)";
    // private  $MODIFICAR_PROFESOR = "call MODIFICAR_PROFESOR(?,?,?)";
    // private  $ELIMINAR_PROFESOR = "call ELIMINAR_PROFESOR(?)";
    //private $elProfesor = new Carrera("","","");

    public function __construct()
    {
    }

    public function insertar_alumno($elProfesor)
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
            $stmt = $con->prepare($this->INSERTAR_PROFESOR);

            //variables
            $cedula_profesor = $elProfesor->getCedula_profesor();
            $nombre = $elProfesor->getNombre();
            $telefono = $elProfesor->getTelefono();
            $email=$elProfesor->getEmail();
            //Seteamos los parametros 
            $stmt->bind_param("ssss", $cedula_profesor, $nombre, $telefono,$email);
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
    // public function listar_profesor()// no se si desarrollar para profesor
    // {

    //     try {
    //         $this->conectar();
    //     } catch (Exception $e) {
    //         echo "Exception:" . $e->getMessage();
    //     }

    //     $coleccion = array();

    //     //Statement
    //     $stmt = null;
    //     try {
    //         //objeto conexion
    //         $con = $this->conexion;
    //         //
    //         $LISTAR_CARRERA = "SELECT * FROM CARRERA";
    //         //Llamado al prodecimiento almacenado
    //         $stmt = $con->query($LISTAR_CARRERA);
    //         //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
    //         //$stmt->execute();

    //         //rs = (ResultSet) pstmt.getObject(1);

    //         foreach ($stmt as $key) {
    //             $elProfesor = new Carrera(
    //                 $key["CODIGO_CARRERA"],
    //                 $key["NOMBRE"],
    //                 $key["TITULO"]
    //             );
    //             array_push($coleccion, $elProfesor);
    //         }
    //     } catch (Exception $EX) {
    //         echo "Exception, sentencia no valida: " . $EX->getMessage();
    //     } finally {
    //         try {
    //             //Se cierra el statement
    //             if ($stmt != null) {
    //                 $stmt->close();
    //             }
    //             $this->desconectar();
    //         } catch (mysqli_sql_exception $s) {
    //             echo "Error" . $s->getMessage();
    //         }
    //     }
    //     if ($coleccion == null || sizeof($coleccion) == 0) {
    //         echo "No hay datos";
    //     }
    //     return $coleccion;
    // }

  


   

    //Busqueda por codigo de carrera
    public function buscar_profesor_cedula($cedula_profesor)
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
            $LISTAR_PROFESOR = "SELECT CEDULA_PROFESOR,NOMBRE,TELEFONO,EMAIL FROM PROFESOR WHERE CEDULA_PROFESOR='" . $cedula_profesor . "'";

            //Llamado al prodecimiento almacenado
            $stmt = $con->query($LISTAR_PROFESOR);
            //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
            //$stmt->execute();

            //rs = (ResultSet) pstmt.getObject(1);
            if ($stmt->num_rows > 0) {
                // output data of each row
                while ($row = $stmt->fetch_assoc()) {
                    $coleccion = array(
                        "Cedula_profesor" => $row["CEDULA_PROFESOR"],
                        "Nombre" => $row["NOMBRE"],
                        "Telefono" => $row["TELEFONO"],
                        "Email"=>$row["EMAIL"]
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


    //buscar por nombre de carrera
    public function buscar_profesor_nombre($nombre_profesor)
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
            $LISTAR_PROFESOR = "SELECT CEDULA_PROFESOR,NOMBRE,TELEFONO,EMAIL FROM PROFESOR WHERE NOMBRE='" . $nombre_profesor . "'";

            //Llamado al prodecimiento almacenado
            $stmt = $con->query($LISTAR_PROFESOR);
            //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
            //$stmt->execute();

            //rs = (ResultSet) pstmt.getObject(1);
            if ($stmt->num_rows > 0) {
                // output data of each row
                while ($row = $stmt->fetch_assoc()) {
                    $coleccion = array(
                        "Cedula_profesor" => $row["CEDULA_PROFESOR"],
                        "Nombre" => $row["NOMBRE"],
                        "Telefono" => $row["TELEFONO"],
                        "Email"=>$row["EMAIL"]
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






    
}
