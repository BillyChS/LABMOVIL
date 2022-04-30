<?php
include('Servicio.php');
include('../Entidades/Curso.php');
//include 'Exceptions/GlobalException.php';
//include 'Exceptions/NoDataException.php';


class ServicioCurso extends Servicio
{
    private  $INSERTAR_CURSO = "call INSERTAR_CURSO(?,?,?,?,?,?)";
    private  $MODIFICAR_CURSO = "call MODIFICAR_CURSO(?,?,?,?,?,?)";
    private  $ELIMINAR_CURSO = "call ELIMINAR_CURSO(?)";
    //private $laCarrera = new Carrera("","","");

    public function __construct()
    {
    }

    //ISERTAR CURSO
    public function insertar_curso($curso)
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
            $stmt = $con->prepare($this->INSERTAR_CURSO);

            //variables
            $codigo_curso = $curso->getCodigo_curso();
            $codigo_carrea = $curso->getCodigo_carrera();
            $no_ciclo = $curso->getNo_ciclo();
            $nombre = $curso->getNombre();
            $creditos = $curso->getCreditos();
            $horas_semanales = $curso->getHoras_semanales();

            //Seteamos los parametros 
            $stmt->bind_param("ssssss", $codigo_curso, $codigo_carrea, $no_ciclo, $nombre, $creditos, $horas_semanales);

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
    public function listar_cursos()
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
            $LISTAR_CURSOS = "SELECT * FROM CURSO";
            //Llamado al prodecimiento almacenado
            $stmt = $con->query($LISTAR_CURSOS);
            //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
            //$stmt->execute();

            //rs = (ResultSet) pstmt.getObject(1);

