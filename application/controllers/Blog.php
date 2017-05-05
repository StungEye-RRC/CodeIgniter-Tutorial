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
		$this->load->view('blog/index', $data);
	}

	public function show($permalink) // This $id is the $1 from the route
	{
		$data['blog'] = $this->blog_model->by_permalink($permalink);

		if (empty($data['blog']))
    {
      show_404();
    }

		$this->load->view('blog/show', $data);
	}
}
