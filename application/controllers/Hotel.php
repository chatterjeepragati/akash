<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Hotel extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('customer_model');
        $this->load->model('hotel_model');
        $this->isLoggedIn();   
    }


    public function index(){
        $this->global['pageTitle'] = 'Travel Book : Hotels';

        $data['hotels']     = $this->hotel_model->getData();
        $data['room_types'] = $this->hotel_model->get_room_types();

        if(!empty($this->input->post())){
            $search_data['room_types']          = $this->input->post('room_types');
            $search_data['parking_available']   = $this->input->post('parking_available');
            $search_data['star_rating']         = $this->input->post('star_rating');

            $data['hotels']     = $this->hotel_model->advance_search($search_data);
        }

        $this->loadViews("hotel/index", $this->global, $data , NULL);

    }

    public function add(){
        
        $this->global['pageTitle'] = 'Travel Book : Add Hotel';

        $data['regions'] = $this->hotel_model->get_region();
        $data['room_types'] = $this->hotel_model->get_room_types();

        $this->load->library('form_validation');
        if(!empty($this->input->post())){
            
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            // $this->form_validation->set_rules('phone', 'Phone', 'callback_phone_check');

            if ($this->form_validation->run() == TRUE){
                $postedData     = $this->input->post();

                $room_types     = $this->input->post('room_types');
                // echo "<pre>";
                // print_r($postedData); exit;
                unset($postedData['room_types']);
                $postedData['phone_no']  = implode(',',$this->input->post('phone_no'));
                $postedData['created']  = date('Y-m-d H:i:s');
                $this->db->insert('hotels',$postedData);

                $hotel_id = $this->db->insert_id();

                foreach($room_types as $room_type){
                    $map_data = [];
                    $map_data['hotel_id']       = $hotel_id;
                    $map_data['room_type_id']   = $room_type;
                    $this->db->insert('hotels_room_types_map',$map_data);
                }

                $this->session->set_flashdata('success', 'New Hotel added successfully');
                redirect('hotel');
            } 
        }

        $this->loadViews("hotel/add", $this->global, $data , NULL);
    }


    public function edit($id){
        
        $this->global['pageTitle'] = 'Travel Book : Add Hotel';

        $data['regions']            = $this->hotel_model->get_region();
        $data['room_types']         = $this->hotel_model->get_room_types();
        $hotel                      = $this->hotel_model->getData(['h.id'=>$id]);
        $data['hotel']              = $hotel[0];
        $data['hotel']['phone_no']  = explode(',',$data['hotel']['phone_no']);
        $data['hotel']['roomTypes'] = array_column($data['hotel']['roomTypes'],'name');
        // $this->pr($data);
        $this->load->library('form_validation');
        $this->load->helper('form');


        if(!empty($this->input->post())){
            
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            // $this->form_validation->set_rules('phone', 'Phone', 'callback_phone_check');
            $this->form_validation->set_rules('star_rating', 'Star Rating', '');

            if ($this->form_validation->run() == TRUE){
                $postedData     = $this->input->post();

                $room_types     = $this->input->post('room_types');
                $hotel_id       = $this->input->post('id');
                // echo "<pre>";
                // print_r($postedData); exit;
                unset($postedData['room_types']);
                unset($postedData['id']);
                $postedData['phone_no']     = implode(',',$this->input->post('phone_no'));

                $this->db->where('id',$hotel_id);
                $this->db->update('hotels',$postedData);

                $this->db->delete('hotels_room_types_map',['hotel_id'=>$hotel_id]);
                foreach($room_types as $room_type){
                    $map_data = [];
                    $map_data['hotel_id']       = $hotel_id;
                    $map_data['room_type_id']   = $room_type;
                    $this->db->insert('hotels_room_types_map',$map_data);
                }

                $this->session->set_flashdata('success', 'Hotel Updated successfully');
                redirect('hotel');
            } 
        }

        $this->loadViews("hotel/edit", $this->global, $data , NULL);
    }

    public function phone_check(){
        $phone = $this->input->post('phone_no');
        $cond = ['phone_no'=> $phone];
        $result = $this->customer_model->getData($cond);
        if(count($result) > 0){
            $this->form_validation->set_message('phone_check', 'The {field} field can not be duplicate');
            return false;
        }
        return true;
    }

    public function deleteRow(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->delete('hotels');

        $this->db->delete('hotels_room_types_map',['hotel_id'=>$id]);
        return true;
    }
}