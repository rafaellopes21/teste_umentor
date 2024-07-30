<?php

namespace App\Controller;

use App\helpers\DB;
use App\Models\Usuarios;

class UsersController extends Controller {

    public function list(){
        $users = Usuarios::all();
        $users = empty($users) ? [] : $users->toArray();

        //Cria uma lista com os campos que desejamos tratar formatação de data
        $dateFormaterFields = ['data_admissao', 'created_at', 'updated_at'];

        //Percorre lista de usuários e formata campos necessários
        foreach ($users as &$user){
            foreach ($user as $key => &$value) {
                if(in_array($key, $dateFormaterFields)){
                    $value = str_contains($value, ':') ? date("d/m/y \\à\\s H:i") : date("d/m/y");
                }
            }
        }

        return $this->toJson($users);
    }

    public function insert(){
        try {
            $data = $this->getData();

            //Checa se já existe um usuário com o mesmo e-mail
            if(Usuarios::where('email', $data['email'])->count() > 0){
                return $this->toJson($this->getData(), 'O email informado já está cadastrado.', true);
            }

            Usuarios::create($data);

            return $this->toJson($this->getData(), 'Usuário adicionado com sucesso.');
        } catch (\Exception $exception){
            return $this->toJson($this->getData(), $exception->getMessage(), true);
        }
    }

    public function delete($id){
        try {
            Usuarios::where("id", $id)->delete();
            return $this->toJson($this->getData(), 'Usuário excluído com sucesso.');
        } catch (\Exception $exception){
            return $this->toJson($this->getData(), $exception->getMessage(), true);
        }
    }
}