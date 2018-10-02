<?php

abstract class MainController {
    
    public $Model;
    
    public function __construct () {
        $this->Model = new Model();
    }
    

//    private function template ($path, array $content) {
//        ob_start();
//        extract($content);
//        include ($path);
//        return ob_get_clean();
//    }
}

