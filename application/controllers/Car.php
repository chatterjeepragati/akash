<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Car extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('car_model');
        $this->isLoggedIn();   
    }


    public function index(){
        $this->global['pageTitle'] = 'Travel Book : Car Contacts';

        $data['contacts']     = $this->car_model->getContacts();

        $this->loadViews("car/index", $this->global, $data , NULL);

    }

    public function add(){
        
        $this->global['pageTitle'] = 'Travel Book : Add Car Contacts';

        $data['models'] = $this->car_model->get_car_models();

        $this->load->library('form_validation');
        if(!empty($this->input->post())){
            
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone', 'callback_phone_check');

            if ($this->form_validation->run() == TRUE){
                $postedData     = $this->input->post();

                $postedData['phone_no']     = implode(',',$this->input->post('phone_no'));
                $postedData['models']       = implode(',',$this->input->post('models'));
                $postedData['created']      = date('Y-m-d H:i:s');
                $this->db->insert('car_contacts',$postedData);

                $this->session->set_flashdata('success', 'New Car Conatct Added Successfully');
                redirect('car');
            } 
        }

        $this->loadViews("car/add", $this->global, $data , NULL);
    }


    public function edit($id){
        
        $this->global['pageTitle'] = 'Travel Book : Edit Car Contacts';

        $data['models']                 = $this->car_model->get_car_models();
        $contacts                       = $this->car_model->getContacts(['id'=>$id]);
        $data['contacts']               = $contacts[0];
        $data['contacts']['phone_no']   = explode(',',$data['contacts']['phone_no']);
        $data['contacts']['models']     = explode(',',$data['contacts']['models']);
        // $this->pr($data);
        $this->load->library('form_validation');
        $this->load->helper('form');


        if(!empty($this->input->post())){
            
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone', 'callback_phone_check');

            if ($this->form_validation->run() == TRUE){
                $postedData     = $this->input->post();

                $postedData['models']   = implode(',',$this->input->post('models'));
                $contact_id     = $this->input->post('id');
                // echo "<pre>";
                // print_r($postedData); exit;
                unset($postedData['id']);
                $postedData['phone_no']     = implode(',',$this->input->post('phone_no'));

                $this->db->where('id',$contact_id);
                $this->db->update('car_contacts',$postedData);

                $this->session->set_flashdata('success', 'Car Contact Updated successfully');
                redirect('car');
            } 
        }

        $this->loadViews("car/edit", $this->global, $data , NULL);
    }

    public function phone_check(){
        $id = 0;
        if(!empty($this->input->post('id'))){
            $id = $this->input->post('id');
        }

        $phone = $this->input->post('phone_no');
        // $cond = ['phone_no'=> $phone];
        $result = $this->car_model->getDataIn('phone_no',$phone);
        $dbId = NULL;
        if(!empty($result)){
            $dbId = $result[0]['id'];
        }
        if(count($result) > 0 && ($id != $dbId)){
            $this->form_validation->set_message('phone_check', 'The {field} field can not be duplicate');
            return false;
        }
        return true;
    }

    public function deleteRow(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->delete('car_contacts');
        return true;
    }
}