            foreach ($stmt as $key) {
                $curso = new Curso(
                    $key["CODIGO_CURSO"],
                    $key["CODIGO_CARRERA"],
                    $key["NO_CICLO"],
                    $key["NOMBRE"],
                    $key["CREDITOS"],
                    $key["HORAS_SEMANALES"]
                );
                array_push($coleccion, $curso);
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


    //MODIFICAR CURSO
    public function modificar_curso($curso)
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
            $stmt = $con->prepare($this->MODIFICAR_CURSO);

            //variables
            //variables
            $codigo_curso = $curso->getCodigo_curso();
            $codigo_carrea = $curso->getCodigo_carrera();
            $no_ciclo = $curso->getNo_ciclo();
            $nombre = $curso->getNombre();
            $creditos = $curso->getCreditos();
            $horas_semanales = $curso->getHoras_semanales();

            //Seteamos los parametros 
            $stmt->bind_param("ssssss", $codigo_curso, $codigo_carrea, $no_ciclo, $nombre, $creditos, $horas_semanales);

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

    public function buscar_curso_codigoCarrera($codigoCarrera)
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
            $BUSCAR_CURSO_NOMBRE = "SELECT * FROM CURSO WHERE CODIGO_CARRERA='" . $codigoCarrera . "'";

            //Llamado al prodecimiento almacenado
            $stmt = $con->query($BUSCAR_CURSO_NOMBRE);
            //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
            //$stmt->execute();
            $cursos = array();
            //rs = (ResultSet) pstmt.getObject(1);
            if ($stmt->num_rows > 0) {
                // output data of each row
                while ($row = $stmt->fetch_assoc()) {
                    $coleccion = array(
                        "Codigo_Curso" => $row["CODIGO_CURSO"],
                        "Codigo_Carrera" => $row["CODIGO_CARRERA"],
                        "No_Ciclo" => $row["NO_CICLO"],
                        "Nombre" => $row["NOMBRE"],
                        "Creditos" => $row["CREDITOS"],
                        "Horas_Semanales" => $row["HORAS_SEMANALES"]
                    );
                    array_push($cursos, $coleccion);
                }
            } else {
                $coleccion = array(
                    "Error" => "No se cargaron los datos"
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
        return $cursos;
    }

    public function buscar_por_CodigoYCiclo($codigo_carrera, $No_Ciclo)
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
            //Inner Join 
            $BUSCAR_CURSO_NOMBRE = "SELECT * 
            FROM CURSO  
            WHERE CODIGO_CARRERA='$codigo_carrera' 
            AND NO_CICLO=$No_Ciclo";

            //Llamado al prodecimiento almacenado
            $stmt = $con->query($BUSCAR_CURSO_NOMBRE);
            //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
            //$stmt->execute();

            //rs = (ResultSet) pstmt.getObject(1);
            $cursos = array();
            if ($stmt->num_rows > 0) {
                // output data of each row
                while ($row = $stmt->fetch_assoc()) {
                    $coleccion = array(
                        "Codigo_Curso" => $row["CODIGO_CURSO"],
                        "Codigo_Carrera" => $row["CODIGO_CARRERA"],
                        "No_Ciclo" => $row["NO_CICLO"],
                        "Nombre" => $row["NOMBRE"],
                        "Creditos" => $row["CREDITOS"],
                        "Horas_Semanales" => $row["HORAS_SEMANALES"]
                    );
                    array_push($cursos, $coleccion);
                }
            } else {
                $coleccion = array(
                    "Error" => "No se cargaron los datos"
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
        return $cursos;
    }



    public function buscar_curso_nombre($nombre)
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
            $BUSCAR_CURSO_NOMBRE = "SELECT * FROM CURSO WHERE NOMBRE='" . $nombre . "'";

            //Llamado al prodecimiento almacenado
            $stmt = $con->query($BUSCAR_CURSO_NOMBRE);
            //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
            //$stmt->execute();

            //rs = (ResultSet) pstmt.getObject(1);
            $cursos = array();
            if ($stmt->num_rows > 0) {
                // output data of each row
                while ($row = $stmt->fetch_assoc()) {
                    $coleccion = array(
                        "Codigo_Curso" => $row["CODIGO_CURSO"],
                        "Codigo_Carrera" => $row["CODIGO_CARRERA"],
                        "No_Ciclo" => $row["NO_CICLO"],
                        "Nombre" => $row["NOMBRE"],
                        "Creditos" => $row["CREDITOS"],
                        "Horas_Semanales" => $row["HORAS_SEMANALES"]
                    );
                    array_push($cursos, $coleccion);
                }
            } else {
                $coleccion = array(
                    "Error" => "No se cargaron los datos"
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
        return $cursos;
    }



    //Busqueda por carrera
    public function buscar_curso_codigo($codigo_curso)
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
            $BUSCAR_CURSO_NOMBRE = "SELECT * FROM CURSO WHERE CODIGO_CURSO='" . $codigo_curso . "'";

            //Llamado al prodecimiento almacenado
            $stmt = $con->query($BUSCAR_CURSO_NOMBRE);
            //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
            //$stmt->execute();

            //rs = (ResultSet) pstmt.getObject(1);
            if ($stmt->num_rows > 0) {
                // output data of each row
                while ($row = $stmt->fetch_assoc()) {
                    $coleccion = array(
                        "Codigo_Curso" => $row["CODIGO_CURSO"],
                        "Codigo_Carrera" => $row["CODIGO_CARRERA"],
                        "No_Ciclo" => $row["NO_CICLO"],
                        "Nombre" => $row["NOMBRE"],
                        "Creditos" => $row["CREDITOS"],
                        "Horas_Semanales" => $row["HORAS_SEMANALES"]
                    );
                }
            } else {
                $coleccion = array(
                    "Error" => "No se cargaron los datos"
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


    //Busqueda por carrera
    public function buscar_curso_nombreCarrea($nombre_carrea)
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
            $funcion = $con->query("SELECT BUCAR_CARRERA(' . $nombre_carrea . ')");

            //$funcion->execute();
            //$funcion->fetchColumn();
            $BUSCAR_CURSO_NOMBRE = "SELECT * FROM CURSO INNER JOIN CARRERA ON CARRERA.CODIGO_CARRERA='EIF4'";

            //Llamado al prodecimiento almacenado
            $stmt = $con->query($BUSCAR_CURSO_NOMBRE);
            //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
            //$stmt->execute();

            //rs = (ResultSet) pstmt.getObject(1);
            $cursos = array();
            if ($stmt->num_rows > 0) {
                // output data of each row
                while ($row = $stmt->fetch_assoc()) {
                    $coleccion = array(
                        "Codigo_Curso" => $row["CODIGO_CURSO"],
                        "Codigo_Carrera" => $row["CODIGO_CARRERA"],
                        "No_Ciclo" => $row["NO_CICLO"],
                        "Nombre" => $row["NOMBRE"],
                        "Creditos" => $row["CREDITOS"],
                        "Horas_Semanales" => $row["HORAS_SEMANALES"]
                    );
                    array_push($cursos, $coleccion);
                }
            } else {
                $coleccion = array(
                    "Error" => $funcion
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
        return $cursos;
    }



    public function eliminar_curso($codigo_curso)
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
            $stmt = $con->prepare($this->ELIMINAR_CURSO);

            $stmt->bind_param("s", $codigo_curso);
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
