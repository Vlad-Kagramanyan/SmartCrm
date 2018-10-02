<?php 
    
class Model {
    public $mysqli;
    public static $connect = null;
    
    public function __construct() {
        $this->connect();
//        $this->getUniqueUser();
    }
    
    public function connect(){
       $this->mysqli = new mysqli("localhost", "root", "", "smartCrm");
       if($this->mysqli->connect_errno){
           exit('Connect Error...');
       }else{
           $this->mysqli->set_charset("utf8");
       }
    }
    
//    tasks
    
    
    public function addTask (array $args) {
        print_r($args);
        $_args = [];
        foreach($args as $key => $val) {
                $name = $this->REHT($val);
            $_args[$key] = $name;
        }
        
        $sql = "INSERT INTO `tasks` (`task_parent`, `task_doer`, `task_description`, `task_Process`, `work_price`, `payment_day`, `payment`, `work_start`, `work_end`, `task_status`, `other_notes`, `show_task`)
        VALUES ('".$_args['task_parent']."', '".$_args['task_doer']."', '".$_args['Task_description']."', '".$_args['Task_Process']."', '".$_args['work_price']."', '".$_args['payment_day']."', '".$_args['payment']."',  '".$_args['work_start']."', '".$_args['work_end']."', '".$_args['task_status']."',  '".$_args['other_notes']."', 1)";
        $res = $this->mysqli->query($sql);
        if($res) {
//            header('Location: /');
        }else {
            echo $this->mysqli->error;
        }
    }
    
    public function getTasks (array $args = NULL) {
//        filter
        $_SESSION["filter"]["userid"] = isset($args['userid']) ? $args['userid'] : $_SESSION["filter"]["userid"];
        $_SESSION["filter"]["taskstatus"] = isset($args['taskstatus']) ? $args['taskstatus'] : $_SESSION["filter"]["taskstatus"];
        $_SESSION["filter"]["orgid"] = isset($args['orgid']) ? $args['orgid'] : $_SESSION["filter"]["orgid"];
        
        $and_task_doer="";
        if($_SESSION["filter"]["userid"] != 0 && $_SESSION["filter"]["taskstatus"] != null) {
           $and_task_doer = "AND `task_doer`=".$_SESSION['filter']["userid"].""; 
        }else {
            $and_task_doer="";
        }
        
        $and_task_status="";
        if($_SESSION["filter"]["taskstatus"] != 0 && $_SESSION["filter"]["taskstatus"] != null) {
           $and_task_status ="AND `task_status`=".$_SESSION['filter']["taskstatus"].""; 
        } else {
            $and_task_status = "";
        }
        
        $and_task_parent="";
        if($_SESSION["filter"]["orgid"] != 0 && $_SESSION["filter"]["orgid"] != null) {
           $and_task_parent = "AND `task_parent`=".$_SESSION['filter']["orgid"].""; 
        }else {
            $and_task_parent="";
        }
        
//        pages
        $limit = "";
        if(isset($args["page"])) {
            if($args["page"] != "all") {
                $start = $args["page"]; 
                $start = ($start - 1) * 3;
                $limit = "LIMIT ".$start." "."3";
            }
        }else {
            $start = 0;
            $limit = "LIMIT ".$start." "."3";
        }
//        count db
        $sqlNUM = "SELECT * FROM `tasks` WHERE show_task=1 $and_task_doer $and_task_parent $and_task_status ";
        $sqlCount = $this->mysqli->query($sqlNUM);
        $sqlCount = ceil(mysqli_num_rows($sqlCount) / 3);        
            
        $sql = "SELECT * FROM `tasks` WHERE `show_task`=1 $and_task_doer $and_task_parent $and_task_status ORDER BY `task_id` DESC LIMIT $start, 3";

        $res = $this->mysqli->query($sql);
        if($res) {
            $result = $res->fetch_all(MYSQLI_ASSOC);
            return $result = array_merge($result, ['count' => $sqlCount]);
        }else {
            return $this->mysqli->error;
        }
    }
    
    public function getTask ($id) {
        if(is_array($id)) {
            $id = $id['id'];
        }
        $sql = "SELECT * FROM `tasks` WHERE `task_id`=$id";
        $res = $this->mysqli->query($sql);
        if($res) {
            $result = $res->fetch_assoc();
            return $result;
        }else {
            echo $this->mysqli->error;
        }
    }
    
    public function getStatusWork ($id) {
        if(is_array($id)) {
            $id = $id['id'];
        }
        
        $sql = "SELECT * FROM `work_status` WHERE `status_id`=$id";
        $res = $this->mysqli->query($sql);
        if($res) {
            $result = $res->fetch_assoc();
            return $result;
        }else {
            echo $this->mysqli->error;
        }
    }
    
