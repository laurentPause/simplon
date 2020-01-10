<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
		parent::__construct();

		$this->load->model('poste_model', 'poste');
		$this->load->model('user_model', 'user');
		
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

	public function users()
	{
		$data = array(
			'title' => 'Ajout Utilisateur'
		);
		$this->load_views('admin/user',$data);

	}

	private function load_views($view,$data)
	{
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu');
		$this->load->view($view);
		$this->load->view('admin/footer');
	}
	
	public function list_user()
	{
		$users = $this->user->get_all();
		$data['data'] = $users;
		$this->output
                        ->set_status_header(200)
                        ->set_content_type('application/json', 'utf-8')
                        ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}

	public function add_user()
	{
		$data = [
            'nom'     => $this->input->post('nom'),
            'prenom'    => $this->input->post('prenom'),
            'email'     => $this->input->post('email')
		];
		
		$this->user->add($data);

		$this->output
                        ->set_status_header(200)
                        ->set_content_type('application/json', 'utf-8')
                        ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}

	private function  verif_login()
	{
		return true;
	}

}
