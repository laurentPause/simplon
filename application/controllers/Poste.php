<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poste extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		
        $this->load->model('poste_model', 'poste');
	}
	
	public function index()
	{
		$this->load->view('admin');
	}

	public function list_poste()
	{
		$postes = $this->poste->get_all();
		return $postes;
		
	}
}
