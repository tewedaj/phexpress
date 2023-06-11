<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Util imports
include "./db/connection.php";
require "./db/initialize.php";
include "./util/phexpress.php";
include "./util/helpers/extra/cors.php";


include "./util/helpers/interface/response.php";
include "./model/models.php";
include "./util/helpers/extra/jsonHelper.php";
include "./util/helpers/CacheHub/Cache.php";
include "./util/helpers/CacheHub/cacheHandler.php";
include "./util/helpers/algo/binarySearch.php";
include "./util/helpers/sql/sqlGenerator.php";
include "./util/helpers/jwt/jwt.php";
include "./util/setting.php";
include "./model/user.php";


global $db;
$db = new connect($settings);

$headers = getallheaders();
// echo json_encode($headers);
global $user;
$user = new user();
if(isset($headers["Authorization"])){
    $user->validateToken($headers["Authorization"]);
}
$settings["modelController"] ? include "./configuration/schemaMigration.php" : "";
$settings["modelController"] ? include "./db/initialize.php" : "";



cors();


//Route imports
include "./routes/user.php";
include "./routes/Dev.php";
