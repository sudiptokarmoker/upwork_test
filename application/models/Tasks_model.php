<?php
class Tasks_model extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('tasks', $data);
		return $this->db->insert_id();
	}

	public function get()
	{
		$query = $this->db->query("select * from tasks order by id desc");
		return $query->result();
	}
}
