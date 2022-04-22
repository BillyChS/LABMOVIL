<?php

header("Content-Type:application/json");
include('../Controlador/ControladorCarrera.php');

$carreraControler = new ControladorCarrera();

switch ($_SERVER['REQUEST_METHOD']) {

    case 'POST':
        //Obtenemos la informacion de la URL
        $_POST =  json_decode(file_get_contents('php://input'), true);
        //Se crea una instancia de Carrera con los datos
        $carrera = new Carrera($_POST["Codigo_carrera"], $_POST["Nombre"], $_POST["Titulo"]);

        //Se llama al controlador y se envia la info
        $carreraControler->insertData($carrera);
        //Imprimimos el resultado
        $resultado["mensaje"] = "Guardar carrera, informacion " . json_encode($_POST);
        echo json_encode($resultado);
        break;

    case 'GET':

        //if nos pide el id, entonces retornamos solo 1 usuario, else retornamos todos los usuarios
        if (isset($_GET['id'])) {

            $resultado = $carreraControler->searchData($_GET["id"]);
            //$resultado["MENSAJE"] = "Retornar la carrera: " . $_GET['id'];
            //echo json_encode($resultado);
            //echo $resultado[0];
            echo json_encode($resultado);
        } else {

            $resultado = $carreraControler->getData();
            //$resultado["mensaje"] = "Retornar todos los usuario:";
            echo json_encode($resultado);
        }

        break;

    case 'PUT':

        $_PUT =  json_decode(file_get_contents('php://input'), true);
        //Se crea una instancia de Carrera con los datos
        $carrera = new Carrera($_PUT["Codigo_carrera"], $_PUT["Nombre"], $_PUT["Titulo"]);
        //Se llama al controlador y se envia la info
        $carreraControler->updateData($carrera);

        $resultado["mensaje"] = "Actualizar: " . $_GET['Codigo_carrera'] . "Informacion a actualizar: "
            . json_encode($_PUT);

        echo json_encode($resultado);
        break;

    case 'DELETE':

        //$resultado["mensaje"] = "Eliminar la carrera con el codigo de carrera: " . $_GET['id'];
        $resultado = $carreraControler->deleteData($_GET["id"]);
        echo json_encode($resultado);

        break;
}

 

//OBTENER


//OBTENER TODOS LOS USUARIOS


//ACTUALIZAR TODOS LOS USUARIOS


//ELIMINAR LOS USUARIOS 
