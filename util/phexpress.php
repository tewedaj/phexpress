<?php
/*
This PHP script implements a routing mechanism that supports HTTP methods such as POST, GET, PATCH, and DELETE.
The code is structured to closely resemble the syntax of Node.js, providing developers with a familiar 
programming paradigm. Through this script, web developers can easily define and manage routes in their web
applications. By utilizing a syntax that is similar to Node.js, the script simplifies the process of building
web applications in PHP, thereby improving the efficiency and productivity of web development. 
*/

class phexpress
{
    private $requests = [];
    private $parent;

    function __construct()
    {
        $this->requests =  [
            "method" => $_SERVER['REQUEST_METHOD'],
            "url" => $_SERVER["REQUEST_URI"],
            "headers" =>  getallheaders(),
            "body" =>   file_get_contents('php://input'),
            "params" => []
        ];
    }

    public function Get(String $routes, $callBack)
    {
        $routes = "/".$this->parent.$routes;
        $url = $this->requests["url"];

        if (($this->requests["method"] == "GET")) {

            $path = parse_url($url, PHP_URL_PATH);
            $path3 = explode(rtrim($routes,"/"), $path);
            if (count($path3) > 1) {
                if ($path3[1] == "" || $path3[1] == "/") {
                    $response = new Response();
                    $callBack($this->requests, $response);
                    exit;
                }
            } else {

                //generate a specific request based on the route given
                $pattern =   getPathRegex($routes);
                $pattern = str_replace('\(', '(', $pattern);
                $variables = explode(":", $routes);

                if (count($variables) > 1) {
                    $matches = array();
                    $finalUri = $path3[0];
                    //if you hosted the project inside a folder instead of root
                    //uncomment the below line 
                    //add your folder name instead of <FolderName>
                    // $finalUri = str_replace("FolderName/", "", $path3[0]);
                    $finalUri = rtrim($finalUri, "/");


                    if (preg_match($pattern, $finalUri, $matches)) {
                        $keyMatch = array();

                        preg_match($pattern, str_replace(":", "", $routes), $keyMatch);


                        for($x = 0 ; $x < count($matches); $x++){
                            $this->requests["params"][$keyMatch[$x]] = $matches[$x];
                            
                        }

                        $response = new Response();
                        $callBack($this->requests, $response);
                        exit;
                    }
                }
            }
        }
    }


    public function setParent($parent){
        $this->parent = $parent;
    }


    public function Post(String $routes, $callBack)
    {
        $routes = "/".$this->parent.$routes;
        $url = $this->requests["url"];

        if (($this->requests["method"] == "POST")) {

            $path = parse_url($url, PHP_URL_PATH);
            $path3 = explode(rtrim($routes,"/"), $path);
            if (count($path3) > 1) {
                if ($path3[1] == "" || $path3[1] == "/") {
                    $response = new Response();
                    $callBack($this->requests, $response);
                    exit;
                }
            } else {

                //generate a specific request based on the route given
                $pattern =   getPathRegex($routes);
                $pattern = str_replace('\(', '(', $pattern);
                $variables = explode(":", $routes);

                if (count($variables) > 1) {
                    $matches = array();
                    $finalUri = $path3[0];
                    //if you hosted the project inside a folder instead of root
                    //uncomment the below line 
                    //add your folder name instead of <FolderName>
                    // $finalUri = str_replace("FolderName/", "", $path3[0]);
                    $finalUri = rtrim($finalUri, "/");


                    if (preg_match($pattern, $finalUri, $matches)) {
                        $keyMatch = array();

                        preg_match($pattern, str_replace(":", "", $routes), $keyMatch);


                        for($x = 0 ; $x < count($matches); $x++){
                            $this->requests["params"][$keyMatch[$x]] = $matches[$x];
                            
                        }

                        $response = new Response();
                        $callBack($this->requests, $response);
                        exit;
                    }
                }
            }
        }
    }

    public function Patch(String $routes, $callBack)
    {
        $routes = "/".$this->parent.$routes;
        $url = $this->requests["url"];

        if (($this->requests["method"] == "PATCH")) {

            $path = parse_url($url, PHP_URL_PATH);
            $path3 = explode(rtrim($routes,"/"), $path);
            if (count($path3) > 1) {
                if ($path3[1] == "" || $path3[1] == "/") {
                    $response = new Response();
                    $callBack($this->requests, $response);
                    exit;
                }
            } else {

                //generate a specific request based on the route given
                $pattern =   getPathRegex($routes);
                $pattern = str_replace('\(', '(', $pattern);
                $variables = explode(":", $routes);

                if (count($variables) > 1) {
                    $matches = array();
                    $finalUri = $path3[0];
                    //if you hosted the project inside a folder instead of root
                    //uncomment the below line 
                    //add your folder name instead of <FolderName>
                    // $finalUri = str_replace("FolderName/", "", $path3[0]);
                    $finalUri = rtrim($finalUri, "/");


                    if (preg_match($pattern, $finalUri, $matches)) {
                        $keyMatch = array();

                        preg_match($pattern, str_replace(":", "", $routes), $keyMatch);


                        for($x = 0 ; $x < count($matches); $x++){
                            $this->requests["params"][$keyMatch[$x]] = $matches[$x];
                            
                        }

                        $response = new Response();
                        $callBack($this->requests, $response);
                        exit;
                    }
                }
            }
        }
    }


    public function Delete(String $routes, $callBack)
    {
        $routes = "/".$this->parent.$routes;
        $url = $this->requests["url"];

        if (($this->requests["method"] == "DELETE")) {

            $path = parse_url($url, PHP_URL_PATH);
            $path3 = explode(rtrim($routes,"/"), $path);
            if (count($path3) > 1) {
                if ($path3[1] == "" || $path3[1] == "/") {
                    $response = new Response();
                    $callBack($this->requests, $response);
                    exit;
                }
            } else {

                //generate a specific request based on the route given
                $pattern =   getPathRegex($routes);
                $pattern = str_replace('\(', '(', $pattern);
                $variables = explode(":", $routes);

                if (count($variables) > 1) {
                    $matches = array();
                    $finalUri = $path3[0];
                    //if you hosted the project inside a folder instead of root
                    //uncomment the below line 
                    //add your folder name instead of <FolderName>
                    // $finalUri = str_replace("FolderName/", "", $path3[0]);
                    $finalUri = rtrim($finalUri, "/");


                    if (preg_match($pattern, $finalUri, $matches)) {
                        $keyMatch = array();

                        preg_match($pattern, str_replace(":", "", $routes), $keyMatch);


                        for($x = 0 ; $x < count($matches); $x++){
                            $this->requests["params"][$keyMatch[$x]] = $matches[$x];
                            
                        }

                        $response = new Response();
                        $callBack($this->requests, $response);
                        exit;
                    }
                }
            }
        }
    }



  
}
