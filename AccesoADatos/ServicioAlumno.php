<?php
include('Servicio.php');
include('../Entidades/Alumno.php');
include('../Entidades/Carrera.php');
//include 'Exceptions/GlobalException.php';
//include 'Exceptions/NoDataException.php';


class ServicioAlumno extends Servicio
{
    private  $INSERTAR_ALUMNO = "call INSERTAR_ALUMNO(?,?,?,?,?,?)";
    private  $MODIFICAR_ALUMNO = "call MODIFICAR_ALUMNO(?,?,?,?)";
    private  $ELIMINAR_ALUMNO = "call ELIMINAR_ALUMNO(?)";
    private $eliminar = "call ELIMINAR_ALUMNO(?)";
    //private $alumno = new Carrera("","","");

    public function __construct()
    {
    }





    public function insertar_alumno($alumno)
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
            $stmt = $con->prepare($this->INSERTAR_ALUMNO);

            //variables
            $cedula = $alumno->getCedula_alumno();
            $nombre = $alumno->getNombre();
            $telefono = $alumno->getTelefono();
            $email = $alumno->getEmail();
            $fecha_n = $alumno->getFech_nac();
            $carrera = $alumno->getCarrera();
            //Seteamos los parametros 
            $stmt->bind_param("ssssss", $cedula, $nombre, $telefono, $email, $fecha_n, $carrera);
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


    public function listar_alumno() // no se si desarrollar para profesor
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
            $LISTAR_ALUMNO = "SELECT * FROM ALUMNO";
            //Llamado al prodecimiento almacenado
            $stmt = $con->query($LISTAR_ALUMNO);

            foreach ($stmt as $key) {

                $OBTENER_CARRERA = "SELECT CODIGO_CARRERA,NOMBRE,TITULO FROM CARRERA WHERE CODIGO_CARRERA='" . $key["CARRERA"] . "'";

                //Llamado al prodecimiento almacenado
                $res = $con->query($OBTENER_CARRERA);

                while ($row = $res->fetch_assoc()) {
                    $carrera = new Carrera(
                        $row["CODIGO_CARRERA"],
                        $row["NOMBRE"],
                        $row["TITULO"]
                    );
                }

                $alumno = new Alumno(
                    $key["CEDULA_ALUMNO"],
                    $key["NOMBRE"],
                    $key["TELEFONO"],
                    $key["EMAIL"],
                    $key["FECHA_NACIMIENTO"],
                    array(
                        "Codigo_Carrera" => $carrera->getCodigo_carrera(),
                        "Nombre" => $carrera->getNombre(),
                        "Titulo" => $carrera->getTitulo()
                    )
                );


                $d = array(
                    "Cedula_Alumno" => $alumno->getCedula_alumno(),
                    "Nombre" => $alumno->getNombre(),
                    "Telefono" => $alumno->getTelefono(),
                    "Email" => $alumno->getEmail(),
                    "Fecha_Nacimiento" => $alumno->getFech_nac(),
                    "Carrera" => $alumno->getCarrera()
                );

                array_push($coleccion, $d);
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


    public function buscar_alumno_carrera($carrera) // no se si desarrollar para profesor
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
            $LISTAR_ALUMNO = "SELECT AL.CEDULA_ALUMNO as CEDULA_ALUMNO,
                    AL.NOMBRE as NOMBRE,
                    AL.TELEFONO as TELEFONO,
                    AL.EMAIL as EMAIL,
                    AL.FECHA_NACIMIENTO as FECHA_NACIMIENTO,
                    AL.CARRERA as CARRERA
                    FROM ALUMNO AS AL 
                    INNER JOIN CARRERA AS CAR ON AL.CARRERA=CAR.CODIGO_CARRERA 
                    WHERE CAR.NOMBRE='$carrera'";
            //Llamado al prodecimiento almacenado
            $stmt = $con->query($LISTAR_ALUMNO);


            if (!empty($stmt) && $stmt->num_rows > 0) {
                // output data of each row
                while ($row = $stmt->fetch_assoc()) {

                    $alumno = new Alumno(
                        $row["CEDULA_ALUMNO"],
                        $row["NOMBRE"],
                        $row["TELEFONO"],
                        $row["EMAIL"],
                        $row["FECHA_NACIMIENTO"],
                        $carrera
                    );

                    $d = array(
                        "Cedula_Alumno" => $alumno->getCedula_alumno(),
                        "Nombre" => $alumno->getNombre(),
                        "Telefono" => $alumno->getTelefono(),
                        "Email" => $alumno->getEmail(),
                        "Fecha_Nacimiento" => $alumno->getFech_nac(),
                        "Carrera" => $alumno->getCarrera()
                    );

                    array_push($coleccion, $d);
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
        if ($coleccion == null || sizeof($coleccion) == 0) {
            echo "No hay datos";
        }

        return $coleccion;
    }



    //Busqueda por codigo de carrera
    public function buscar_alumno_cedula($cedula)
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
            $LISTAR_ALUMNO = "SELECT CEDULA_ALUMNO,NOMBRE,TELEFONO,EMAIL,FECHA_NACIMIENTO,CARRERA FROM ALUMNO WHERE CEDULA_ALUMNO='" . $cedula . "'";

            //Llamado al prodecimiento almacenado
            $stmt = $con->query($LISTAR_ALUMNO);
            //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
            //$stmt->execute();

            //rs = (ResultSet) pstmt.getObject(1);
            if ($stmt->num_rows > 0) {
                // output data of each row
                while ($row = $stmt->fetch_assoc()) {
                    $coleccion = array(
                        "Cedula_alumno" => $row["CEDULA_ALUMNO"],
                        "Nombre" => $row["NOMBRE"],
                        "Telefono" => $row["TELEFONO"],
                        "Email" => $row["EMAIL"],
                        "Fecha_nacimiento" => $row["FECHA_NACIMIENTO"],
                        "Carrera" => $row["CARRERA"]
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
    public function buscar_alumno_nombre($nombre)
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
            $LISTAR_ALUMNO = "SELECT CEDULA_ALUMNO,NOMBRE,TELEFONO,EMAIL,FECHA_NACIMIENTO,CARRERA FROM ALUMNO WHERE NOMBRE='" . $nombre . "'";

            //Llamado al prodecimiento almacenado
            $stmt = $con->query($LISTAR_ALUMNO);
            //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
            //$stmt->execute();

            //rs = (ResultSet) pstmt.getObject(1);
            if ($stmt->num_rows > 0) {
                // output data of each row
                while ($row = $stmt->fetch_assoc()) {
                    $coleccion = array(
                        "Cedula_alumno" => $row["CEDULA_ALUMNO"],
                        "Nombre" => $row["NOMBRE"],
                        "Telefono" => $row["TELEFONO"],
                        "Email" => $row["EMAIL"],
                        "Fecha_nacimiento" => $row["FECHA_NACIMIENTO"],
                        "Carrera" => $row["CARRERA"]
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



    public function eliminar_alumno($codigoAlumno)
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
            $stmt = $con->prepare("call ELIMINAR_ALUMNO(?)");

            $stmt->bind_param("s", $codigoAlumno);
            //Ejecutar el statement
            $stmt->execute();
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
