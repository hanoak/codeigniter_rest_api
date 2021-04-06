<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends CI_Model {

    public function __construct(){

        $this->load->database();

    }


    public function get(){

        return $this->db->get("students")->result();     

    }


}