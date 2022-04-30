<?php

header("Content-Type:application/json");
include('../Controlador/ControladorLogin.php');

$usuarioControler = new ControladorLogin();

switch ($_SERVER['REQUEST_METHOD']) {

    case 'POST':
        //Obtenemos la informacion de la URL
        $_POST =  json_decode(file_get_contents('php://input'), true);
        //Se crea una instancia de Carrera con los datos
    
       $cedula=$_POST["Cedula"];
       $clave=$_POST["Clave"];
        //Se llama al controlador y se envia la info


        $resultado= $usuarioControler->inicio($cedula,$clave);
        //$resultado["mensaje"]=json_encode($usuarioControler->inicio($cedula,$clave));
       // echo($resultado[0]['CEDULA']);
        // $this->cedula = $datos[0]['CEDULA'];
        //       $this->rol = $datos[0]['ROL'];
        //       return $datos;
        //Imprimimos el resultado
        //$resultado["mensaje"] = "Guardar alumno, informacion " . json_encode($_POST);
       
        echo json_encode($resultado);
        break;

    
}

 

//OBTENER


//OBTENER TODOS LOS USUARIOS


//ACTUALIZAR TODOS LOS USUARIOS


//ELIMINAR LOS USUARIOS 