    public function deleteTask($id) {
        $sql = "UPDATE `tasks` SET `show_task`= 0 WHERE `tasks`.`task_id` = '".$id['id']."'";
        $res = $this->mysqli->query($sql);
        if($res) {
//            header('Location: /');
        }else {
            echo $this->mysqli->error;
        }
    }
    
//    organizations
    
    
    public function addOrganization (array $args) {
        $_args = [];
        foreach($args as $key => $val) {
            $name = [];
            if(!is_array($val)) {
                $name = $this->REHT($val);
            }else {
                $name = json_encode($val , JSON_UNESCAPED_UNICODE);
            }
            $_args[$key] = $name;
        }
        $sql = "INSERT INTO `organizations` (org_name, position, name_lastName, telephone, email, address,  work_status, where_we_found, date_of_apply, other_notes, messengers, social_networks, show_organization)
                        VALUES ('".$_args['org_name']."', '".$_args['position']."', '".$_args['name_lastName']."', '".$_args['telephone']."', '".$_args['email']."', '".$_args['address']."', '".$_args['work_status']."', '".$_args['where_we_found']."', '".$_args['date_of_apply']."', '".$_args['other_notes']."', '".$_args["messengers"]."', '".$_args["social_networks"]."', 1)";
        $res = $this->mysqli->query($sql);
        if($res) {
        }else {
            return $this->mysqli->error;
        }
    }
    
    public function getOrganizations (array $args = NULL) {
        if(!isset($args["all"])) {
 
            $_SESSION["filterOrg"]["taskstatus"] = isset($args['taskstatus']) ? $args['taskstatus'] : $_SESSION["filterOrg"]["taskstatus"];
            $_SESSION["filterOrg"]["orgid"] = isset($args['orgid']) ? $args['orgid'] : $_SESSION["filterOrg"]["orgid"];

            $and_org_status="";
            if($_SESSION["filterOrg"]["taskstatus"] != '0' && $_SESSION["filterOrg"]["taskstatus"] != null) {
               $and_org_status ="AND `work_status`=".$_SESSION['filterOrg']["taskstatus"].""; 
            } else {
                $and_org_status = "";
            }

            $and_org_id="";
            if($_SESSION["filterOrg"]["orgid"] != '0' && $_SESSION["filterOrg"]["orgid"] != null) {
               $and_org_id = "AND `organization_id`=".$_SESSION['filterOrg']["orgid"].""; 
            }else {
                $and_org_id="";
            }
            
            if(isset($args["page"])) {
                $start = $args["page"]; 
                $start = ($start - 1) * 3;
            }else {
                $start = 0;
            }

            $sqlNUM = "SELECT * FROM `organizations` WHERE show_organization=1 $and_org_status $and_org_id";
            $sqlCount = $this->mysqli->query($sqlNUM);
            $sqlCount = ceil(mysqli_num_rows($sqlCount) / 3);    

            $sql = "SELECT * FROM `organizations` WHERE `show_organization`=1 $and_org_status $and_org_id ORDER BY `organization_id` DESC LIMIT $start, 3";
            $res = $this->mysqli->query($sql);
//            print_r($sql);
            if($res) {
                $result = $res->fetch_all(MYSQLI_ASSOC);
                $_result = [];
                foreach($result as $_key => $values) {
                    $_result[$_key] = $values;
                    foreach($values as $key => $val) {
                        if(substr($val, 0, 1) != "{") {
                            $values[$key] = $val;
                        }else {
                            $values[$key] = json_decode($val, JSON_UNESCAPED_UNICODE);
                        }
                        $_result[$_key] = $values;
                    }
                }
                return $_result = array_merge($_result, ['count' => $sqlCount]);
            }else {
                return $this->mysqli->error;
            }
        }else {
            $sql = "SELECT * FROM `organizations` WHERE `show_organization`=1 ORDER BY `organization_id` DESC";
            $res = $this->mysqli->query($sql);
            if($res) {
                $result = $res->fetch_all(MYSQLI_ASSOC);
                $_result = [];
                foreach($result as $_key => $values) {
                    $_result[$_key] = $values;
                    foreach($values as $key => $val) {
                        if(substr($val, 0, 1) != "{") {
                            $values[$key] = $val;
                        }else {
                            $values[$key] = json_decode($val, JSON_UNESCAPED_UNICODE);
                        }
                        $_result[$_key] = $values;
                    }
                }
                return $_result;
            }else {
                return $this->mysqli->error;
            }
        }
    }
    
