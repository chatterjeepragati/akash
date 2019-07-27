<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class News extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    /*public function index()
    {
        $this->global['pageTitle'] = 'CodeInsect : Dashboard';
        
        $this->loadViews("dashboard", $this->global, NULL , NULL);
    }*/
    
    /**
     * This function is used to load the user list
     */
    function index()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->news_model->newsListingCount($searchText);

			$returns = $this->paginationCompress ( "userListing/", $count, 10 );
            
            $data['userRecords'] = $this->news_model->newsListing($searchText, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = ' :: News Listing';
            
            $this->loadViews("news", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('news_model');
            $data['roles'] = [];//$this->_model->getUserRoles();
            
            $this->global['pageTitle'] = ' :: Add New News';

            $this->loadViews("news/addNew", $this->global, $data, NULL);
        }
    }

    
    
    /**
     * This function is used to add new user to the system
     */
    function addNewNews()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('heading','News Title','trim|required');
            $this->form_validation->set_rules('description','Description','trim|required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $heading = ucwords(strtolower($this->security->xss_clean($this->input->post('heading'))));
                $description = $this->security->xss_clean($this->input->post('description'));
                
                
                $userInfo = array('heading'=>$heading, 'description'=>$description,  'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
                
                $this->load->model('news_model');
                $result = $this->news_model->addNewNews($userInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New News created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'News creation failed');
                }
                
                redirect('news/addNew');
            }
        }
    }

    
    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            // $data['roles'] = $this->news_model->getUserRoles();
            $news = $this->news_model->details(['id'=>$userId]);
            $data['news'] = $news[0];
            // echo "<pre>";
            // print_r($data); exit;
            $this->global['pageTitle'] = 'Admin : Edit News';
            
            $this->loadViews("editOld", $this->global, $data, NULL);
        }
    }
    
    
    


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteNews()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->news_model->deleteNews($userId, $userInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
    
    

   

   

   

    

    
}

?>