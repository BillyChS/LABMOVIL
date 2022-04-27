<?php

header("Content-Type:application/json");
include('../Controlador/ControladorCiclo.php');

$cicloControler = new ControladorCiclo();

switch ($_SERVER['REQUEST_METHOD']) {

    case 'POST':
        //Obtenemos la informacion de la URL
        $_POST =  json_decode(file_get_contents('php://input'), true);
        //Se crea una instancia de Carrera con los datos
        $ciclo = new Ciclo($_POST["No_Ciclo"], $_POST["Anio"], $_POST["Numero"], $_POST["Fecha_Inicio"], $_POST["Fecha_Fin"]);

        //Se llama al controlador y se envia la info
        $cicloControler->insertData($ciclo);
        //Imprimimos el resultado
        $resultado["mensaje"] = "Guardar ciclo, informacion " . json_encode($_POST);
        echo json_encode($resultado);
        break;

    case 'GET':

        //if nos pide el id, entonces retornamos solo 1 usuario, else retornamos todos los usuarios
        if (isset($_GET['Anio'])) {

            $resultado = $cicloControler->searchDataYear($_GET["Anio"]);
            //$resultado["MENSAJE"] = "Retornar la carrera: " . $_GET['id'];
            //echo json_encode($resultado);
            //echo $resultado[0];
            echo json_encode($resultado);
        } else {

            //$resultado = $cicloControler->getData();
            //echo json_encode($resultado);
        }

        break;

    case 'PUT':

        break;

    case 'DELETE':

        //$resultado["mensaje"] = "Eliminar la carrera con el codigo de carrera: " . $_GET['id'];
        $resultado = $cicloControler->deleteData($_GET["No_ciclo"]);

        if ($resultado == true) {
            $resultado["Resultado"] = "True";
            echo json_encode($resultado);
        } else {
            $resultado["Resultado"] = "False";
            echo json_encode($resultado);
        }


        break;
}

 

//OBTENER


//OBTENER TODOS LOS USUARIOS


//ACTUALIZAR TODOS LOS USUARIOS


//ELIMINAR LOS USUARIOS 
