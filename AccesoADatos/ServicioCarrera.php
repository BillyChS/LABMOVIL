<?php
include('Servicio.php');
include('../Entidades/Carrera.php');
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
            $res = $stmt->execute();
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
        if ($res == true) {
            return $res = "Se inserto correctamente";
        } else {
            return $res = "No se inserto correctamente";
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

            $coleccion = array();
            foreach ($stmt as $key) {
                $LISTAR_CURSOS = "SELECT * FROM CURSO WHERE CODIGO_CARRERA='" . $key["CODIGO_CARRERA"] . "'";
                //Llamado al prodecimiento almacenado
                $sql = $con->query($LISTAR_CURSOS);
                //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
                //$stmt->execute();

                //rs = (ResultSet) pstmt.getObject(1);
                $cursos = array();
                foreach ($sql as $k) {
                    ///
                    $c = new Curso(
                        $k["CODIGO_CURSO"],
                        $k["CODIGO_CARRERA"],
                        $k["NO_CICLO"],
                        $k["NOMBRE"],
                        $k["CREDITOS"],
                        $k["HORAS_SEMANALES"]
                    );
                    $curso = array(
                        "Codigo_Curso" => $c->getCodigo_curso(),
                        "Codigo_Carrera" => $c->getCodigo_carrera(),
                        "No_Ciclo" => $c->getNo_ciclo(),
                        "Nombre" => $c->getNombre(),
                        "Creditos" => $c->getCreditos(),
                        "Horas_Semanales" => $c->getHoras_semanales()
                    );
                    array_push($cursos, $curso);
                }
                $laCarrera = new Carrera(
                    $key["CODIGO_CARRERA"],
                    $key["NOMBRE"],
                    $key["TITULO"]
                );
                $laCarrera->setCursos($cursos);
                $data = array(
                    "Codigo_Carrera" => $laCarrera->getCodigo_carrera(),
                    "Nombre" => $laCarrera->getNombre(),
                    "Titulo" => $laCarrera->getTitulo(),
                    "Cursos" => $laCarrera->getCursos()
                );
                array_push($coleccion, $data);
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



    //Busqueda por codigo de carrera
    public function buscar_carrera_codigo($codigo_carrea)
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
            //Llamado al prodecimiento almacenado
            $stmt = $con->query($LISTAR_CARRERA);
            //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
            //$stmt->execute();

            //rs = (ResultSet) pstmt.getObject(1);
            if ($stmt->num_rows > 0) {
                // output data of each row
                while ($row = $stmt->fetch_assoc()) {
                    $LISTAR_CURSOS = "SELECT * FROM CURSO WHERE CODIGO_CARRERA='" . $row["CODIGO_CARRERA"] . "'";
                    //Llamado al prodecimiento almacenado
                    $sql = $con->query($LISTAR_CURSOS);
                    //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
                    //$stmt->execute();

                    //rs = (ResultSet) pstmt.getObject(1);
                    $cursos = array();
                    foreach ($sql as $k) {
                        ///
                        $c = new Curso(
                            $k["CODIGO_CURSO"],
                            $k["CODIGO_CARRERA"],
                            $k["NO_CICLO"],
                            $k["NOMBRE"],
                            $k["CREDITOS"],
                            $k["HORAS_SEMANALES"]
                        );
                        $curso = array(
                            "Codigo_Curso" => $c->getCodigo_curso(),
                            "Codigo_Carrera" => $c->getCodigo_carrera(),
                            "No_Ciclo" => $c->getNo_ciclo(),
                            "Nombre" => $c->getNombre(),
                            "Creditos" => $c->getCreditos(),
                            "Horas_Semanales" => $c->getHoras_semanales()
                        );
                        array_push($cursos, $curso);
                    }
                    $laCarrera = new Carrera(
                        $row["CODIGO_CARRERA"],
                        $row["NOMBRE"],
                        $row["TITULO"],

                    );

                    $laCarrera->setCursos($cursos);
                    $coleccion = array(
                        "Codigo_Carrera" => $laCarrera->getCodigo_carrera(),
                        "Nombre" => $laCarrera->getNombre(),
                        "Titulo" => $laCarrera->getTitulo(),
                        "Cursos" => $laCarrera->getCursos()
                    );
                    array_push($coleccion, $laCarrera);
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
    public function buscar_carrera_nombre($nombre_carrea)
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
            $LISTAR_CARRERA = "SELECT CODIGO_CARRERA,NOMBRE,TITULO FROM CARRERA WHERE NOMBRE='" . $nombre_carrea . "'";

            //Llamado al prodecimiento almacenado
            $stmt = $con->query($LISTAR_CARRERA);
            //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
            //$stmt->execute();
            $coleccion = array();
            //rs = (ResultSet) pstmt.getObject(1);
            if ($stmt->num_rows > 0) {
                // output data of each row
                while ($row = $stmt->fetch_assoc()) {

                    $LISTAR_CURSOS = "SELECT * FROM CURSO WHERE CODIGO_CARRERA='" . $row["CODIGO_CARRERA"] . "'";
                    //Llamado al prodecimiento almacenado
                    $sql = $con->query($LISTAR_CURSOS);
                    //pstmt.registerOutParameter(1, OracleTypes.CURSOR);
                    //$stmt->execute();

                    //rs = (ResultSet) pstmt.getObject(1);
                    $cursos = array();
                    foreach ($sql as $k) {
                        ///
                        $c = new Curso(
                            $k["CODIGO_CURSO"],
                            $k["CODIGO_CARRERA"],
                            $k["NO_CICLO"],
                            $k["NOMBRE"],
                            $k["CREDITOS"],
                            $k["HORAS_SEMANALES"]
                        );
                        $curso = array(
                            "Codigo_Curso" => $c->getCodigo_curso(),
                            "Codigo_Carrera" => $c->getCodigo_carrera(),
                            "No_Ciclo" => $c->getNo_ciclo(),
                            "Nombre" => $c->getNombre(),
                            "Creditos" => $c->getCreditos(),
                            "Horas_Semanales" => $c->getHoras_semanales()
                        );
                        array_push($cursos, $curso);
                    }

                    $laCarrera = new Carrera(
                        $row["CODIGO_CARRERA"],
                        $row["NOMBRE"],
                        $row["TITULO"],

                    );
                    $laCarrera->setCursos($cursos);
                    $coleccion = array(
                        "Codigo_Carrera" => $laCarrera->getCodigo_carrera(),
                        "Nombre" => $laCarrera->getNombre(),
                        "Titulo" => $laCarrera->getTitulo(),
                        "Cursos" => $laCarrera->getCursos()
                    );
                    array_push($coleccion, $laCarrera);
                }
            } else {
                $coleccion = "No hay resulados";
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
        if ($res == true) {
            return "No se realizo el borrado o la carrera no existe";
        } else {
            return "Eliminación Satisfactoria!";
        }
    }
}
