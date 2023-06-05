<?php
    include "./controller/DevController.php";
    //auto generated file 
 
    
    $app = new phexpress();
    $app->setParent("dev");
    global $user;

    $app->setValid_user("admin" == $user->user_type);

    
    $app->get("/", function ($req, $res) {
        $DevController = new DevController($req, $res);   
        $DevController->getDev();
    });
     
    
    $app->get("/jwt", function ($req, $res) {
        $jwt = new jwt();
       $token =  $jwt->generateJwt(1,"John Doe","tews@gmail.com");
        echo '{
            "token": "'.$token.'"
        }';
        $token = $jwt->decodeJwt($token);
        echo "<br>";
        echo '{
            "decoded": "'.$token.'"
        }';

    });
 
    
    
    $app->get("/getByid/:id", function ($req, $res) {
        $DevController = new DevController($req, $res);   
        $DevController->getByid();
    });

    
    
    $app->get("/getByusername/:username", function ($req, $res) {
        $DevController = new DevController($req, $res);   
        $DevController->getByusername();
    });

    
    
    $app->get("/getBypassword/:password", function ($req, $res) {
        $DevController = new DevController($req, $res);   
        $DevController->getBypassword();
    });

     
 

    
     
        $app->post("/",function ($req, $res){
            $DevController = new DevController($req, $res);   
            $DevController->setDev();
        });
     
 

    
    
    $app->patch("/updateByid/:id", function ($req, $res) {
        $DevController = new DevController($req, $res);   
        $DevController->updateByid();
    });

    
    
    $app->patch("/updateByusername/:username", function ($req, $res) {
        $DevController = new DevController($req, $res);   
        $DevController->updateByusername();
    });

    
    
    $app->patch("/updateBypassword/:password", function ($req, $res) {
        $DevController = new DevController($req, $res);   
        $DevController->updateBypassword();
    });

     
 

    
    
    $app->delete("/deleteByid/:id", function ($req, $res) {
        $DevController = new DevController($req, $res);   
        $DevController->removeByid();
    });

    
 

    
    
    $app->delete("/deleteByusername/:username", function ($req, $res) {
        $DevController = new DevController($req, $res);   
        $DevController->removeByusername();
    });

    
 

    
    
    $app->delete("/deleteBypassword/:password", function ($req, $res) {
        $DevController = new DevController($req, $res);   
        $DevController->removeBypassword();
    });

    
 

    

    