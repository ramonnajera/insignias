<?php
include_once "config/conection/conection.php";

class CursoModel extends conection{
    private $curso_id;
    private $usuario_id;
    private $carrera_id;
    private $curso_nombre;
    private $curso_descripcion;
    private $curso_img;
    private $curso_insignia;
    private $curso_datec;

    public function __construct(){
        $this->conection = parent::__construct();
    }

    /**
     * Get the value of curso_id
     */ 
    public function getCurso_id()
    {
        return $this->curso_id;
    }

    /**
     * Set the value of curso_id
     *
     * @return  self
     */ 
    public function setCurso_id($curso_id)
    {
        $this->curso_id = $curso_id;

        return $this;
    }

    /**
     * Get the value of usuario_id
     */ 
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     *
     * @return  self
     */ 
    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Get the value of carrera_id
     */ 
    public function getCarrera_id()
    {
        return $this->carrera_id;
    }

    /**
     * Set the value of carrera_id
     *
     * @return  self
     */ 
    public function setCarrera_id($carrera_id)
    {
        $this->carrera_id = $carrera_id;

        return $this;
    }

    /**
     * Get the value of curso_nombre
     */ 
    public function getCurso_nombre()
    {
        return $this->curso_nombre;
    }

    /**
     * Set the value of curso_nombre
     *
     * @return  self
     */ 
    public function setCurso_nombre($curso_nombre)
    {
        $this->curso_nombre = $curso_nombre;

        return $this;
    }

    /**
     * Get the value of curso_descripcion
     */ 
    public function getCurso_descripcion()
    {
        return $this->curso_descripcion;
    }

    /**
     * Set the value of curso_descripcion
     *
     * @return  self
     */ 
    public function setCurso_descripcion($curso_descripcion)
    {
        $this->curso_descripcion = $curso_descripcion;

        return $this;
    }

    /**
     * Get the value of curso_insignia
     */ 
    public function getCurso_insignia()
    {
        return $this->curso_insignia;
    }

    /**
     * Set the value of curso_insignia
     *
     * @return  self
     */ 
    public function setCurso_insignia($curso_insignia)
    {
        $this->curso_insignia = $curso_insignia;

        return $this;
    }

    /**
     * Get the value of curso_datec
     */ 
    public function getCurso_datec()
    {
        return $this->curso_datec;
    }

    /**
     * Set the value of curso_datec
     *
     * @return  self
     */ 
    public function setCurso_datec($curso_datec)
    {
        $this->curso_datec = $curso_datec;

        return $this;
    }

    /**
     * Get the value of curso_img
     */ 
    public function getCurso_img()
    {
        return $this->curso_img;
    }

    /**
     * Set the value of curso_img
     *
     * @return  self
     */ 
    public function setCurso_img($curso_img)
    {
        $this->curso_img = $curso_img;

        return $this;
    }

    public function getAll(){
        $sql = "SELECT * FROM carreras INNER JOIN cursos ON carreras.carrera_id = cursos.carrera_id";

        $cursos = parent::obtenerDatos($sql);
        
        return $cursos;
    }

    public function getAlls(){
        $sql = "SELECT cursos.curso_id, curso_nombre, curso_descripcion, carrera_nombre, participantes.usuario_id, curso_img FROM carreras 
                INNER JOIN cursos ON carreras.carrera_id = cursos.carrera_id 
                LEFT JOIN participantes ON cursos.curso_id = participantes.curso_id;";


        $cursos = parent::obtenerDatos($sql);
        
        return $cursos;
    }

    public function getOne(){
        $sql = "SELECT * FROM carreras INNER JOIN cursos ON carreras.carrera_id = cursos.carrera_id WHERE cursos.carrera_id = :carrera_id";

        $data = [
            "carrera_id" => $this->getCarrera_id(),
        ];

        $cursos = parent::obtenerDatos($sql, $data);
        
        return $cursos;
    }

    public function getMisAll(){
        $sql = "SELECT * FROM carreras INNER JOIN cursos ON carreras.carrera_id = cursos.carrera_id WHERE usuario_id=:usuario_id";

        $data = [
            "usuario_id" => $this->getUsuario_id(),
        ];

        $cursos = parent::obtenerDatos($sql, $data);
        
        return $cursos;
    }

    public function save(){

        $sql = "INSERT INTO cursos (usuario_id, carrera_id, curso_nombre, curso_descripcion, curso_insignia, curso_img) VALUES(:usuario_id, :carrera_id, :curso_nombre, :curso_descripcion, :curso_insignia, :curso_img);";

        $data = [
            "usuario_id" => $this->getUsuario_id(),
            "carrera_id" => $this->getCarrera_id(),
            "curso_nombre" => $this->getCurso_nombre(),
            "curso_descripcion" => $this->getCurso_descripcion(),
            "curso_insignia" => $this->getCurso_insignia(),
            "curso_img" => $this->getCurso_img(),
        ];

        
        $save = parent::nonQuery($sql, $data);

        $result = false;
        
        if($save){
            $result = true;
        }
        
        return $result;
    }


}