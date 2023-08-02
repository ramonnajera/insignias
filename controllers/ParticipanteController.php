<?php
include_once 'models/ParticipanteModel.php';

class ParticipanteController{
    public function all(){
        utils::isAdmin();
        if (isset($_GET)) {
            $curso = isset($_GET['id']) ? $_GET['id'] :false;   
            $_ParticipanteModel = new ParticipanteModel();
            $_ParticipanteModel->setCurso_id($curso);
            $participantes = $_ParticipanteModel->getAllOne();
        }
        require_once 'views/page/participantes_v.php';
    }

    public function add(){
        $_respuestas = new responses();
        $curso = isset($_GET['id']) ? $_GET['id'] :false;

        if ($curso && isset($_SESSION["identidad"])) {
            $_ParticipanteModel = new ParticipanteModel();

            $_ParticipanteModel->setUsuario_id($_SESSION["identidad"][0]["usuario_id"]);
            $_ParticipanteModel->setCurso_id($curso);
            
            $save = $_ParticipanteModel->save();

            if ($save) {
                $_respuestas->response["result"]["mensaje"] = "Registro correcto";
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
        header("Location:".base_url."Curso/alls");
    }

    public function update(){
        $_respuestas = new responses();

        $curso = isset($_GET['cid']) ? $_GET['cid'] :false;
        $participante = isset($_GET['id']) ? $_GET['id'] :false;
        $status = isset($_GET['status']) && !empty($_GET['status']) ? $_GET['status'] :false;
        
        if($curso && $participante){
            $_ParticipanteModel = new ParticipanteModel();
            $_ParticipanteModel->setParticipante_id((int)$participante);
            $_ParticipanteModel->setParticipante_terminado($status);

            $update = $_ParticipanteModel->update();

            if($update){
                $_respuestas->response["result"]["mensaje"] = "Insignia modificada";
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
        header("Location:".base_url."Participante/all?id=".$curso);
    }

}