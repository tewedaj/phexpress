<?php


class Request{
    
    public $method;
    public $url;
    public $headers;
    public $body;  


    function __construct(){
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->url = $_SERVER["REQUEST_URI"];
        $this->headers = getallheaders();
        $this->body = file_get_contents('php://input');
    }

}