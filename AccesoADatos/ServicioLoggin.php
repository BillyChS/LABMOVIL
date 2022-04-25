<?php
include 'Servicio.php';
include 'Exceptions/GlobalException.php';
include 'Exceptions/NoDataException.php';


class ServicioLoggin extends Servicio{




    public function Ingresar()
    {
        
        try {
            $this->conectar();
        } catch (Exception $e) {
            echo "Exception:" . $e->getMessage();
        }
        
        $stmt = null;
        try{
            $con = $this->conexion;
            ob_start();
            $usuario=$_POST['cedula'];
            $password=md5($_POST['clave']);
            $query="SELECT * FROM USUARIOS WHERE CEDULA='$usuario' AND CLAVE='$password'";
           $stmt=$con->query($query);
           // $consulta=$mysqly->query($query);
            
            
            if($stmt->num_rows>=1){
            
                $fila=$consulta2->fetch_array(MYSQLI_ASSOC);
            
                session_start();
                
                //$_SESSION['user']=$fila['Nombre'];
                $_SESSION['Identi']=$fila['Cedula'];
                $_SESSION['rol']=$fila['ROL'];
                $_SESSION['verificar']=true;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
                $state=null;
            
                
                $_SESSION['Rol']=$fila['$state'];
            
                header("Location: vistas/Users/index.php");//cambiar ruta
                
            }
            else{
            
                echo "Los datos son incorrectos";
                header("Location: Login.php");//cambiar ruta
            }
        
        
        
        
            
        }    
        
        catch (Exception $EX) {
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






// if (isset($_POST['login'])) {
 
//     $username = $_POST['username'];
//     $password = $_POST['password'];
 
//     $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
//     $query->bindParam("username", $username, PDO::PARAM_STR);
//     $query->execute();
 
//     $result = $query->fetch(PDO::FETCH_ASSOC);
 
//     if (!$result) {
//         echo '<p class="error">Username password combination is wrong!</p>';
//     } else {
//         if (password_verify($password, $result['PASSWORD'])) {
//             $_SESSION['user_id'] = $result['ID'];
//             echo '<p class="success">Congratulations, you are logged in!</p>';
//         } else {
//             echo '<p class="error">Username password combination is wrong!</p>';
//         }
//     }
// }
 