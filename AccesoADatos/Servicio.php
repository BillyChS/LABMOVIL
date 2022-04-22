<?php


class Servicio
{
    private $server;
    private $user;
    private $password;
    private $database;
    private $port;
    var $conexion;


    function __construct()
    {
    }
    public function conectar()
    {
        $listadatos = $this->datosConexion();
        foreach ($listadatos as $key => $value) {
            $this->server = $value['server'];
            $this->user = $value['user'];
            $this->password = $value['password'];
            $this->database = $value['database'];
            $this->port = $value['port'];
        }

        $this->conexion = mysqli_connect($this->server, $this->user, $this->password, $this->database);
        if ($this->conexion->connect_errno) {
            echo "algo va mal con la conexion";
            die();
        }
    }

    private function datosConexion()
    {
        $direccion = dirname(__FILE__);
        $jsondata = file_get_contents($direccion . "/" . "config");
        return json_decode($jsondata, true);
    }


    public function desconectar()
    {
        mysqli_close($this->conexion);
    }

    private function convertirUTF8($array)
    {

        array_walk_recursive($array, function (&$item, $key) {
            if (!mb_detect_encoding($item, 'utf-8', true)) {
                $item = utf8_encode($item);
            }
        });

        return $array;
    }
}
