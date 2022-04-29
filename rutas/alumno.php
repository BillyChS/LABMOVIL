<?php

header("Content-Type:application/json");
include('../Controlador/ControladorAlumno.php');

$alumnoController = new ControladorAlumno();

switch ($_SERVER['REQUEST_METHOD']) {

    case 'POST':
        //Obtenemos la informacion de la URL
        $_POST =  json_decode(file_get_contents('php://input'), true);
        //Se crea una instancia de Carrera con los datos
        $alumno = new Alumno($_POST["Cedula_Alumno"], $_POST["Nombre"], $_POST["Telefono"], $_POST["Email"], $_POST["Fecha_Nacimiento"], $_POST["Carrera"]);

        //Se llama al controlador y se envia la info
        $alumnoController->insertData($alumno);
        //Imprimimos el resultado
        $resultado["mensaje"] = "Guardar alumno, informacion " . json_encode($_POST);
        echo json_encode($resultado);
        break;

    case 'GET':

        //if nos pide el id, entonces retornamos solo 1 usuario, else retornamos todos los usuarios
        if (isset($_GET['Cedula_Alumno'])) {

            $resultado = $alumnoController->searchDataId($_GET["Cedula_Alumno"]);

            echo json_encode($resultado);
        } elseif (isset($_GET['Nombre'])) {

            $resultado = $alumnoController->searchDataName($_GET["Nombre"]);
            echo json_encode($resultado);
        } elseif (isset($_GET['Carrera'])) {

            $resultado = $alumnoController->buscarPor_Carrera($_GET["Carrera"]);
            echo json_encode($resultado);
        } else {

            $resultado = $alumnoController->getData();
            echo json_encode($resultado);
        }

        break;

        // case 'PUT':

        //     $_PUT =  json_decode(file_get_contents('php://input'), true);
        //     //Se crea una instancia de Carrera con los datos
        //     $carrera = new Carrera($_PUT["Codigo_carrera"], $_PUT["Nombre"], $_PUT["Titulo"]);
        //     //Se llama al controlador y se envia la info
        //     $alumnoController->updateData($carrera);

        //     $resultado["mensaje"] = "Actualizar: " . $_GET['Codigo_carrera'] . "Informacion a actualizar: "
        //         . json_encode($_PUT);

        //     echo json_encode($resultado);
        //     break;

    case 'DELETE':

        //$resultado["mensaje"] = "Eliminar la carrera con el codigo de carrera: " . $_GET['id'];
        $resultado = $alumnoController->deleteData($_GET["Cedula"]);
        echo json_encode($resultado);

        break;
}

 

//OBTENER


//OBTENER TODOS LOS USUARIOS


//ACTUALIZAR TODOS LOS USUARIOS


//ELIMINAR LOS USUARIOS 
