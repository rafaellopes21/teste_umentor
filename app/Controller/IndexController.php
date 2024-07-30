<?php

namespace App\Controller;

use App\helpers\DB;
use App\Models\Usuarios;

class IndexController extends Controller {

    public function index(){
        return $this->render('index', [
            'title' => 'Hello World'
        ]);
    }
}