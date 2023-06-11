<?php 


class user extends jwt{


    private int $id;
    //size: 11
    private string $user_name;
    //size: 254
    private string $password;
    //size: 254
    private string $user_type;
    //size: 254


    function getToken(){
        return $this->generateJwt($this->id, $this->user_name, $this->user_type);
    }

    function validateToken($token){
        $decoded_token = $this->decodeJwt($token);
        if($decoded_token == "Invalid_token"){

        }else{
        
            $this->setId($decoded_token->data->id);
            $this->setUser_name($decoded_token->data->user_name);
            $this->setUser_type($decoded_token->data->user_type);
        }

    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id; 
    }

    public function getUser_name(){
        return $this->user_name;
    }

    public function setUser_name($user_name){
        $this->user_name = $user_name; 
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password; 
    }

    public function getUser_type(){
        return $this->user_type;
    }

    public function setUser_type($user_type){
        $this->user_type = $user_type; 
    }

    


}