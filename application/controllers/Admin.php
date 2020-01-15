<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
		parent::__construct();

		$this->load->model('poste_model', 'poste');
		$this->load->model('user_model', 'user');
		$this->load->model('attribuer_model', 'attrib');
		
		$this->load->helper('url');
		$this->load->helper('path');
		$this->load->helper('date');

    }

	/**Pages *********************************************************/

	public function index()
	{
		$this->attributions();
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
			'title' => "Attribution d'un poste",
			'script' => $this->load_script('attribution'),
			'users' => $this->user->get_all(),
			'postes' => $this->poste->get_all()
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
		$msg = array(
			'title' => 'Réussi',
			'text' => 'Ajout d\' un utilisateur',
			'type' => 'success'
		);	
		
		$this->user->add($data);

		$this->out_json($msg);

	}

	public function list_poste()
	{
		$postes = $this->poste->get_all();
		$data['data'] = $postes;
		$this->out_json($data);
	}

	public function list_attrib()
	{
		$result = array();
		$attributions = $this->attrib->get_all();
		foreach($attributions as $attrib){
			$user = $this->user->get_by_id($attrib->id_user);
			$poste = $this->poste->get_by_id($attrib->id_poste);
			$statut = $this->get_statut_attib(
				$attrib->jour,
				$attrib->heure_deb,
				$attrib->heure_fin
			);

			$row = array(
				'user' => $user->nom.' '.$user->prenom,
				'poste' => $poste->lib,
				'day' => $attrib->jour,
				'creneau' => 'De '.$attrib->heure_deb.' à '.$attrib->heure_fin,
				'statut' => $statut,
				'action' => $this->btn_retirer(),
				'id_user' => $attrib->id_user,
				'id_poste' => $attrib->id_poste
			);
			array_push($result,$row);
		}
		
		$data['data'] = $result;
		
		$this->out_json($data);
	}

	public function add_attrib()
	{
		$data = [
            'id_user'     => $this->input->post('user'),
            'id_poste'    => $this->input->post('poste'),
            'jour'     => $this->input->post('jour'),
            'heure_deb'     => $this->input->post('heureDeb'),
            'heure_fin'     => $this->input->post('heureFin'),
		];
		$exist = $this->verif_if_exist($data['id_user'],$data['id_poste']);
		$ocuper = $this->verif_if_ocuper($data);
		if(!$ocuper){
			$msg = array(
				'title' => 'Sucess',
				'type' => 'success'
			);	
			if($exist != 0){
				$this->attrib->update($data);
				$msg['text'] = 'Mis à jour attribution';
			}else{
				$this->attrib->add($data);
				$msg['text'] = 'Ajout attribution';

			}
			$this->out_json($ocuper);

		}else{
			$msg = array(
				'title' => 'Erreur',
				'text' => 'Poste déja attribuer sur ce créneau',
				'type' => 'error'
			);	
		}
		$this->out_json($msg);
		
			
	}

	public function del_attrib()
	{
		$data = [
            'id_user'     => $this->input->post('user'),
            'id_poste'    => $this->input->post('poste')
		];
		$msg = array(
			'title' => 'Suppression',
			'text' => 'Attribution supprimer',
			'type' => 'success'
		);	
		$this->attrib->delete($data);
		$this->out_json($msg);
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

	private function get_statut_attib($jour,$heure_deb,$heure_fin)
	{
		$present = gmt_to_local(time(),'UP4');
		$time_deb_attrib = strtotime($jour.' '.$heure_deb);
		$time_fin_attrib = strtotime($jour.' '.$heure_fin);
		if($present < $time_deb_attrib){
			$result = $this->statut(2);
		}elseif($present > $time_fin_attrib){
			$result = $this->statut(0);
		}else{
			$result = $this->statut(1);
		}
		return  $result;
	}

	private function btn_retirer()
	{
		return '<button class="btn btn-danger btn-circle btn-sm" title="Supprimer">
					<i class="fas fa-trash"></i>
	  			</button>';
	}

	private function statut($stat)
	{
		switch ($stat) {
			case 0:
				$result = '<span class=" btn btn-danger ">Fini</span>';

				break;
			case 1:
				$result = '<span class=" btn btn-success ">En cours</span>';
				break;
			
			default:
				$result = '<span class=" btn btn-primary ">A venir</span>';
				break;
		}
		return $result;
	}

	private function verif_if_exist($user,$poste)
	{
		$data = array(
			'id_user' => $user,
			'id_poste' => $poste
		);
		$result = $this->attrib->get_count_by_id($data);
		return $result;
	}
	
	private function verif_if_ocuper($data)
	{
		$result = false;
		$attributions = $this->attrib->get_all();
		$day_ajouter = strtotime($data['jour']);
		$date_debAjouter = strtotime($data['jour'].' '.$data['heure_deb']);
		$date_finAjouter = strtotime($data['jour'].' '.$data['heure_fin']);
		foreach($attributions as $attrib){
			$day_exist = strtotime($attrib->jour);
			$date_debExist = strtotime($attrib->jour.' '.$attrib->heure_deb);
			$date_finExist = strtotime($attrib->jour.' '.$attrib->heure_fin);
			
			if($data['id_poste'] == $attrib->id_poste && $day_ajouter == $day_exist){
				if($date_debAjouter >= $date_debExist && $date_debAjouter <= $date_finExist){
					$result = true;
					break;
				}elseif($date_finAjouter >= $date_debExist && $date_finAjouter <= $date_finExist){
					$result = true;
					break;
				}else{
					$result = false;
					
				}
			}else{
				$result = false;				
			}
			
		}
		return $result;
	}

}
