<?php

namespace App\Controller;

class IndexController extends Controller {

    public function index(){
        return $this->render('index');
    }
}