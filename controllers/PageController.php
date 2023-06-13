<?php
include_once 'models/CarreraModel.php';

class PageController{
    public function index(){
        $_CarreraModel = new CarreraModel();
        $carreras = $_CarreraModel->getAll();
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