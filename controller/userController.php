<?php
require_once "./model/user.php";
class userController extends ORM{

    private $request;
    private $response;

    function __construct($req,$res){

        $this->request = $req;
        $this->response = $res;
    }


    public function login(){
        $body = json_decode($this->request["body"]);
        $body = (array)$body;
        $user_data = $this->getTableWhen(" user_name = '".$body["user_name"]."' and password = '".$body["password"]."' " ,"user");
        $user_data = json_decode($user_data,true);
        if(count($user_data) > 0){
            $user = new user();
            $user->setId($user_data[0]["id"]);
            $user->setUser_name($user_data[0]["user_name"]);
            $user->setUser_type($user_data[0]["user_type"]);
            $body = ["success"=> true , "message"=> "Login Successful", "token" => $user->getToken()];
            $this->response->send(200,json_encode($body));
        }else {
            $this->response->send(400,'{"success": false, "message": "Invalid Username or Password"}');
        }
    }
}