<?php

class CourseController extends MainController {
    
    public function __construct () {
        parent::__construct();
    }
    
    public function indexAction() {
//        echo "courses controller";
    } 
    
    public function addCourse(array $args) {
        $this->Model->addCourse($args);
    }
    
    public function getCourses() {
        return $this->Model->getCourses();
    }
    
    public function getCourse($id) {
        return $this->Model->getCourse($id);
    }
    
    public function deleteCourse($id) {
        $this->Model->deleteCourse($id);
    }
    
    
}