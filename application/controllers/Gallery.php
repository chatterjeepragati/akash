<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Gallery extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('gallery_model');
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
               
        $searchText = $this->security->xss_clean($this->input->post('searchText'));
        $data['description'] = $searchText;
        
        $this->load->library('pagination');
        
        //$count = $this->gallery_model->listItems($searchText);

        //$returns = $this->paginationCompress ( "userListing/", $count, 10 );
        
        $data['userRecords'] = $this->gallery_model->listItems($searchText);
        
        $this->global['pageTitle'] = ' :: Gallery Listing';
        
        $this->loadViews("gallery", $this->global, $data, NULL);
        
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
       
        $this->load->model('news_model');
        $data['roles'] = [];//$this->_model->getUserRoles();
        
        $this->global['pageTitle'] = ' :: Add New Images';

         
        $this->loadViews("gallery/addNew", $this->global, $data, NULL);
        

        // $this->loadViews("gallery/addNew", $this->global, $data, NULL);
        
    }


    public function resizeImage($filename)
   {
      $source_path = './gallery/' . $filename;
      $target_path = './gallery/thumbnail/';
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => TRUE,
          'thumb_marker' => '', //add text with image name for identification.
          'width' => 150,
          'height' => 150
      );


      $this->load->library('image_lib', $config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      }


      $this->image_lib->clear();
   }

    public function do_upload(){
        $config = array(
            'upload_path' => "./gallery/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
        );
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('images'))
        {
        
            $data['error'] = $this->upload->display_errors();
            // echo "<pre>";
            // print_r($_FILES);
            // print_r($data); exit;
            // $this->loadViews("gallery/addNew", $this->global, $data, NULL);
            $this->session->set_flashdata('error', $data['error']);
        } else {
            //echo "<pre>";
            $imageDetails = $this->upload->data();
            $data['file_name'] = $imageDetails['file_name'];
            $this->resizeImage($imageDetails['file_name']);

            $db['description']  = $this->input->post('heading');
            $db['image']        = $data['file_name'];
            $db['created_on']   = date('Y-m-d H:i:s');
            $this->db->insert('tbl_gallery',$db);
            $this->session->set_flashdata('success', 'Gallery added successfully');
        }
        redirect('gallery/addNew');
    }

    
    
    


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function delete($id)
    {
        if($id != ''){
            $cond = ['id' => $id ];
            $row = $this->gallery_model->listItems($cond);
            // echo "<pre>";
            // print_r($row);
            $imageName = $row[0]->image;
            $imagePath = 'gallery/'.$imageName;
            $imagePathThumb = 'gallery/thumbnail/'.$imageName;
            if(unlink($imagePath)){
                unlink($imagePathThumb);
                $this->gallery_model->delete($cond);
                $this->session->set_flashdata('success', 'Gallery item Deleted successfully');
            } else {
                echo $imagePath."@@ unable to delete file"; exit;
            }
        }
        redirect('gallery/index');        
        
    }
    
    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = 'CodeInsect : 404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }

    
}

?>