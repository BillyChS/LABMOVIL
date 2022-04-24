<?php

//include_once("Entidades/Carrera.php");
include_once("../AccesoADAtos/ServicioCurso.php");

class ModeloCurso
{

    private $curso;
    private $servicioCurso;
    private $table = "CARRERA";

    public  function __construct()
    {
        $this->curso = new Curso("", "", "", "", "", "");
        $this->servicioCurso = new ServicioCurso();
    }

    public function getCurso()
    {
        return $this->carrera;
    }

    public function setCurso($curso)
    {
        $this->curso = $curso;
    }

    public function listar()
    {
        return $this->servicioCurso->listar_cursos();
    }

    public function insertar($curso)
    {
        $this->servicioCurso->insertar_curso($curso);
    }

    public function modificar($carrera)
    {
        $this->servicioCurso->modificar_curso($carrera);
    }
    public function eliminar($id)
    {
        return $this->servicioCurso->eliminar_curso($id);
    }

    //Buscar por codigo
    public function buscarPorCodigoCurso($codigo_curso)
    {
        return $this->servicioCurso->buscar_curso_codigo($codigo_curso);
    }

    //Busca por nombre
    public function buscarPorNombre($nombre)
    {
        return $this->servicioCurso->buscar_curso_nombre($nombre);
    }

    //Buscar por carrera
    public function buscarPorNombreCarrera($nombreCarrera)
    {
        return $this->servicioCurso->buscar_curso_nombreCarrea($nombreCarrera);
    }
}