    public function getOrganization ($id) {
        if(is_array($id)) {
            $id = $id['id'];
        }
        $sql = "SELECT * FROM `organizations` WHERE `organization_id`=$id";
        $res = $this->mysqli->query($sql);
        if($res) {
            $result = $res->fetch_assoc();
            return $result;
        }else {
            echo $this->mysqli->error;
        }
    }
    
    public function getOrganizationTasks ($id) {
        if(is_array($id)) {
            $id = $id['id'];
        }
        $sql = "SELECT * FROM `tasks` WHERE `task_parent`=$id";
        $res = $this->mysqli->query($sql);
        if($res) {
            if(mysqli_num_rows($res) == 1) {
                $result = $res->fetch_assoc();
            }else {
                $result = $res->fetch_all(MYSQLI_ASSOC);
            } 
            return $result;
        }else {
            echo $this->mysqli->error;
        }
    }
    
    public function deleteOrganization($id) {
        $sql = "UPDATE `organizations` SET `show_organization`= 0 WHERE `organizations`.`organization_id` = '".$id['id']."'";
        $res = $this->mysqli->query($sql);
        if($res) {
            header('Location: /organizations');
        }else {
            echo $this->mysqli->error;
        }
    }
    
    
//    students
    
    public function addStudent (array $args) {
        $_args = [];
        foreach($args as $key => $val) {
                $name = $this->REHT($val);
            $_args[$key] = $name;
        }
        $sql = "INSERT INTO `students` (`name_lastName`, `telephone`, `email`, `amount_to_be_pay`, `phase_graph`, `student_status`, `payment_status`, `where_we_found`, date_of_apply, date_of_pay, `other_notes`, `show_student`) 
        VALUES ('".$_args['name_lastName']."', '".$_args['telephone']."', '".$_args['email']."', '".$_args['amount_to_be_pay']."', '".$_args['phase_graph']."', '".$_args['student_status']."', '".$_args['payment_status']."', '".$_args['where_we_found']."', '".$_args['date_of_apply']."', '".$_args['date_of_pay']."', '".$_args['other_notes']."', 1)";
        $res = $this->mysqli->query($sql);
        if($res) {
            header('Location: /students');
        }else {
            echo $this->mysqli->error;
        }
    }
    
    public function getStudents ($id = NULL) {
         $_SESSION['course_filter'] = NULL;
        $and = "";
        if(isset($id)) {
            $_SESSION['course_filter'] = $id;
            $and = "AND phase_graph={$id}";
        }
        $sql = "SELECT * FROM `students` WHERE `show_student`=1 $and ORDER BY `student_id` DESC";
        $res = $this->mysqli->query($sql);
        if($res) {
            $result = $res->fetch_all(MYSQLI_ASSOC);
            return $result;
        }else {
            echo $this->mysqli->error;
        }
    }
    
    public function deleteStudent($id) {
        $sql = "UPDATE `students` SET `show_student`= 0 WHERE `students`.`student_id` = '".$id['id']."'";
        $res = $this->mysqli->query($sql);
        if($res) {
            header('Location: /students');
        }else {
            echo $this->mysqli->error;
        }
    }
    
    
    //courses
    
    public function addCourse (array $args) {
        $_args = [];
        foreach($args as $key => $val) {
            $name = [];
            if(!is_array($val)) {
                $name = $this->REHT($val);
            }else {
                $name = json_encode($val , JSON_UNESCAPED_UNICODE);
            }
            $_args[$key] = $name;
        }
        $sql = "INSERT INTO `courses` (`time`, `course_start`,   `course_name`, `week_day`, `show_course`) 
        VALUES ('".$_args['time']."', '".$_args['course_start']."',  '".$_args['course_name']."', '".$_args['week_day']."', 1)";
        $res = $this->mysqli->query($sql);
        if($res) {
            header('Location: /courses');
        }else {
            echo $this->mysqli->error;
        }
    }
        
    public function getCourses () {
        $sql = "SELECT * FROM `courses` WHERE `show_course`=1 ORDER BY `course_id` DESC";
        $res = $this->mysqli->query($sql);
        if($res) {
            $result = $res->fetch_all(MYSQLI_ASSOC);
            $_result = [];
            foreach($result as $_key => $values) {
                $_result[$_key] = $values;
                foreach($values as $key => $val) {
                    if(substr($val, 0, 1) != "{") {
                        $values[$key] = $val;
                    }else {
                        $values[$key] = json_decode($val, JSON_UNESCAPED_UNICODE);
                    }
                    $_result[$_key] = $values;
                }
            }
            return $_result;
        }else {
            echo $this->mysqli->error;
        }
    }  
    
