<?php 

require APPPATH . 'libraries/REST_Controller.php';     

class Api extends REST_Controller {    

    public function __construct() {

        parent::__construct();
        $this->load->model("StudentModel", "student");

    }

    public function index_get() {

        $students = $this->student->get();
  
        if(empty($students)){
          $this->response(array('message' => "No records found!"));
        } else {
          $this->response($students, 200);
        }
          
    }


}