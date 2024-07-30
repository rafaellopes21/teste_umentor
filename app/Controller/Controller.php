<?php

namespace App\Controller;

class Controller{

    public static function render($view, $viewData = []){
        \Flight::set('flight.views.path', __DIR__.'/../../resources/views');
        return \Flight::render($view, $viewData);
    }

    public function getData(){
        $data = \Flight::request()->data->getData();
        if(!$data || empty($data)){ $data = []; }

        if(isset($_GET)){
            foreach ($_GET as $key => $val){
                if(!isset($data[$key])){
                    $data[$key] = $val;
                }
            }
        }

        return $data;
    }

    public function toJson(Array $arrayData, $message = false, $error = false){
        return \Flight::json([
            'error' => $error,
            'status' => $error ? 400 : 200,
            'response' => $arrayData,
            'message' => $message,
        ]);
    }
}