    public function getCourse ($id) {
        $sql = "SELECT * FROM `courses` WHERE `course_id`= $id";
        $res = $this->mysqli->query($sql);
        if($res) {
            $result = $res->fetch_assoc();
            return $result;
        }else {
            echo $this->mysqli->error;
        }
    }
    
    public function deleteCourse($id) {
        $sql = "UPDATE `courses` SET `show_course`= 0 WHERE `courses`.`course_id` = '".$id['id']."'";
        $res = $this->mysqli->query($sql);
        if($res) {
            header('Location: /courses');
        }else {
            echo $this->mysqli->error;
        }
    }
    
//    add user
    
    
    public function addUser (array $args) {
        $_args = [];
        foreach($args as $key => $val) {
            $name = [];
            if(!is_array($val)) {
                $name = $this->REHT($val);
            }else {
                $name = json_encode($val , JSON_UNESCAPED_UNICODE);
            }
            $_args[$key] = $name;
        }
        $email = $this->REHT($args['email']);
        $email = strtolower($email);
        $sql = "INSERT INTO `users` (`position`, `name_lastName`, `telephone`, `email`, `password`, `salary`, `messengers`, `social_networks`, `role`, `show_student`) 
        VALUES ('".$_args['position']."', '".$_args['name_lastName']."', '".$_args['telephone']."', '".$email."', '".$_args['password']."', '".$_args['salary']."', '".$_args['messengers']."', '".$_args['social_networks']."', 1, 1)";
        $res = $this->mysqli->query($sql);
        if($res) {
//            header('Location: /administrations');
        }else {
            echo $this->mysqli->error;
        }
    }
    
    public function getAllUsers() {
        $sql = "SELECT * FROM `users` WHERE `show_student`=1 ORDER BY `user_id` DESC";
        $res = $this->mysqli->query($sql);
        if($res) {
            $result = $res->fetch_all(MYSQLI_ASSOC);
            $_result = [];
            foreach($result as $_key => $values) {
                $_result[$_key] = $values;
                foreach($values as $key => $val) {
                    if(substr($val, 0, 1) != "{") {
                        $values[$key] = $val;
                    }else {
                        $values[$key] = json_decode($val, JSON_UNESCAPED_UNICODE);
                    }
                    $_result[$_key] = $values;
                }
            }
            return $_result;
        }else {
            echo $this->mysqli->error;
        }
    }
    
    public function getUniqueUser () {
        $sql = "SELECT position FROM `users` WHERE `show_student`=1 ORDER BY `user_id` DESC";
        $res = $this->mysqli->query($sql);
        if($res) {
            $result = $res->fetch_all(MYSQLI_ASSOC);
            $a=[];
            foreach($result as $key => $res) {
                foreach($res as $res_2) {
                    array_push($a, $res_2);
                }
            }
            $result = array_unique($a);
            return $result;
        }else {
            return $this->mysqli->error;
        }
    }
    
    public function getUsers (array $args = NULL) {
        if(!isset($args['all'])) {
            $_SESSION["filter"]["position"] = isset($args['position']) ? urldecode ($args['position']) : $_SESSION["filter"]["position"];
            $and_position="";
            if($_SESSION["filter"]["position"] != '0' && $_SESSION["filter"]["position"] != NULL) {
               $and_position = "AND `position` Like '".$_SESSION["filter"]["position"]."' "; 

            }else {
                $and_position="";

            }
            
            if(isset($args["page"])) {
                $start = $args["page"]; 
                $start = ($start - 1) * 3;
            }else {
                $start = 0;
            }

            $sqlNUM = "SELECT * FROM `users` WHERE `show_student`=1 $and_position";
            $sqlCount = $this->mysqli->query($sqlNUM);
            $sqlCount = ceil(mysqli_num_rows($sqlCount) / 3); 

            $sql = "SELECT * FROM `users` WHERE `show_student`=1 $and_position ORDER BY `user_id` DESC LIMIT $start, 3";
            $res = $this->mysqli->query($sql);
            if($res) {
                $result = $res->fetch_all(MYSQLI_ASSOC);
                $_result = [];
                foreach($result as $_key => $values) {
                    $_result[$_key] = $values;
                    foreach($values as $key => $val) {
                        if(substr($val, 0, 1) != "{") {
                            $values[$key] = $val;
                        }else {
                            $values[$key] = json_decode($val, JSON_UNESCAPED_UNICODE);
                        }
                        $_result[$_key] = $values;
                    }
                }
                return $_result = array_merge($_result, ['count' => $sqlCount]);
            }else {
                return $this->mysqli->error;
            }
        }else {
            $sql = "SELECT * FROM `users` WHERE `show_student`=1 ORDER BY `user_id` DESC";
            $res = $this->mysqli->query($sql);
            if($res) {
                $result = $res->fetch_all(MYSQLI_ASSOC);
                $_result = [];
                foreach($result as $_key => $values) {
                    $_result[$_key] = $values;
                    foreach($values as $key => $val) {
                        if(substr($val, 0, 1) != "{") {
                            $values[$key] = $val;
                        }else {
                            $values[$key] = json_decode($val, JSON_UNESCAPED_UNICODE);
                        }
                        $_result[$_key] = $values;
                    }
                }
                return $_result;
            }else {
                return $this->mysqli->error;
            }
        }
    }
    
