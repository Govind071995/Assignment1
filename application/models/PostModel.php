<?php
class PostModel extends CI_Model{
    
    public function get_posts(){
        $this->db->select("id, post_id, page_id, title, description, image_url, likes, comment_counts, published_date");
        
        $this->db->from('post_details');

        $this->db->where('page_id','208708862489818');
        
        $this->db->where('comment_counts >=', 10);
        
        $this->db->order_by('likes','asc');

        $this->db->limit(20);    //HERE YOU AN CHANGE THE POST COUNT LIKE PUT 10 OR 20 INSTEAD 5     
        
        $query = $this->db->get();
        
        return $query->result();
    }

    public function update_post($page_id) 
    {
        $data=array(
            'title' => $this->input->post('title'),
            'description'=> $this->input->post('description')
        );
        if($page_id==0){
            return $this->db->insert('post_details',$data);
        }else{
            $this->db->where('page_id',$page_id);
            return $this->db->update('post_details',$data);
        }        
    }
}
?>