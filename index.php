<?php
session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

spl_autoload_register(function ($className) {
   if(file_exists("Core/".$className.".php")) {
       require "Core/".$className.".php";
   }
   if (file_exists("Controller/".$className.".php")) {
       require "Controller/".$className.".php";
   }
   if (file_exists("Model/".$className.".php")) {
       require "Model/".$className.".php";
   }
});

$request = new Request();
$route = new Router();

if(isset($_SESSION['user'])) {
    $Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $Path = explode("/", $Path)[1];
    if(file_exists("views/default/".$Path.".php")) {
        require "views/default/".$Path.".php";
    }else if($Path == "") {
        require "views/default/tasks.php"; 
    }else {
        echo "<h1 style='color:red; text-align: center'>Page Not Found</h1>";
    }
}else {
    require "views/default/login.php";
    $_cnt = new AdministrationController();
}



