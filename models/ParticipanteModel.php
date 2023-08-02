<?php
include_once "config/conection/conection.php";

class ParticipanteModel extends conection{
    private $participante_id;
    private $usuario_id;
    private $curso_id;
    private $participante_terminado;

    public function __construct(){
        $this->conection = parent::__construct();
    }
    

    /**
     * Get the value of participante_id
     */ 
    public function getParticipante_id()
    {
        return $this->participante_id;
    }

    /**
     * Set the value of participante_id
     *
     * @return  self
     */ 
    public function setParticipante_id($participante_id)
    {
        $this->participante_id = $participante_id;

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
     * Get the value of participante_terminado
     */ 
    public function getParticipante_terminado()
    {
        return $this->participante_terminado;
    }

    /**
     * Set the value of participante_terminado
     *
     * @return  self
     */ 
    public function setParticipante_terminado($participante_terminado)
    {
        $this->participante_terminado = $participante_terminado;

        return $this;
    }

    public function getAllOne(){
        $sql = "SELECT * FROM usuarios INNER JOIN participantes ON usuarios.usuario_id = participantes.usuario_id WHERE curso_id=:curso_id";

        $data = [
            "curso_id" => $this->getCurso_id(),
        ];

        $participantes = parent::obtenerDatos($sql, $data);
        
        return $participantes;
    }

    public function allUserCourses(){
        $sql = "SELECT * FROM usuarios INNER JOIN participantes ON usuarios.usuario_id = participantes.usuario_id
                INNER JOIN cursos ON cursos.curso_id = participantes.curso_id WHERE usuario_id=:usuario_id";

        $data = [
            "usuario_id" => $this->getUsuario_id(),
        ];

        $participantes = parent::obtenerDatos($sql, $data);
        
        return $participantes;
    }

    public function save(){

        $sql = "INSERT INTO participantes (usuario_id, curso_id) VALUES(:usuario_id, :curso_id);";

        $data = [
            "usuario_id" => $this->getUsuario_id(),
            "curso_id" => $this->getCurso_id(),
        ];

        $save = parent::nonQuery($sql, $data);

        $result = false;
        
        if($save){
            $result = true;
        }
        
        return $result;
    }

    public function update(){
        $result = false;
        $status= $this->getParticipante_terminado();

        if($status == "1"){
            $status = 0;
        }else{
            $status = 1;
        }

        $sql = "UPDATE participantes SET participante_terminado = '$status' WHERE participantes.participante_id = :participante_id;";
        
        $data = [
            "participante_id" => $this->getParticipante_id()
        ];

        $update = parent::nonQuery($sql, $data);

        if($update){
            $result =  true;
        }

        return $result;
    }

    public function getAllTerminado(){
        $sql = "SELECT * FROM cursos INNER JOIN participantes ON cursos.curso_id = participantes.curso_id
                WHERE participantes.usuario_id = :usuario_id";

        $data = [
            "usuario_id" => $this->getUsuario_id(),
        ];

        $participantes = parent::obtenerDatos($sql, $data);
        
        return $participantes;
    }
}