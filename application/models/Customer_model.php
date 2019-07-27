<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Customer_model extends CI_Model
{
    public function getData($cond=[]){
        $this->db->select('*')->from('customers');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataIn($field,$array=[]){
        $this->db->select('*')->from('customers');
        $this->db->where_in($field,$array);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCount($cond=[]){
        $this->db->where($cond);
        $this->db->from('customers');
        return $this->db->count_all_results();
    }

    public function getBirthdays(){
        $sql = "SELECT * FROM `customers` WHERE DATE_FORMAT(birthday,'%m-%d') BETWEEN DATE_FORMAT(NOW(),'%m-%d') AND DATE_FORMAT(DATE_ADD(NOW(), INTERVAL 30 DAY),'%m-%d') OR  DATE_FORMAT(spouse_birthday,'%m-%d') BETWEEN DATE_FORMAT(NOW(),'%m-%d') AND DATE_FORMAT(DATE_ADD(NOW(), INTERVAL 30 DAY),'%m-%d') OR DATE_FORMAT(child_1_birthday,'%m-%d') BETWEEN DATE_FORMAT(NOW(),'%m-%d') AND DATE_FORMAT(DATE_ADD(NOW(), INTERVAL 30 DAY),'%m-%d') OR DATE_FORMAT(child_2_birthday,'%m-%d') BETWEEN DATE_FORMAT(NOW(),'%m-%d') AND DATE_FORMAT(DATE_ADD(NOW(), INTERVAL 30 DAY),'%m-%d')";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getCutomerBirthday(){
        $sql = "SELECT * 
        FROM  customers 
        WHERE  DATE_ADD(birthday, 
                        INTERVAL YEAR(CURDATE())-YEAR(birthday)
                                 + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(birthday),1,0)
                        YEAR)  
                    BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getSpouseBirthday(){
        $sql = "SELECT * 
        FROM  customers 
        WHERE  DATE_ADD(spouse_birthday, 
                        INTERVAL YEAR(CURDATE())-YEAR(spouse_birthday)
                                 + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(spouse_birthday),1,0)
                        YEAR)  
                    BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getChild1Birthday(){
        $sql = "SELECT * 
        FROM  customers 
        WHERE  DATE_ADD(child_1_birthday, 
                        INTERVAL YEAR(CURDATE())-YEAR(child_1_birthday)
                                 + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(child_1_birthday),1,0)
                        YEAR)  
                    BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getChild2Birthday(){
        $sql = "SELECT * 
        FROM  customers 
        WHERE  DATE_ADD(child_2_birthday, 
                        INTERVAL YEAR(CURDATE())-YEAR(child_2_birthday)
                                 + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(child_2_birthday),1,0)
                        YEAR)  
                    BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getAnniversaries(){
        $sql = "SELECT * 
        FROM  customers 
        WHERE  DATE_ADD(aniversary, 
                        INTERVAL YEAR(CURDATE())-YEAR(aniversary)
                                 + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(aniversary),1,0)
                        YEAR)  
                    BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY)";

        $query = $this->db->query($sql);
        return $query->result_array();
    }
}