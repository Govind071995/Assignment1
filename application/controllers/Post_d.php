<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Post_d extends CI_Controller {
   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {
    //load database in autoload libraries 
      parent::__construct(); 
      $this->load->model('PostModel');         
   }
   public function index()
   {
       $products=new PostModel;
       $data['data']=$products->get_posts();
       $this->load->view('list',$data);
   }
   
   /**
    * Edit Data from this method.
    *
    * @return Response
   */
   public function edit($page_id)
   {
       $posts = $this->db->get_where('post_details', array('page_id' => $page_id))->row();
       $this->load->view('edit',array('post_d'=>$posts));
   }
   /**
    * Update Data from this method.
    *
    * @return Response
   */
   public function update($page_id)
   {
       $products=new PostModel;
       $products->update_post($page_id);
       redirect(base_url('index.php/post_d'));
   }
   /**
    * Delete Data from this method.
    *
    * @return Response
   */
   public function delete($page_id)
   {
       $this->db->where('page_id', $page_id);
       $this->db->delete('post_details');
       redirect(base_url('index.php/post_d'));
   }
}