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

	public function show($permalink) // This $id is the $1 from the route
	{
    $data['blog'] = $this->blog_model->by_permalink($permalink);
    $data['title'] = $data['blog']['title'];

		if (empty($data['blog']))
    {
      show_404();
    }

		$this->load->view('layouts/header', $data);
		$this->load->view('blog/show', $data);
		$this->load->view('layouts/footer', $data);
	}

	public function create()
	{
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
