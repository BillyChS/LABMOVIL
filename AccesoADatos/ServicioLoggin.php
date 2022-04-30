<?php
include 'Servicio.php';
require __DIR__ . '/../vendor/autoload.php';
use Firebase\JWT\JWT;
include 'Exceptions/GlobalException.php';
include 'Exceptions/NoDataException.php';


class ServicioLoggin extends Servicio
{
    private $cedula;
    private $contrasena;
    //private $con;
    public $identificacion;
    public $rol;
    public $nombre;



        public function _login($cedula, $contrasena){
          $this->cedula = $cedula;
          $this->contrasena = $contrasena;
          $this->conectar();
         // $con=$this->conexion;
        }
        
    //VERIFICA SI EL USUARIO EXISTE EN LA BASE DE DATOS
        public function _existe_usuario(){
            $sql = "SELECT * FROM USUARIOS WHERE CEDULA='$this->cedula' AND CLAVE='$this->contrasena'";
            $con=$this->conexion;
            $ejecutar = $con->query($sql);
            if( !empty($ejecutar) && $ejecutar->num_rows > 0 ){
               //echo();
              
               return $this->_datos_usuario() ;           
             }
            else{
                return false;
            }
            
        }
    
    // //RETORNA EL ROL DEL USUARIO SI ESTE EXISTE Y LOS DATOS DE INGRESO SON CORRECTOS
    //     public function _valida_inicio(){
    //         if($this->_existe_usuario()){
    //         $sql = "SELECT * FROM USUARIOS WHERE CEDULA='$this->cedula' AND CLAVE='$this->contrasena'";
    //         $ejecutar = $this->conectarse()->query($sql);
    //         if ($ejecutar->rowCount() > 0) {
    //           while($row = $ejecutar->fetch()) {
    //             if($this->_valida_rol_usuario()){ return true;}
    //                else if($this->_valida_rol_admin()){return true;}
    //                     else{return false;}
    //             }
    //           } 
    //           else {return false;}
    //         }
    //         return false;
    //     }
    
        public function _datos_usuario(){
          $datos = array();
          //$this->conectar();
          $con=$this->conexion;
          $query = $con->query("SELECT CEDULA, ROL from USUARIOS where CEDULA = '$this->cedula' AND CLAVE = '$this->contrasena'");
          //$query->execute();
          //echo($query);
          if (!empty($query) && $query->num_rows > 0 )
      {
          
        while($resultado = $query->fetch_assoc())
        {
            
                   $datos[] = $resultado;
              }
              $this->cedula = $datos[0]['CEDULA'];
              
              $this->rol = $datos[0]['ROL'];
              return $datos;
          }
      }
    
    }
    
       
    // //VERIFICA SI EL USUARIO TIENE ROL DE USER
    //     public function _valida_rol_matriculador(){
    //       if($this->_existe_usuario()){
    //         $sql = "SELECT cedula from usuarios where rol = '2' AND cedula = '$this->cedula'";
    //         $ejecutar = $this->conectar()->query($sql);
    //         return $respuesta = $ejecutar->rowCount() > 0 ? 2 : 0;
    //         }
    //         return false;
    //     }
    
    // //VERIFICA SI EL USUARIO TIENE ROL DE ADMINISTRADOR
    //     public function _valida_rol_admin(){
    //       if($this->_existe_usuario()){
    //         $sql = "SELECT cedula from usuarios where rol = '1' AND cedula = '$this->cedula'";
    //         $ejecutar = $this->conectar()->query($sql);
    //         return $respuesta = $ejecutar->rowCount() > 0 ? 1 : 0;
    //         }
    //         return false;
    //     }
    
    //     //VERIFICA SI EL USUARIO TIENE ROL DE PROFESOR
    //     public function _valida_rol_profesor(){
    //         if($this->_existe_usuario()){
    //           $sql = "SELECT cedula from usuarios where rol = '3' AND cedula = '$this->cedula'";
    //           $ejecutar = $this->conectar()->query($sql);
    //           return $respuesta = $ejecutar->rowCount() > 0 ? 3 : 0;
    //           }
    //           return false;
    //       }
    
    //       //VERIFICA SI EL USUARIO TIENE ROL DE ALUMNO
    //     public function _valida_rol_alumno(){
    //         if($this->_existe_usuario()){
    //           $sql = "SELECT cedula from usuarios where rol = '4' AND cedula = '$this->cedula'";
    //           $ejecutar = $this->conectar()->query($sql);
    //           return $respuesta = $ejecutar->rowCount() > 0 ? 4 : 0;
    //           }
    //           return false;
    //       }
      
    
        // public function _data(){
        //   $iat = time();
        //   $exp = $iat + 86400;
        //   $key = "private_key";
        //   $payload = array( //datos
        //       "cedula" => $this->cedula,
        //       "rol" => $this->rol
        //   );
        //   $jwt = JWT::encode($payload, $key, 'HS256');
        //   return array(
        //   'token'=> $jwt,
        //   'expires'=>$exp
        //   );
        // }
    
    
    

