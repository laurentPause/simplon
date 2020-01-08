<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
		parent::__construct();

        $this->load->model('poste_model', 'poste');

    }

	public function index()
	{
		$is_login = $this->verif_login();

		if($is_login){
			$data = array(
				'title' => 'Postes',
				'postes' => $this->poste->get_all()
			);
			$this->load->view('admin',$data);
		}else{
			$this->load->view('login');
		}
		
	}

	private function  verif_login()
	{
		return true;
	}

}
