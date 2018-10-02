<?php

class Router {
    private $request;
    private $reqParams;
    
    public function __construct () {
        $this->routing();
    }
    
    public function routing() {
        $_Path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $routeArray = include "Core/Routes.php";
        $this->request = new Request();
        $this->reqParams = $this->request->getParams();
        if(isset($routeArray[$_Path]["controller"])) {
        $controller = $routeArray[$_Path]["controller"];
        $action = $routeArray[$_Path]["action"];
            $cnt = new $controller();
            $cnt->$action($this->reqParams);
        }
    }
    
}
