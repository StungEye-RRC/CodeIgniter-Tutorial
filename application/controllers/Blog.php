<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('blog_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['title'] = 'All Blog Posts';
		$data['blogs'] = $this->blog_model->all_posts();
		$this->load->view('layouts/header', $data);
		$this->load->view('blog/index', $data);
		$this->load->view('layouts/footer', $data);
	}

	public function show($id, $permalink) // This $id is the $1 from the route
	{
		$this->load->helper('form');
    $data['blog'] = $this->blog_model->by_id_and_permalink($id, $permalink);

		if (empty($data['blog'])) {
      show_404();
    } else {
      $data['title'] = $data['blog']['title'];
    }

		$this->load->view('layouts/header', $data);
		$this->load->view('blog/show', $data);
		$this->load->view('layouts/footer', $data);
  }
  
  public function delete_blog($id) {
    $this->blog_model->delete_by_id($id);
    redirect(site_url());
  }

  // Displays a form for creating a new blog post.
	public function new_blog()
	{
		$this->load->helper('form');

    $data['title'] = "Create New Post";
    $data['blog']['title'] = '';
    $data['blog']['content'] = '';
    
    $this->load->view('layouts/header', $data);
    $this->load->view('blog/create', $data);
    $this->load->view('layouts/footer', $data);
  }
  

  // Creates the new POSTed blog post
  public function create() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = "Create New Post";
		$data['blog']['title'] = $this->input->post('title');
		$data['blog']['content'] = $this->input->post('content');

		$this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('content', 'Content', 'required');

    if ($this->form_validation->run() === FALSE)
    {
	    $this->load->view('layouts/header', $data);
      $this->load->view('blog/create', $data);
	    $this->load->view('layouts/footer', $data);
    }
    else
    {
			$this->blog_model->create_new_post();
			redirect(site_url());
    }
  }
}
