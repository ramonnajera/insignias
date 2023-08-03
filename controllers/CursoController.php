<?php
include_once 'models/CursoModel.php';

class CursoController{
    public function add(){
        $_respuestas = new responses();

        if (isset($_POST)) {
            $carrera = isset($_POST['carrera']) ? $_POST['carrera'] :false;
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] :false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] :false;
            $img = empty($_FILES['img']['name']) == 0 ? $_FILES['img'] :false;
            $insignia = empty($_FILES['insignia']['name']) == 0 ? $_FILES['insignia'] :false;

            $nombre = Utils::limpiarData($nombre,"texto");
            $descripcion = Utils::limpiarData($descripcion,"texto");

            $nombre = filter_var($nombre, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>"/^[\wáéíóúÑñ\s]+$/")));
            $descripcion = filter_var($descripcion, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>"/^[\wáéíóúÑñ\s]+$/")));

            if ($carrera && $nombre && $descripcion) {
                $_CursoModel = new CursoModel();
                $subido = $this->subirImagen($img);
                $subido2 = $this->subirImagen($insignia);
                
                if($subido["subido"] && $subido2["subido"]){
                    $_CursoModel->setUsuario_id($_SESSION["identidad"][0]["usuario_id"]);
                    $_CursoModel->setCarrera_id($carrera);
                    $_CursoModel->setCurso_nombre($nombre);
                    $_CursoModel->setCurso_descripcion($descripcion);
                    $_CursoModel->setCurso_img($subido["nombre"]);
                    $_CursoModel->setCurso_insignia($subido2["nombre"]);
                    
                    $save = $_CursoModel->save();

                    if ($save) {
                        $_respuestas->response["result"]["mensaje"] = "Registro correcto";
                    }else{
                        unlink("assets/img/images/" . $subido["nombre"]);
                        unlink("assets/img/images/" . $subido2["nombre"]);
                        $_respuestas->error_u00001();
                    }
                }else{
                    $_respuestas->error_u00001();
                }
            }else{
                $_respuestas->error_u00001();
            }

        }else{
            $_respuestas->error_u00001();
        }

        $_SESSION['respuesta'] = [
            "status" => $_respuestas->response["status"],
            "mensaje" => $_respuestas->response["result"]["mensaje"]
        ];
        header("Location:".base_url);
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

    public function all(){
        $carrera = isset($_GET['id']) ? $_GET['id'] :false;
        if($carrera){
            $_CursoModel = new CursoModel();
            $_CursoModel->setCarrera_id($carrera);
            $cursos = $_CursoModel->getOne();
        }
        require_once 'views/page/cursos_v.php';
    }

    public function alls(){
        $_CursoModel = new CursoModel();
        $_CursoModel->setUsuario_id($_SESSION["identidad"][0]["usuario_id"]);
        $cursos = $_CursoModel->getAlls();
        require_once 'views/page/cursos_v.php';
    }
}