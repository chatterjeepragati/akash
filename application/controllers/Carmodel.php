<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Carmodel extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('car_model');
        $this->isLoggedIn();   
    }


    public function index(){
        $this->global['pageTitle'] = 'Travel Book : Car Models';

        $data['models'] = $this->car_model->get_car_models();

        $this->loadViews("carmodel/index", $this->global, $data , NULL);

    }

    public function add(){
        
        $this->global['pageTitle'] = 'Travel Book : Add Car Models';

        $data['models'] = $this->car_model->get_car_models();

        $this->load->library('form_validation');
        if(!empty($this->input->post())){
            
            $this->form_validation->set_rules('model', 'Name', 'trim|required');
            $this->form_validation->set_rules('no_of_seat', 'No Of Seat', 'required');

            if ($this->form_validation->run() == TRUE){
                $postedData     = $this->input->post();

                $postedData['created']      = date('Y-m-d H:i:s');
                $this->db->insert('cars',$postedData);

                $this->session->set_flashdata('success', 'New Car Model Added Successfully');
                redirect('carmodel');
            } 
        }

        $this->loadViews("carmodel/add", $this->global, $data , NULL);
    }



    public function deleteRow(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->delete('cars');
        return true;
    }
}