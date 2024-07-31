<?php

namespace App\Controller;

use App\Models\Usuarios;

class UsersController extends Controller {

    public function list(){
        $data = $this->getData();
        $query = "";

        //Separa os resultados para filtro
        if(!empty($data)){
            foreach ($data as $key => $value) {
                if(!empty($value)){
                    if($key == "email"){
                        $query .= "$key LIKE '%$value%' AND ";
                    }
                    if($key == "situacao" && $value != "*"){
                        $query .= "$key = '$value' AND ";
                    }
                    if($key == "data_admissao"){
                        $query .= "$key = '$value' AND ";
                    }
                }
            }
        }

        $users = empty($query) ? Usuarios::all() : Usuarios::whereRaw(substr_replace($query, '', -5))->get();
        $users = empty($users) ? [] : $users->toArray();

        //Cria uma lista com os campos que desejamos tratar formatação de data
        $dateFormaterFields = ['data_admissao', 'created_at', 'updated_at'];

        //Percorre lista de usuários e formata campos necessários
        foreach ($users as &$user){
            foreach ($user as $key => &$value) {
                if(in_array($key, $dateFormaterFields)){
                    if($key == "data_admissao"){
                        $user[$key."_original"] = $value;
                    }
                    $user[$key] = str_contains($value, ':')
                        ? date("d/m/y \\à\\s H:i", strtotime($value))
                        : date("d/m/y", strtotime($value));
                }
            }
        }

        return $this->toJson($users);
    }

    public function insertUpdate(){
        try {
            $data = $this->getData();

            //Checa se já existe um usuário com o mesmo e-mail
            $userExists = Usuarios::where('email', $data['email'])->first();

            //Verifica se será um novo registro ou atualização de dados
            if(isset($data['id']) && $data['id']){
                if($userExists && $userExists['id'] != $data['id']){
                    return $this->toJson($this->getData(), 'O email informado já está cadastrado.', true);
                }
                Usuarios::where('id', $data['id'])->first()->update($data);
            } else {
                if($userExists){
                    return $this->toJson($this->getData(), 'O email informado já está cadastrado.', true);
                }
                unset($data['id']);
                Usuarios::create($data);
            }

            return $this->toJson($this->getData(), 'Registro gravado com sucesso.');
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