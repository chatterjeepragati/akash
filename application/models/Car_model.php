<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Car_model extends CI_Model
{
    public function getContacts($cond=[]){
        $this->db->select('*')->from('car_contacts');
        $this->db->where($cond);
        $query = $this->db->get();
        $results = $query->result_array();
        return $results;
    }

    public function getDataIn($field,$array=[]){
        $this->db->select('*')->from('car_contacts');
        $this->db->where_in($field,$array);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCount($cond=[]){
        $this->db->where($cond);
        $this->db->from('car_contacts');
        return $this->db->count_all_results();
    }

    public function get_car_models($cond=[]){
        $this->db->select('*')->from('cars');
        $this->db->where($cond);
        $this->db->order_by('model');
        $query = $this->db->get();
        return $query->result_array();
    }

    
}