<?php

header("Content-Type:application/json");
include('../Controlador/ControladorProfesor.php');

$profesorController = new ControladorProfesor();

switch ($_SERVER['REQUEST_METHOD']) {

    case 'POST':
        //Obtenemos la informacion de la URL
        $_POST =  json_decode(file_get_contents('php://input'), true);
        //Se crea una instancia de Carrera con los datos
        $profesor = new Profesor($_POST["Cedula_Profesor"], $_POST["Nombre"], $_POST["Telefono"], $_POST["Email"]);

        //Se llama al controlador y se envia la info
        $profesorController->insertData($profesor);
        //Imprimimos el resultado
        $resultado["mensaje"] = "Guardar profesor, informacion " . json_encode($_POST);
        echo json_encode($resultado);
        break;

    case 'GET':

        //if nos pide el id, entonces retornamos solo 1 usuario, else retornamos todos los usuarios
        if (isset($_GET['Cedula'])) {

            $resultado = $profesorController->searchDataId($_GET["Cedula"]);

            echo json_encode($resultado);
        } elseif (isset($_GET['Nombre'])) {

            $resultado = $profesorController->searchDataName($_GET["Nombre"]);
            echo json_encode($resultado);
        }
        /*else{

            $resultado = $profesorController->getData();
            //$resultado["mensaje"] = "Retornar todos los usuario:";
            echo json_encode($resultado);
        }*/

        break;

        // case 'PUT':

        //     $_PUT =  json_decode(file_get_contents('php://input'), true);
        //     //Se crea una instancia de Carrera con los datos
        //     $carrera = new Carrera($_PUT["Codigo_carrera"], $_PUT["Nombre"], $_PUT["Titulo"]);
        //     //Se llama al controlador y se envia la info
        //     $profesorController->updateData($carrera);

        //     $resultado["mensaje"] = "Actualizar: " . $_GET['Codigo_carrera'] . "Informacion a actualizar: "
        //         . json_encode($_PUT);

        //     echo json_encode($resultado);
        //     break;

        // case 'DELETE':

        //     //$resultado["mensaje"] = "Eliminar la carrera con el codigo de carrera: " . $_GET['id'];
        //     $resultado = $profesorController->deleteData($_GET["id"]);
        //     echo json_encode($resultado);

        //     break;
}

 

//OBTENER


//OBTENER TODOS LOS USUARIOS


//ACTUALIZAR TODOS LOS USUARIOS


//ELIMINAR LOS USUARIOS 
