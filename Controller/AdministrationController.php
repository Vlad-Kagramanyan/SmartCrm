<?php

class AdministrationController extends MainController {
    
    public function __construct () {
        parent::__construct();
    }
    
    public function indexAction() {
//        echo "user method";
    } 
    
    public function addUser(array $args) {
        $this->Model->addUser($args);
        exit;
    } 
    
    public function getUsers(array $args = NULL) {
        $data = $this->Model->getUsers($args);
        echo json_encode($data); 
        exit;
    }
    
    public function getUser($id) {
        $data = $this->Model->getUser($id);
        echo json_encode($data); 
        exit;
    }
    
    public function getUniqueUser() {
        $data = $this->Model->getUniqueUser();
        echo json_encode($data); 
        exit;
    }
    
    public function login(array $args) {
        $data = $this->Model->login($args);
        echo $data;
        exit;
    }
    
    public function logout() {
         $this->Model->logout();
    }
    
    public function deleteUser ($id) {
        $this->Model->deleteUser($id);
        exit;
    }
    
}