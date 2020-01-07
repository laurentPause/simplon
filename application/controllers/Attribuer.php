<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attribuer extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		
        $this->load->model('attribuer_model', 'attribuer');
    }

	public function index()
	{
		$this->load->view('admin');
	}
}
