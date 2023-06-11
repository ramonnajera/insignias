<?php
include_once "config/conection/conection.php";

class UserModel extends conection{

    public $usuarios;
    public $usuario_id;
    public $usuario_nombre;
    public $usuario_pass;
    public $usuario_correo;
    public $usuario_activo;
    public $usuario_area;
    public $usuario_tipo;

    public function __construct(){
        $this->conection = parent::__construct();
    }

    /**
     * Get the value of usuarios
     */ 
    public function getUsuarios()
    {
        return $this->usuarios;
    }

    /**
     * Set the value of usuarios
     *
     * @return  self
     */ 
    public function setUsuarios($usuarios)
    {
        $this->usuarios = $usuarios;

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
     * Get the value of usuario_nombre
     */ 
    public function getUsuario_nombre()
    {
        return $this->usuario_nombre;
    }

    /**
     * Set the value of usuario_nombre
     *
     * @return  self
     */ 
    public function setUsuario_nombre($usuario_nombre)
    {
        $this->usuario_nombre = $usuario_nombre;

        return $this;
    }

    /**
     * Get the value of usuario_pass
     */ 
    public function getUsuario_pass()
    {
        return password_hash($this->usuario_pass,PASSWORD_BCRYPT, ['cost'=>4]);
    }

    /**
     * Set the value of usuario_pass
     *
     * @return  self
     */ 
    public function setUsuario_pass($usuario_pass)
    {
        $this->usuario_pass = $usuario_pass;

        return $this;
    }

    /**
     * Get the value of usuario_correo
     */ 
    public function getUsuario_correo()
    {
        return $this->usuario_correo;
    }

    /**
     * Set the value of usuario_correo
     *
     * @return  self
     */ 
    public function setUsuario_correo($usuario_correo)
    {
        $this->usuario_correo = $usuario_correo;

        return $this;
    }

    /**
     * Get the value of usuario_activo
     */ 
    public function getUsuario_activo()
    {
        return $this->usuario_activo;
    }

    /**
     * Set the value of usuario_activo
     *
     * @return  self
     */ 
    public function setUsuario_activo($usuario_activo)
    {
        $this->usuario_activo = $usuario_activo;

        return $this;
    }

    /**
     * Get the value of usuario_area
     */ 
    public function getUsuario_area()
    {
        return $this->usuario_area;
    }

    /**
     * Set the value of usuario_area
     *
     * @return  self
     */ 
    public function setUsuario_area($usuario_area)
    {
        $this->usuario_area = $usuario_area;

        return $this;
    }

    /**
     * Get the value of usuario_tipo
     */ 
    public function getUsuario_tipo()
    {
        return $this->usuario_tipo;
    }

    /**
     * Set the value of usuario_tipo
     *
     * @return  self
     */ 
    public function setUsuario_tipo($usuario_tipo)
    {
        $this->usuario_tipo = $usuario_tipo;

        return $this;
    }

    public function login(){
        $result=false;

        $user_pass = $this->usuario_pass;

        $sql = "SELECT *
                FROM usuarios 
                WHERE usuario_correo = :usuario_correo
                AND usuario_activo = 't';";

        $data =[
            'usuario_correo' => $this->getUsuario_correo()
        ];

        $login = parent::obtenerDatos($sql, $data);

        if ($login && count($login) == 1 && $login[0]["usuario_activo"]) {
            $verify = password_verify($user_pass, $login[0]["usuario_pass"]);

            if ($verify) {
                $result = $login;
                unset($result[0]['usuario_pass']);
            }
        }else{
            $result = false;
        }

        return $result;
    }

    public function save(){

        $sql = "INSERT INTO usuarios (usuario_nombre, usuario_pass, usuario_correo, usuario_area) VALUES(:usuario_nombre,:usuario_pass, :usuario_correo, :usuario_area);";

        $data = [
            "usuario_nombre" => $this->getUsuario_nombre(),
            "usuario_pass" => $this->getUsuario_pass(),
            "usuario_correo" => $this->getUsuario_correo(),
            "usuario_area" => $this->getUsuario_area(),
        ];

        $save = parent::nonQuery($sql, $data);

        $result = false;
        
        if($save){
            $result = true;
        }
        
        return $result;
    }
}
