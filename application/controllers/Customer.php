<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Customer extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('customer_model');
        $this->isLoggedIn();   
    }


    public function index(){
        $this->global['pageTitle'] = 'Travel Book : Customers';

        $data['customers'] = $this->customer_model->getData();

        $this->loadViews("customer/index", $this->global, $data , NULL);

    }

    public function add(){
        
        $this->global['pageTitle'] = 'Travel Book : Add Customer';

        $this->load->library('form_validation');
        if(!empty($this->input->post())){
            
            // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[customers.email]');
            $this->form_validation->set_rules('phone', 'Phone', 'callback_phone_check');

            if ($this->form_validation->run() == TRUE){
                $postedData     = $this->input->post();

                $postedData['spouse_mobile']    = implode(',',$this->input->post('spouse_mobile'));
                $postedData['phone_no']         = implode(',',$this->input->post('phone_no'));
                $birthday                       = $this->input->post('birthday');
                $spouse_birthday                = $this->input->post('spouse_birthday');
                $aniversary                     = $this->input->post('aniversary');
                $child_1_birthday               = $this->input->post('child_1_birthday');
                $child_2_birthday               = $this->input->post('child_2_birthday');
                
                
                
                
                if(!empty($birthday)){
                    $birthdayA                      = explode('/',$birthday);
                    $postedData['birthday']         = $birthdayA[2].'-'.$birthdayA[1].'-'.$birthdayA[0];
                }
                if(!empty($spouse_birthday)){
                    $spouse_birthdayA               = explode('/',$spouse_birthday);
                    $postedData['spouse_birthday']  = $spouse_birthdayA[2].'-'.$spouse_birthdayA[1].'-'.$spouse_birthdayA[0];
                }
                if(!empty($aniversary)){
                    $aniversaryA                    = explode('/',$aniversary);
                    $postedData['aniversary']       = $aniversaryA[2].'-'.$aniversaryA[1].'-'.$aniversaryA[0];
                }
                if(!empty($child_1_birthday)){
                    $chield_1_birthdayA             = explode('/',$child_1_birthday);
                    $postedData['child_1_birthday'] = $chield_1_birthdayA[2].'-'.$chield_1_birthdayA[1].'-'.$chield_1_birthdayA[0];
                }
                if(!empty($child_2_birthday)){
                    $chield_2_birthdayA             = explode('/',$child_2_birthday);
                    $postedData['child_2_birthday'] = $chield_2_birthdayA[2].'-'.$chield_2_birthdayA[1].'-'.$chield_2_birthdayA[0];
                }

                
               
                
                

                $postedData['created']          = date('Y-m-d H:i:s');

                $this->db->insert('customers',$postedData);

                $this->session->set_flashdata('success', 'New customer added successfully');
                redirect('customer');
            } 
        }

        $this->loadViews("customer/add", $this->global, NULL , NULL);
    }


    public function edit($id){
        $this->global['pageTitle'] = 'Travel Book : Edit Customer';
        $this->load->library('form_validation');
        $customer = $this->customer_model->getData(['id'=>$id]);
        $data['customer']                       = $customer[0];
        $data['customer']['phone_no']           = explode(',',$customer[0]['phone_no']);
        $data['customer']['spouse_mobile']      = explode(',',$customer[0]['spouse_mobile']);
        $data['customer']['birthday']           = $customer[0]['birthday']; //date('d/m/Y', strtotime($customer[0]['birthday']));
        $data['customer']['spouse_birthday']    = $customer[0]['spouse_birthday']; //is_null($customer[0]['spouse_birthday']) ? '' : date('d/m/Y', strtotime($customer[0]['spouse_birthday']));
        $data['customer']['aniversary']         = $customer[0]['aniversary']; //is_null($customer[0]['aniversary']) ? '' : date('d/m/Y', strtotime($customer[0]['aniversary']));
        $data['customer']['child_1_birthday']  = $customer[0]['child_1_birthday'];//is_null($customer[0]['child_1_birthday']) ? '' : date('d/m/Y', strtotime($customer[0]['child_1_birthday']));
        $data['customer']['child_2_birthday']  = $customer[0]['child_2_birthday'];//is_null($customer[0]['child_2_birthday']) ? '' : date('d/m/Y', strtotime($customer[0]['child_2_birthday']));
        // $this->pr($data);

        if(!empty($this->input->post())){
            
            // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[customers.email]');
            $this->form_validation->set_rules('phone', 'Phone', 'callback_phone_check');

            if ($this->form_validation->run() == TRUE){
                $postedData     = $this->input->post();
                $id     = $this->input->post('id');
                unset($postedData['id']);

                $postedData['spouse_mobile']    = implode(',',$this->input->post('spouse_mobile'));
                $postedData['phone_no']         = implode(',',$this->input->post('phone_no'));
                $birthday                       = $this->input->post('birthday');
                $spouse_birthday                = $this->input->post('spouse_birthday');
                $aniversary                     = $this->input->post('aniversary');
                $child_1_birthday              = $this->input->post('child_1_birthday');
                $child_2_birthday              = $this->input->post('child_2_birthday');
                
                // $birthdayA                      = explode('/',$birthday);
                // $spouse_birthdayA               = explode('/',$spouse_birthday);
                // $aniversaryA                    = explode('/',$aniversary);
                // $child_1_birthdayA              = explode('/',$child_1_birthday);
                // $child_2_birthdayA              = explode('/',$child_2_birthday);

                // $postedData['birthday']         = $birthdayA[2].'-'.$birthdayA[1].'-'.$birthdayA[0];
                // $postedData['spouse_birthday']  = $spouse_birthdayA[2].'-'.$spouse_birthdayA[1].'-'.$spouse_birthdayA[0];
                // $postedData['aniversary']       = $aniversaryA[2].'-'.$aniversaryA[1].'-'.$aniversaryA[0];
                // $postedData['child_1_birthday'] = $child_1_birthdayA[2].'-'.$child_1_birthdayA[1].'-'.$child_1_birthdayA[0];
                // $postedData['child_2_birthday'] = $child_2_birthdayA[2].'-'.$child_2_birthdayA[1].'-'.$child_2_birthdayA[0];

                if(!empty($birthday)){
                    $birthdayA                      = explode('/',$birthday);
                    $postedData['birthday']         = $birthdayA[2].'-'.$birthdayA[1].'-'.$birthdayA[0];
                }
                if(!empty($spouse_birthday)){
                    $spouse_birthdayA               = explode('/',$spouse_birthday);
                    $postedData['spouse_birthday']  = $spouse_birthdayA[2].'-'.$spouse_birthdayA[1].'-'.$spouse_birthdayA[0];
                }
                if(!empty($aniversary)){
                    $aniversaryA                    = explode('/',$aniversary);
                    $postedData['aniversary']       = $aniversaryA[2].'-'.$aniversaryA[1].'-'.$aniversaryA[0];
                }
                if(!empty($child_1_birthday)){
                    $chield_1_birthdayA             = explode('/',$child_1_birthday);
                    $postedData['child_1_birthday'] = $chield_1_birthdayA[2].'-'.$chield_1_birthdayA[1].'-'.$chield_1_birthdayA[0];
                }
                if(!empty($child_2_birthday)){
                    $chield_2_birthdayA             = explode('/',$child_2_birthday);
                    $postedData['child_2_birthday'] = $chield_2_birthdayA[2].'-'.$chield_2_birthdayA[1].'-'.$chield_2_birthdayA[0];
                }

                $this->db->where('id',$id);
                $this->db->update('customers',$postedData);

                $this->session->set_flashdata('success', 'Customer Updated successfully');
                redirect('customer');
            } 
        }

        $this->loadViews("customer/edit", $this->global, $data , NULL);
    }

    public function phone_check(){
        $id = 0;
        if(!empty($this->input->post('id'))){
            $id = $this->input->post('id');
        }
        $phone = $this->input->post('phone_no');
        
        // $cond = ['phone_no'=> $phone];
        $result = $this->customer_model->getDataIn('phone_no', $phone);
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

    public function addCustomer(){

        $postedData = $this->input->post();
        
        $this->db->insert('customers',$postedData);
        $this->session->set_flashdata('success', 'New customer added successfully');

        redirect('customer/add');
        $this->pr();
    }

    public function deleteRow(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->delete('customers');
        return true;
    }
}