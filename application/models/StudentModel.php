<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends CI_Model {

    public function __construct(){

        $this->load->database();

    }


    public function get($id){

        if($id == 0){
            return $this->db->get("students")->result();
        } else{
            return $this->db->where('id', $id)->get("students")->result();
        }       

    }


}