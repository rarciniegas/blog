<?php
  class Posts extends CI_Controller{
    public function index(){

      $data['title'] = 'Latest Posts'; 
      $data['posts'] = $this->post_model->get_posts();
      $this->load->view('templates/header'); 
      $this->load->view('posts/index', $data); 
      $this->load->view('templates/footer'); 
    }

    public function view($slug = NULL){
			$data['post'] = $this->post_model->get_posts($slug);
	
			if(empty($data['post'])){
				show_404();
			}
			$data['title'] = $data['post']['title'];
			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
    }
    
    public function create(){

      $data['title'] = 'Create Post';
      $data['categories'] = $this->post_model->get_categories();
      
      $this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');
      
      if($this->form_validation->run() === FALSE){
        $this->load->view('templates/header');
			  $this->load->view('posts/create', $data);
			  $this->load->view('templates/footer');
		  } else {
        // Upload image
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());

        }
        else
        {
          $data = array('upload_data' => $this->upload->data());
          $config['image_library'] = 'gd2';
          $config['source_image'] = $data['upload_data']['full_path'];
          $config['create_thumb'] = TRUE;
          $config['maintain_ratio'] = TRUE;
          $config['width']         = 200;
          $config['height']       = 200;

          $this->load->library('image_lib', $config);

          if ( ! $this->image_lib->resize($data))
          {
            echo $this->image_lib->display_errors();
          }
          else{
            $imgdata = file_get_contents($data['upload_data']['full_path']);
          }
                        
        }

        $this->post_model->create_post($imgdata);
        redirect('posts');
      }
    }

    public function delete($id){

			$this->post_model->delete_post($id);
			redirect('posts');
    }
    
    public function edit($slug){
      $data['post'] = $this->post_model->get_posts($slug);
      $data['categories'] = $this->post_model->get_categories();
	
			if(empty($data['post'])){
				show_404();
			}
			$data['title'] = 'Edit Post';
			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
    }

    public function update(){
      $this->post_model->update_post();
      redirect('posts');
    }
  }