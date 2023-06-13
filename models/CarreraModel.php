<?php
include_once "config/conection/conection.php";

class CarreraModel extends conection{
    private $carrera_id;
    private $carrera_nombre;
    private $carrera_descripcion;
    private $carrera_img;
    private $carrera_insignia;

    public function __construct(){
        $this->conection = parent::__construct();
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
     * Get the value of carrera_nombre
     */ 
    public function getCarrera_nombre()
    {
        return $this->carrera_nombre;
    }

    /**
     * Set the value of carrera_nombre
     *
     * @return  self
     */ 
    public function setCarrera_nombre($carrera_nombre)
    {
        $this->carrera_nombre = $carrera_nombre;

        return $this;
    }

    /**
     * Get the value of carrera_descripcion
     */ 
    public function getCarrera_descripcion()
    {
        return $this->carrera_descripcion;
    }

    /**
     * Set the value of carrera_descripcion
     *
     * @return  self
     */ 
    public function setCarrera_descripcion($carrera_descripcion)
    {
        $this->carrera_descripcion = $carrera_descripcion;

        return $this;
    }

    /**
     * Get the value of carrera_img
     */ 
    public function getCarrera_img()
    {
        return $this->carrera_img;
    }

    /**
     * Set the value of carrera_img
     *
     * @return  self
     */ 
    public function setCarrera_img($carrera_img)
    {
        $this->carrera_img = $carrera_img;

        return $this;
    }

    /**
     * Get the value of carrera_insignia
     */ 
    public function getCarrera_insignia()
    {
        return $this->carrera_insignia;
    }

    /**
     * Set the value of carrera_insignia
     *
     * @return  self
     */ 
    public function setCarrera_insignia($carrera_insignia)
    {
        $this->carrera_insignia = $carrera_insignia;

        return $this;
    }

    public function getAll(){
        $sql = "SELECT * FROM carreras";

        $carreras = parent::obtenerDatos($sql);
        
        return $carreras;
    }

    public function save(){

        $sql = "INSERT INTO carreras (carrera_nombre, carrera_descripcion, carrera_img, carrera_insignia) VALUES(:carrera_nombre,:carrera_descripcion, :carrera_img, :carrera_insignia);";

        $data = [
            "carrera_nombre" => $this->getCarrera_nombre(),
            "carrera_descripcion" => $this->getCarrera_descripcion(),
            "carrera_img" => $this->getCarrera_img(),
            "carrera_insignia" => $this->getCarrera_insignia(),
        ];

        $save = parent::nonQuery($sql, $data);

        $result = false;
        
        if($save){
            $result = true;
        }
        
        return $result;
    }
}