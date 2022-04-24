<?php

//include('Curso.php');
//include('Profesor.php');
//include('Ciclo.php');
class Grupo
{

    private $no_grupo;
    private $no_ciclo;
    private $codigo_curso;
    private $profesor;
    private $horario;

    public function __construct($no_grupo, $no_ciclo, $codigo_curso, $profesor, $horario)
    {
        $this->no_grupo = $no_grupo;
        $this->no_ciclo = $no_ciclo;
        $this->codigo_curso = $codigo_curso;
        $this->profesor = $profesor;
        $this->horario = $horario;
    }


    public function getNumero_Grupo()
    {
        return $this->no_grupo;
    }

    public function setNumero_Grupo($no_grupo)
    {
        $this->codigo = $no_grupo;
    }
    public function getNo_ciclo()
    {
        return $this->no_ciclo;
    }
    public function setNo_ciclo($no_ciclo)
    {
        $this->no_ciclo = $no_ciclo;
    }
    //Se obtiene el curso
    public function getCurso()
    {
        return $this->codigo_curso;
    }
    //Se cambia el curso con el codigo de curso
    public function setCurso($codigo_curso)
    {
        $this->curso = $codigo_curso;
    }

    public function getProfesor()
    {
        return $this->profesor;
    }

    public function setProfesor($profesor)
    {
        $this->profesor = $profesor;
    }

    public function getHorario()
    {
        return $this->horario;
    }

    public function setHorario($horario)
    {
        $this->horario = $horario;
    }

    public function __toString()
    {
        //return "Grupo{" + "cod_grupo=" . $codigo + ", codigo_curso=" + curso + ", cedula_profesor=" + profesor + ", horario=" + horario + '}';
    }
}
