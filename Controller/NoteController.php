<?php

class NoteController extends MainController {
    
    
    public function __construct () {
        parent::__construct();
    }
    
    public function indexAction() {
//        $this->Model->getNotes();
    } 
    
    public function addNote(array $args) {
        $data = $this->Model->addNote($args);
        echo json_encode($data);
        exit;
    }
    
     public function getNotes(array $args = NULL) {
        $data = $this->Model->getNotes($args);
        echo json_encode($data);
        exit;
    }
    
     public function deleteNote($id) {
        $this->Model->deleteNote($id);
         exit;
    }
    
}