    public function getUser ($id) {
        if(is_array($id)) {
            $id = $id['id'];
        }
        
        $sql = "SELECT * FROM `users` WHERE `user_id`=$id";
        $res = $this->mysqli->query($sql);
        if($res) {
            $result = $res->fetch_assoc();
            return $result;
        }else {
            echo $this->mysqli->error;
        }
    }
    
    public function login (array $args) {

        $email = $this->REHT($args['email']);
        $password = $this->REHT($args['password']);
        $email = strtolower($email);

        $sql = "SELECT `user_id`, `role` FROM `users` WHERE `email`='".$email."' AND `password`=$password";
        $res = $this->mysqli->query($sql);
        if(mysqli_num_rows($res) == 1) {
            $result = $res->fetch_assoc();
            $_SESSION['user'] = $result["user_id"];
            return json_encode([
                "errors" => "",
                "location" => "/"
            ]);
        }else {
            return json_encode([
                "errors" => "սխալ մուտքանուն",
                "location" => false
            ]);
        }
    }
    
    public function logout() {
         unset($_SESSION['user']);
        header('Location: ');
    }
    
    public function deleteUser($id) {
        $sql = "UPDATE `users` SET `show_student`= 0 WHERE `users`.`user_id` = '".$id['id']."'";
        $res = $this->mysqli->query($sql);
        if($res) {
//            header('Location: /administrations');
        }else {
            echo $this->mysqli->error;
        }
    }
    
    
    // notes
    
    public function addNote (array $args) {
        $_args = [];
        foreach($args as $key => $val) {
                $name = $this->REHT($val);
            $_args[$key] = $name;
        }
        $sql = "INSERT INTO `notes` (`org_name`, `position`, `name_lastName`, `telephone`, `email`, `topic`, `other_notes`, `where_we_found`, `date_of_apply`, `show_note`) 
        VALUES ('".$_args['org_name']."', '".$_args['position']."', '".$_args['name_lastName']."', '".$_args['telephone']."', '".$_args['email']."', '".$_args['topic']."', '".$_args['other_notes']."', '".$_args['where_we_found']."', '".$_args['date_of_apply']."', 1)";;
        $res = $this->mysqli->query($sql);
        if($res) {
            $sql1 = "SELECT * FROM `notes` WHERE `show_note`=1 ORDER BY `note_id` DESC";
            $res1 = $this->mysqli->query($sql1);
            if($res1) {
                $result = $res1->fetch_all(MYSQLI_ASSOC);
                return $result;
            }
        }else {
            echo $this->mysqli->error;
        }
    }
    
    public function getNotes (array $args = NULL) {
        if($args) {
            $start = $args["page"]; 
            $start = ($start - 1) * 3;
        }else {
            $start = 0;
        }
        
        $sqlNUM = "SELECT * FROM `notes` WHERE show_note=1";
        $sqlCount = $this->mysqli->query($sqlNUM);
        $sqlCount = ceil(mysqli_num_rows($sqlCount) / 3);    
        
        $sql = "SELECT * FROM `notes` WHERE `show_note`=1 ORDER BY `note_id` DESC LIMIT $start, 3";
        $res = $this->mysqli->query($sql);
        if($res) {
            $result = $res->fetch_all(MYSQLI_ASSOC);
            return $result = array_merge($result, ['count' => $sqlCount]);
        }else {
            echo $this->mysqli->error;
        }
    }
    
    public function deleteNote($id) {
        $sql = "UPDATE `notes` SET `show_note`= 0 WHERE `notes`.`note_id` = '".$id['id']."'";
        $res = $this->mysqli->query($sql);
        if($res) {
//            header('Location: /notes');
        }else {
            echo $this->mysqli->error;
        }
    }
    
    
    private function REHT ($arg) {
        return mysqli_real_escape_string($this->mysqli, trim(htmlspecialchars($arg)));
    }
    
    
}
    
    
    
    
