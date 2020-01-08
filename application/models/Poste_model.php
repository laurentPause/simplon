<?php
class Poste_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

        $this->poste = 'postes';
    }

    public function get_all()
    {
       $this->db->select();
		
		$query = $this->db->get($this->poste);
		
		return $query->result();
    }
}