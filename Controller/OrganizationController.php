<?php

class OrganizationController extends MainController {
    
    public function __construct () {
        parent::__construct();
    }
    
    public function indexAction() {
//        echo " index action";
    }
    
    public function addOrganization(array $args) {
        $this->Model->addOrganization($args);
    }
    
    public function getOrganizations(array $args = NULL) {
        $data = $this->Model->getOrganizations($args);
        echo json_encode($data);
        exit;
    }
    
    public function getOrganization($id) {
        $data = $this->Model->getOrganization($id);
        echo json_encode($data);
        exit;
    }
     
    public function getOrganizationTasks($id) {
        $data = $this->Model->getOrganizationTasks($id);
        echo json_encode($data);
        exit;
    }
    
    public function deleteOrganization($id) {
        $this->Model->deleteOrganization($id);
    }
    
}