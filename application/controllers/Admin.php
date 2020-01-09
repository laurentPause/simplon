<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
		parent::__construct();

		$this->load->model('poste_model', 'poste');
		
		$this->load->helper('url');
		$this->load->helper('path');

    }

	public function index()
	{
		$is_login = $this->verif_login();

		if($is_login){
			$data = array(
				'title' => 'Postes',
				'data' => $this->poste->get_all()
			);
			$this->load_views('admin/accueil',$data);
			
		}else{
			$this->load->view('login');
		}
		
	}

	public function voir_utilisateurs()
	{
		$data = array();
		$this->load_views('admin/user/read_all',$data);

	}

	public function ajout_utilisateurs()
	{
		$data = array(
			'title' => 'Ajout Utilisateur'
		);
		$this->load_views('admin/user/add',$data);

	}

	private function load_views($view,$data)
	{
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu');
		$this->load->view($view);
		$this->load->view('admin/footer');
	}

	private function  verif_login()
	{
		return true;
	}

}
