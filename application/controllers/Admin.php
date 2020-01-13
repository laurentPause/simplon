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

	/**Pages *********************************************************/

	public function index()
	{
		$data = array(
			'title' => 'Postes',
			'data' => $this->poste->get_all()
		);
		
		$this->load_views('admin/accueil',$data);	
	}

	public function users()
	{
		$data = array(
			'title' => 'Ajouter un utilisateur',
			'script' => $this->load_script('user')
		);
		$this->load_views('admin/user',$data);

	}

	public function postes()
	{
		$data = array(
			'title' => 'Postes',
			'script' => $this->load_script('poste')
		);
		$this->load_views('admin/poste',$data);

	}
	
	public function attributions()
	{
		$data = array(
			'title' => 'Attributions des postes'
		);
		$this->load_views('admin/attri',$data);

	}

	/**Database******************************************************* */
	
	public function list_user()
	{
		$users = $this->user->get_all();
		$data['data'] = $users;
		$this->out_json($data);
	}

	public function add_user()
	{
		$data = [
            'nom'     => $this->input->post('nom'),
            'prenom'    => $this->input->post('prenom'),
            'email'     => $this->input->post('email')
		];
		
		$this->user->add($data);

	}

	public function list_poste()
	{
		$postes = $this->poste->get_all();
		$data['data'] = $postes;
		$this->out_json($data);
	}

	/**function *********************************************************/

	private function load_views($view,$data)
	{
		$this->load->view('admin/header',$data);
		$this->load->view('admin/menu');
		$this->load->view($view);
		$this->load->view('admin/footer');
	}

	private function out_json($data)
	{
		$this->output
                        ->set_status_header(200)
                        ->set_content_type('application/json', 'utf-8')
                        ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}

	private function load_script($script)
	{
		return base_url('inc/js/').$script.'.js';
	}

}
