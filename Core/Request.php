<?php 

class Request {
    private $get;
    private $post;
    private $request;
    private $params;
    
    public function __construct() {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->request = $_REQUEST;
        $this->parameterProcessing();

            
    }
    
    public function getParams() {
        return $this->params;
    }
    
    public function isGet() {
      return ($_SERVER['REQUEST_METHOD'] == "GET") ? true : false;  
    }
    
    public function isAjax() {
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }else {
            return false;
        }
    }
    
    public function isPost() {
      return ($_SERVER['REQUEST_METHOD'] == "POST") ? true : false; 
    }
    
    private function parameterProcessing () {
//        post requests
        if($this->isPost() && !$this->isAjax()) {
            $this->params = $_POST;
        }
//        GET requests
        if($this->isGet()) {
            $buffer = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
            if(strlen($buffer)) {
                $arr = explode("&", $buffer);
                $buffer_1 = [];
                foreach ($arr as $buffer_2) {
                    $buffer_3 = explode("=", $buffer_2);
                    $buffer_4[$buffer_3[0]] = $buffer_3[1];
                    $buffer_1 = $buffer_4;
                }
                $this->params = $buffer_1;
            }else {
                $this->params = "";  
            }
        }
        
             
        if($this->isAjax() && $this->isPost()) {
            $buffer = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
            if($_SERVER['REQUEST_URI'] == "/notes") {
                $cnt = new NoteController();
                $cnt->getNotes($_POST);
            }
            if($_SERVER['REQUEST_URI'] == "/administrations") {
                $cnt = new AdministrationController();
                $cnt->getUsers($_POST);
            }
            if($_SERVER['REQUEST_URI'] == "/administrations/getuser") {
                $cnt = new AdministrationController();
                $cnt->getUser($_POST);
            }
            if($_SERVER['REQUEST_URI'] == "/") {
                $cnt = new TaskController();
                $cnt->getTasks($_POST);
            }
            if($_SERVER['REQUEST_URI'] == "/set") {
                $cnt = new TaskController();
                $cnt->addTask($_POST);
            }
            if($_SERVER['REQUEST_URI'] == "/organizations") {
                $cnt = new OrganizationController();
                $cnt->getOrganizations($_POST);
            }
            if($_SERVER['REQUEST_URI'] == "/organizations/getorganization") {
                $cnt = new OrganizationController();
                $cnt->getOrganization($_POST);
            }
            if($_SERVER['REQUEST_URI'] == "/organizations/getorganizationtasks") {
                $cnt = new OrganizationController();
                $cnt->getOrganizationTasks($_POST);
            }
            $this->params = $_POST;
        }
        
        if($this->isAjax() && $this->isGet()) {
            $PATH = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            if($_SERVER['REQUEST_URI'] == "/filter") {
                $cnt = new AdministrationController();
                $cnt->getUsers($this->params);
            }
            if($_SERVER['REQUEST_URI'] == "/administrations/getallusers") {
                $cnt = new AdministrationController();
                $cnt->getUsers($this->params);
            }
            if($_SERVER['REQUEST_URI'] == "/administrations/getuniqueuser") {
                $cnt = new AdministrationController();
                $cnt->getUniqueUser($this->params);
            }
            if($PATH == "/administrations/filter") {
                $cnt = new AdministrationController();
                $cnt->getUsers($this->params);
            }        
            if($PATH == "/organizations/filter") {
                $cnt = new OrganizationController();
                $cnt->getOrganizations($this->params);
            }
            
            
        }
        
        
    }
 
}