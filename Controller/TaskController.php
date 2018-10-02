<?php

class TaskController extends MainController {
     
    public function __construct () {
        parent::__construct();
    }
    
    public function indexAction() {
//        echo "sss";
    } 
    
    public function addTask(array $args) {
        $data = $this->Model->addTask($args);
        echo json_encode($data);
        exit;
    }
    
    public function getTasks(array $id = NULL) {
        $data = $this->Model->getTasks($id);
        echo json_encode($data);
        exit;
    }
    
    public function getAllTasks() {
        $data = $this->Model->getAllTasks();
        echo json_encode($data);
        exit;
    }
    
    public function getTask($id) {
        $data = $this->Model->getTasks($id);
        echo json_encode($data);
        exit;
    }
    
    public function getStatusWork($id) {
        $data = $this->Model->getStatusWork($id);
        echo json_encode($data);
        exit;
    }
    
    public function deleteTask($id) {
        $data = $this->Model->deleteTask($id);
        echo json_encode($data);
        exit;
    }
    
    
} 