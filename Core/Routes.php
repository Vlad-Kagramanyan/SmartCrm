<?php 
return [

  "/" => [
//      "controller" => "TaskController",
//      "action" => "indexAction"
  ],
    "/set" => [
      "controller" => "TaskController",
        "action" => "addTask"
  ],
    "/tasks/updeate" => [
      "controller" => "TaskController",
        "action" => "updateTask"
  ],
    "/tasks/delete" => [
      "controller" => "TaskController",
        "action" => "deleteTask"
  ],
    "/tasks/filter" => [
      "controller" => "TaskController",
        "action" => "getTasks"
  ],
    
    "/status" => [
      "controller" => "TaskController",
        "action" => "getStatusWork"
  ],
    
    
    
    "/organizations" => [
//      "controller" => "OrganizationController",
//        "action" => "indexAction"
  ],
    "/organizations/set" => [
      "controller" => "OrganizationController",
        "action" => "addOrganization"
  ],
    "/organizations/update" => [
      "controller" => "OrganizationController",
        "action" => "updateOrganization"
  ],
    "/organizations/delete" => [
      "controller" => "OrganizationController",
        "action" => "deleteOrganization"
  ],
    
    
     "/students" => [
      "controller" => "StudentController",
        "action" => "indexAction"
  ],
    "/students/set" => [
      "controller" => "StudentController",
        "action" => "addStudent"
  ],
    "/students/update" => [
      "controller" => "StudentController",
        "action" => "updateStudent"
  ],
    "/students/delete" => [
      "controller" => "StudentController",
        "action" => "deleteStudent"
  ],
    
    
    "/courses" => [
      "controller" => "CourseController",
        "action" => "indexAction"
  ],
    "/courses/set" => [
      "controller" => "CourseController",
        "action" => "addCourse"
  ],
    "/courses/update" => [
      "controller" => "CourseController",
        "action" => "updateCourse"
  ],
    "/courses/delete" => [
      "controller" => "CourseController",
        "action" => "deleteCourse"
  ],
    
  "/administrations" => [
//  "controller" => "AdministrationController",
//    "action" => "indexAction"
  ],
    "/administrations/set" => [
      "controller" => "AdministrationController",
        "action" => "addUser"
  ],
    "/administrations/update" => [
      "controller" => "AdministrationController",
        "action" => "updateUser"
  ],
    "/administrations/delete" => [
      "controller" => "AdministrationController",
        "action" => "deleteUser"
  ],
     "/administrations/login" => [
      "controller" => "AdministrationController",
        "action" => "login"
  ],
    "/administrations/logout" => [
      "controller" => "AdministrationController",
        "action" => "logout"
  ],
    
    
    "/notes" => [
//      "controller" => "NoteController",
//        "action" => "getNotes"
  ],
    "/notes/set" => [
      "controller" => "NoteController",
        "action" => "addNote"
  ],
    "/notes/update" => [
      "controller" => "NoteController",
        "action" => "updateNote"
  ],
    "/notes/delete" => [
      "controller" => "NoteController",
        "action" => "deleteNote"
  ]
    
];