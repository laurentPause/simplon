<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
		parent::__construct();

		$this->load->helper('form');
    }

	public function index()
	{
		$is_login = $this->verif_login();

		if($is_login){
			$this->load->view('admin');
		}else{
			$this->load->view('login');
		}
		
	}

	private function  verif_login(){
		return false;
	}

	public function login(){
		echo 'pika';
	}
}
