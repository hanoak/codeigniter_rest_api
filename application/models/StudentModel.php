<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentModel extends CI_Model {

    public function __construct(){

        $this->load->database();

    }

    public function save($data, $id = 0){

        if($id == 0){
            $this->db->insert("students", $data);
        } else{
            $this->db->where("id", $id)->update("students", $data);
        }

    }

    public function get($id){

        if($id == 0){
            return $this->db->get("students")->result();
        } else{
            return $this->db->where('id', $id)->get("students")->result();
        }       

    }

    public function delete($id){

        $this->db->where("id", $id)->delete("students");

    }

}