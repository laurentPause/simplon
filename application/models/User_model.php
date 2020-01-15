<?php
class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();

        $this->user = 'users';
    }

    public function get_all()
    {
       $this->db->select();
		
		$query = $this->db->get($this->user);
		
		return $query->result();
    }

    public function add($data)
    {
        $this->db->insert($this->user, $data);
    }

    public function get_by_id($id)
    {
        $query = $this->db->get_where($this->user, array('id' => $id));
        return $query->row();
    }
}