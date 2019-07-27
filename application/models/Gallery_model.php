<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $table = 'tbl_gallery';
    }
   
    public function listItems($conditions=[]) {
        $this->db->select('*')->from('tbl_gallery');
        if(!empty($conditions)){
            $this->db->where($conditions);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function delete($cond){
        if(!empty($cond)){
            $this->db->where($cond);
            $this->db->delete('tbl_gallery');
        }
    }

    

}

  