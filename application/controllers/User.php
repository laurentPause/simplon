<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		
		$this->load->model('user_model', 'user');
		
		$this->load->helper('url');

		$this->load->helper('path');


    }
	public function index()
	{
		$this->load->view('admin');
	}

	public function add()
	{
		$data = array(
			'title' => 'Ajouter un utilisateur',
			'content'=> 'test'
		);
		
		$this->load->view('admin',$data);
	}
}
