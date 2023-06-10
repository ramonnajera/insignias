<?php

class Utils{
        public static function deleteSession($name){
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public function limpiarData($data, $saneamiento){

        if($saneamiento == 'int'){
            $data = filter_var($data,FILTER_SANITIZE_NUMBER_INT);
        }

        if($saneamiento == 'float'){
            $data = filter_var($data,FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        }

        if($saneamiento == 'email'){
            $data = trim($data);
            $data = filter_var($data,FILTER_SANITIZE_EMAIL);
        }

        if($saneamiento == 'texto'){
            $data = filter_var($data,FILTER_SANITIZE_STRING);
            $data = preg_replace('([^A-Za-z. ])', '', $data);
            $data = filter_var($data, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>"/^[\wáéíóúÑñ.\s]+$/")));
        }

        if($saneamiento == 'pass'){
            $data = filter_var($data,FILTER_SANITIZE_STRING);
            $data = preg_replace('([^A-Za-z.0-9])', '', $data);
            $data = filter_var($data, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>"/^[\wáéíóúÑñ!.\s]+$/")));
        }

        if($saneamiento == 'identificador'){
            $data = filter_var($data,FILTER_SANITIZE_STRING);
            $data = preg_replace('([^A-Za-z0-9])', '', $data);
            $data = filter_var($data, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>"/^[\wáéíóúÑñ.\s]+$/")));
        }

        if($saneamiento == 'boolean'){
            $data = filter_var($data,FILTER_VALIDATE_BOOLEAN);
            $data = preg_replace('([^A-Za-z0-9])', '', $data);
            $data = filter_var($data, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>"/^[\wáéíóúÑñ.\s]+$/")));
        }

        $data = trim($data);
        $data = str_replace("\\", "", $data);
        $data = str_replace("/", "", $data);
        $data = str_replace("--", "", $data);
        $data = str_replace("=", "", $data);
        $data = htmlspecialchars($data);
        
        return $data;
    }

    public function validarData($data, $type){
        if($type == 'phone'){
            $data = strlen((string)$data) == 10 ? $data :false;
        }

        if($type == 'phonep'){
            if(strlen((string)$data) == 10){
                $data = $data;
            }elseif(strlen((string)$data) == 0){
                $data = " ";
            }else{
                $data = false;
            }
        }

        if($type == 'emailp'){
            if(strlen($data) <= 50 && strlen($data) >=1){
                $data = filter_var($data, FILTER_VALIDATE_EMAIL);
            }elseif(strlen($data) == 0){
                $data = " ";
            }else{
                $data = false;
            }
        }

        if ($type == 'check') {
            if($data == 'on' || $data == 'off'){
                $data = $data;
            }else{
                $data = false;
            }
        }

        if ($type == 'bolean') {
            if($data){
                $data = $data;
            }else{
                $data = false;
            }
        }

        if($type == 'ext'){
            $data = strlen((string)$data) == 4 ? $data :false;
        }

        if($type == 'texto'){
            $data = strlen($data) <= 200 ? $data :false;
        }

        if($type == 'int'){
            if(ctype_digit($data)){
                $data = $data;
            }else{
                $data = false;
            }
        }

        return $data;

    }

    public static function isLog(){
        if (!isset($_SESSION['identidad']) || !isset($_SESSION['user'])) {
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function isAdmin(){
        if (!isset($_SESSION['admin'])) {
            header("Location:".base_url);
        }else{
            return true;
        }
    }

}