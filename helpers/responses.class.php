<?php

class responses{
    public $response= [
        "status" => "ok",
        "result" => array(
            "codigo" => "u00000",
            "mensaje" => "Tu proceso fue completado"
        )
    ];

    public function error_u00001(){
        $this->response["status"] = "error";
        $this->response["result"] =array(
            "codigo" => "u00001",
            "mensaje" => "Dato faltante en formulario"
        );
        return $this->response;
    }

    public function error_u00002(){
        $this->response["status"] = "error";
        $this->response["result"] =array(
            "codigo" => "u00002",
            "mensaje" => "Tu proceso no logro ser completado"
        );
        return $this->response;
    }
}