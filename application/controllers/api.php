<?php 

require APPPATH . 'libraries/REST_Controller.php';     

class Api extends REST_Controller {    

    public function __construct() {

        parent::__construct();
        $this->load->model("StudentModel", "student");

    }

    public function index_get($id = 0) {

        $students = $this->student->get($id);
  
        if(empty($students)){
          $this->response(array('message' => "No records found!"));
        } else {
          $this->response($students, 200);
        }
          
    }

    public function index_post() {

        $json = json_decode(file_get_contents('php://input'));
        $data['name'] = isset($json->name) ? $json->name : '';
        $data['address'] = isset($json->address) ? $json->address : '';
        $data['age'] = isset($json->age) ? $json->age : '';
        
        $this->student->save($data);
        $this->response(array('message' => 'Student added!'), 200);      

    }

    public function index_put($id = NULL) {

        $json = json_decode(file_get_contents('php://input'));
        $data['name'] = isset($json->name) ? $json->name : '';
        $data['address'] = isset($json->address) ? $json->address : '';
        $data['age'] = isset($json->age) ? $json->age : '';

        if($id == NULL) {
            $this->response(array('message' => 'Send student ID!'), 400);
        } else {
            $this->student->save($data, $id);
            $this->response(array('message' => 'Student updated!'), 200);      
        }
                

    }


}