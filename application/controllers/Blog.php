<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('blog_model');
	}

	public function index()
	{
		$data['title'] = 'All Blog Posts';
		$data['blogs'] = $this->blog_model->all_posts();
		$this->load->view('blog/index', $data);
	}
}
