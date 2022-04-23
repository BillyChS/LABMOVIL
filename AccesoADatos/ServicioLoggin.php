<?php
include 'Servicio.php';
include 'Exceptions/GlobalException.php';
include 'Exceptions/NoDataException.php';



ob_start();
$usuario=$_POST['usuario'];
$password=md5($_POST['password']);
$query="SLECT * FROM usuarios WHERE CEDULA='$usuario' AND CLAVE='$password'";

$consulta=$mysqly->query($query);


if($consulta->num_rows>=1){

    $fila=$consulta2->fetch_array(MYSQLI_ASSOC);

    session_start();
    
    $_SESSION['user']=$fila['Nombre'];
    $_SESSION['Identi']=$fila['Cedula'];
    $_SESSION['rol']=$file['ROL'];
    $_SESSION['verificar']=true;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
    $state=null;

    
    $_SESSION['Rol']=$fila['$state'];

    header("Location: comprar.php");//cambiar ruta
    
}
else{

    echo "Los datos son incorrectos";
    header("Location: Login.php");//cambiar ruta
}

