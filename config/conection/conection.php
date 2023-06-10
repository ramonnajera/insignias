<?php
class conection{
    private $server;
    private $user;
    private $password;
    private $database;
    private $port;
    private $conection;

    function __construct(){
        $listadatos = $this->dataConection();
        foreach ($listadatos as $key => $value) {
            $this->server = $value['server'];
            $this->user = $value['user'];
            $this->password = $value['password'];
            $this->database = $value['database'];
            $this->port = $value['port'];
        }

        // $this->conection = pg_connect("host=$this->server dbname=$this->database user=$this->user password=$this->password");

        try {
            $this->conection = new PDO("pgsql:host=$this->server;port=$this->port;dbname=$this->database", $this->user, $this->password);

            $this->conection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $this->conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die();
            // echo "Ocurrió un error de conection: " . $e->getMessage();
        }

        return $this->conection;
    }

    private function dataConection(){
        $direccion = dirname(__FILE__);
        $jsondata = file_get_contents($direccion . "/" . "config");
        return json_decode($jsondata, true);
    }

    public function obtenerDatos($query, $datos = array()){
        try{
        $stmt = $this->conection->prepare($query);

        if(!empty($datos)){
            foreach ($datos as $key=>$dato) {
                $stmt->bindValue($key,$dato);    
            }
        }

        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        }catch(\PDOException $e){
            $resultado = false;
        }

        return $resultado;
    }

    public function nonQueryId($query, $datos){
        try{
        $stmt = $this->conection->prepare($query);

        foreach ($datos as $key=>$dato) {
            $stmt->bindValue($key,$dato);    
        }

        $stmt->execute();

        $id = (int) $this->conection->lastInsertId();

        }catch(\PDOException $e){
            $id = false;
        }

        return $id;
    }

    public function nonQuery($query, $datos){
        try{
        $stmt = $this->conection->prepare($query);

        foreach ($datos as $key=>$dato) {
            $stmt->bindValue($key,$dato);    
        }

        $stmt->execute();

        $afectadas = (int) $stmt->rowCount();

        }catch(\PDOException $e){
            $afectadas = false;
        }

        return $afectadas;
    }

}