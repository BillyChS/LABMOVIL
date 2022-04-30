<?php

//include_once("Entidades/Carrera.php");
include_once("../AccesoADAtos/ServicioGrupo.php");

class ModeloGrupo
{

    private $curso;
    private $servicioGrupo;
    private $table = "CARRERA";

    public  function __construct()
    {
        //$this->curso = new Grupo("", Curso $curso= new Curso("","","","","",""),Profesor $profesor = new Profesor("","","",""), "");
        $this->servicioGrupo = new ServicioGrupo();
    }

    public function getGrupo()
    {
        return $this->carrera;
    }

    public function setGrupo($curso)
    {
        $this->curso = $curso;
    }
    public function insertar_grupo($grupo)
    {
        $servicioGrupo = new ServicioGrupo();
        $servicioGrupo->insertar_grupo($grupo);
    }
    public function listar_Grupos()
    {
        $servicioGrupo = new ServicioGrupo();
        return $servicioGrupo->listar_grupo();
    }
    public function buscarGrupoPorNumero($Numero_grupo)
    {
        $servicioGrupo = new ServicioGrupo();
        return $servicioGrupo->buscar_grupo_porNumero($Numero_grupo);
    }
    public function buscarGrupoPorCodigoCurso($Codigo_Curso)
    {
        $servicioGrupo = new ServicioGrupo();
        return $servicioGrupo->buscarGrupoPorCodigoCurso($Codigo_Curso);
    }
}
