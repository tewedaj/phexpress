<?php
include "./controller/userController.php";

$app = new phexpress();
$app->setParent("user");

$app->post("/login", function($req,$res){
    $user = new userController($req,$res);
    $user->login();
});



