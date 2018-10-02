<?php

class StudentController extends MainController {
    
    
    public function __construct () {
        parent::__construct();
    }
    
    public function indexAction() {
//        echo "student method";
    } 
    
    public function addStudent(array $args) {
        $this->Model->addStudent($args);
    }
    
    public function getStudents($id = NULL) {
        return $this->Model->getStudents($id);
    }
    
    public function deleteStudent($id) {
        $this->Model->deleteStudent($id);
    }
    
    
}