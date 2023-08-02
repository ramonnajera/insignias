<?php
include_once 'models/CarreraModel.php';
include_once 'models/CursoModel.php';
include_once 'models/ParticipanteModel.php';

class PageController{
    public function index(){
        $_CarreraModel = new CarreraModel();
        $carreras = $_CarreraModel->getAll();
        if(isset($_SESSION['identidad']) && isset($_SESSION['admin'])){
            $_CursoModel = new CursoModel();
            $cursos = $_CursoModel->getAll();
            $_CursoModel->setUsuario_id($_SESSION["identidad"][0]["usuario_id"]);
            $miscursos = $_CursoModel->getMisAll();
        }elseif(isset($_SESSION['identidad']) && isset($_SESSION['user'])){
            $_ParticipanteModel = new ParticipanteModel();
            $_ParticipanteModel->setUsuario_id($_SESSION["identidad"][0]["usuario_id"]);
            $cursosParticipando = $_ParticipanteModel->allUserCourses();
            $insignias = $_ParticipanteModel->getAllTerminado();
        }
        require_once 'views/page/home_v.php';
    }

    public function registro(){
        require_once 'views/page/registro_v.php';
    }

    public function carreras(){
        utils::isAdmin();
        $_CarreraModel = new CarreraModel();
        $carreras = $_CarreraModel->getAll();
        require_once 'views/page/carreras_v.php';
    }   
}