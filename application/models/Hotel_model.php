<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


class Hotel_model extends CI_Model
{
    public function getData($cond=[]){
        $this->db->select('h.*, gr.name as gr_name')->from('hotels as h');
        $this->db->join('geographical_region gr','gr.id = h.region');
        // $this->db->join('hotels_room_types_map map','h.id = map.hotel_id','left');
        $this->db->where($cond);
        $query = $this->db->get();
        $hotels = $query->result_array();
        
        $hotle_details = [];
        foreach($hotels as $hotel){
            $hotelId = $hotel['id'];
            $this->db->select('rt.name')->from('hotels_room_types_map map');
            $this->db->join('room_types rt','rt.id = map.room_type_id');
            $this->db->where(['map.hotel_id'=>$hotelId]);
            $sub_query = $this->db->get();
            $roomTypes = $sub_query->result_array();
            $hotel['roomTypes'] = $roomTypes;
            $hotle_details[] = $hotel;
        }
        return $hotle_details;
    }

    public function getCount($cond=[]){
        $this->db->where($cond);
        $this->db->from('hotels');
        return $this->db->count_all_results();
    }

    public function get_region($cond=[]){
        $this->db->select('*')->from('geographical_region');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_room_types($cond=[]){
        $this->db->select('*')->from('room_types');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_hotel_room_types($cond=[]){
        $this->db->select('room_types.name as name, room_types.id as id')->from('room_types');
        $this->db->join('hotels_room_types_map as map', 'map.hotel_id = hotels.id');
        $this->db->where($cond);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function advance_search($search_data){
        
        $room_types         = $search_data['room_types'];
        $parking_available  = $search_data['parking_available'];
        $star_rating        = $search_data['star_rating'];
        $this->db->select('h.*, gr.name as gr_name')->from('hotels as h');
        $this->db->join('geographical_region gr','gr.id = h.region');
        $this->db->join('hotels_room_types_map map','h.id = map.hotel_id','left');
        if(!empty($room_types)){
            $this->db->where_in('map.room_type_id',$room_types);
        }
        if(!empty($parking_available)){
            $this->db->where(['h.parking_available'=>$parking_available]);
        }
        if(!empty($star_rating)){
            $this->db->where(['h.star_rating'=>$star_rating]);
        }
        $this->db->group_by('h.id'); 
        $query = $this->db->get();
        $hotels = $query->result_array();
        
        $hotle_details = [];
        foreach($hotels as $hotel){
            $hotelId = $hotel['id'];
            $this->db->select('rt.name')->from('hotels_room_types_map map');
            $this->db->join('room_types rt','rt.id = map.room_type_id');
            $this->db->where(['map.hotel_id'=>$hotelId]);
            $sub_query = $this->db->get();
            $roomTypes = $sub_query->result_array();
            $hotel['roomTypes'] = $roomTypes;
            $hotle_details[] = $hotel;
        }
        return $hotle_details;
    }
}