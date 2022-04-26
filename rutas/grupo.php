<?php

header("Content-Type:application/json");
include('../Controlador/ControladorGrupo.php');
//include("../Entidades/Profesor.php");
//include("../Entidades/Curso.php");
//include("../Entidades/Ciclo.php");
//include("../Entidades/Grupo.php");

$grupoControler = new ControladorGrupo();

switch ($_SERVER['REQUEST_METHOD']) {

    case 'POST':
        //Obtenemos la informacion de la URL
        $_POST =  json_decode(file_get_contents('php://input'), true);
        //Se crea una instancia de Carrera con los datos

        $grupo = new Grupo($_POST["Numero_Grupo"], $_POST["No_Ciclo"], $_POST["Codigo_Curso"], $_POST["Cedula_Profesor"], $_POST["Horario"]);

        //Se llama al controlador y se envia la info
        $grupoControler->insertData($grupo);
        //Imprimimos el resultado
        $resultado["mensaje"] = "Guardar grupo, informacion " . json_encode($_POST);
        echo json_encode($resultado);
        break;

    case 'GET':

        if (isset($_GET['id'])) {
        } elseif (isset($_GET['nombre'])) {
        } else {
        }

        break;

    case 'PUT':



    case 'DELETE':



        break;
}

 

//OBTENER


//OBTENER TODOS LOS USUARIOS


//ACTUALIZAR TODOS LOS USUARIOS


//ELIMINAR LOS USUARIOS 
