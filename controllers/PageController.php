<?php

class PageController{
    public function index(){
        require_once 'views/page/home_v.php';
    }

    public function registro(){
        require_once 'views/page/registro_v.php';
    }

    public function carreras(){
        utils::isAdmin();
        require_once 'views/page/carreras_v.php';
    }   
}