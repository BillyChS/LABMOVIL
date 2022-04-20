<?php

require_once "../AccesoADatos/ServicioCarrera.php";
require_once "../Entidades/Carrera.php";

$carrera = new Carrera("iNGEssSdg", "ASDAS", "SADASD");
$servicioCarrera = new ServicioCarrera();

$servicioCarrera->insertar_carrera($carrera);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
</body>

</html>