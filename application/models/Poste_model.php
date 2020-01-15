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

    public function get_by_id($id)
    {
        $query = $this->db->get_where($this->poste, array('id' => $id));
        return $query->row();
    }
}