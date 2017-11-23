<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Posts extends CI_Controller {

  public function index(){

    $this->load->view('login');
  }


  public function fblogin(){
        $fb = new Facebook\Facebook([
              'app_id' => '135972383840498',
              'app_secret' => '56c6748475359b925da13e567a40b3f3',
              'default_graph_version' => 'v2.11',
            ]);


       $permissions = ['user_posts']; 
       $helper = $fb->getRedirectLoginHelper();
       $loginUrl = $helper->getLoginUrl('http://localhost/Loginform/index/Post/fbcallback', $permissions);

       header("location: ".$loginUrl);
}

public function fbcallback(){

        $fb = new Facebook\Facebook([
        'app_id' => '135972383840498',
        'app_secret' => '56c6748475359b925da13e567a40b3f3',
        'default_graph_version' => 'v2.11',
        ]);
        
        $accessToken = $helper->getAccessToken(); 

  if (isset($accessToken)) {

            $url = $fb->get('/me?fields=posts{id,parent_id,message,description,permalink_url,likes,comments{comment_count},is_published}', $accessToken);

            $headers = array("Content-type: application/json");


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
            curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_4) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.155 Safari/537.22");

            $st = curl_exec($ch);
            $result = json_decode($st, TRUE);
            $data = $result['posts']['data'];
//this will print edge graph of selected posts

            // echo "<pre>";
            // var_dump($result);
            // echo "<pre>";


//this will print or echo all selected post data, So if you want see this uncomment below code
              // foreach ($data as $item) {
              //   echo $item['id']."<br>";
              //   echo $item['parent_id']."<br>";
              //   echo $item['message']."<br>";
              //   echo $item['description']."<br>";
              //   echo $item['permalink_url']."<br>";
              //   echo $item['likes']."<br>";
              //   echo $item['comment_count']."<br>";
              //   echo $item['is_published']->format('d/m/Y')."<br>";
              // }

//To store your posts into database uncomment this block  
            foreach ($data as $item) {

              $post_data = array('post_id' => $item['id'],
                            'page_id' => $item['parent_id'],
                            'title' => $item['message'],
                            'description' => $item['description'],
                            'image_url' => $item['permalink_url'],
                            'comment_counts' => $item['likes'],
                            'likes' => $item['comment_count'],
                            'Published_date' => $item['is_published']
                           );

                          $this->db->insert('posts_details',$post_data);

                }
  } else {
      $this->load->view('list');
  }

  }
}
?>