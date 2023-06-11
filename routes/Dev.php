<?php
 
    $app = new phexpress();
    $app->setParent("dev");

    global $user;
    $app->setAuthorized_user("student" == $user->getUser_type());

    //this route can only be accessed by the student
    $app->get("/student_only",function($req,$res){
        $res->send(200,"hello world student");
    });

    
    $app->setAuthorized_user("teacher" == $user->getUser_type());

    //this route can only be accessed by the teacher
    $app->get("/teacher_only",function($req,$res){
        $res->send(200,"hello world teacher");
    });
