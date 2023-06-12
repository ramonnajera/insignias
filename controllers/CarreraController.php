<?php
include_once 'models/CarreraModel.php';

class CarreraController{
    public function add(){
        $_respuestas = new responses();

        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] :false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] :false;
            $img = empty($_FILES['img']['name']) == 0 ? $_FILES['img'] :false;
            $insignia = empty($_FILES['insignia']['name']) == 0 ? $_FILES['insignia'] :false;

            $nombre = Utils::limpiarData($nombre,"texto");
            $descripcion = Utils::limpiarData($descripcion,"texto");

            $nombre = filter_var($nombre, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>"/^[\wáéíóúÑñ\s]+$/")));
            $descripcion = filter_var($descripcion, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>"/^[\wáéíóúÑñ\s]+$/")));

            if ($nombre && $descripcion) {
                $_CarreraModel = new CarreraModel();
                $subido = $this->subirImagen($img);
                $subido2 = $this->subirImagen($insignia);

                if($subido["subido"] && $subido2["subido"]){
                    $_CarreraModel->setCarrera($img["nombre"]);
                    $_CarreraModel->setCarrera($insignia["nombre"]);
                }
            }else{
                $_respuestas->error_u00001();
            }

            var_dump($img);
            die();
        }else{
            $_respuestas->error_u00001();
        }

        $_SESSION['respuesta'] = [
            "status" => $_respuestas->response["status"],
            "mensaje" => $_respuestas->response["result"]["mensaje"]
        ];
        header("Location:".base_url."Page/carreras");
    }

    public function subirImagen($archivo){
        Utils::isAdmin();
        $dir ="assets/img/images/";
        $arregloArchivo = explode(".", $archivo['name']);
        $extension = strtolower(end($arregloArchivo));
        $nombre = uniqid() . "." . $extension;
        $permitidos = array('png', 'svg');
        $ruta_carga = $dir . $nombre;

        if(in_array($extension, $permitidos)){
            if(!file_exists($dir)){
                mkdir($dir, 0777);
            }
            
            $subido = move_uploaded_file($archivo['tmp_name'], $ruta_carga);

        }else{
            $subido = false;
        }

        $resultado = array(
            "subido" => $subido,
            "nombre" => $nombre
        );

        return $resultado;
    }
}