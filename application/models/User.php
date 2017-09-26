<?php
	
	class User extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function GetLogin()
		{
			$value = $this->db->query('SELECT * FROM  `users` WHERE 1')->result();
			return $value;
		}
		function LastVisit($data, $id)
		{
			$this->db->where('id', $id);
			$this->db->update('users', $data);
		}
		function GetUserById($id)
		{
			$value = $this->db->query("SELECT * FROM  `users` WHERE id='$id'")->result();
			return $value;
		}
		function UpdateUser($data, $id)
		{
			$this->db->where('id', $id);
			$this->db->update('users', $data);
		}
/*		function GetKota()
		{
			$value = $this->db->query('SELECT * FROM  `kota` WHERE 1')->result();
			return $value;
		}
		function countReg($id)
		{
			$this->db->like('kode_register', $id);
			$this->db->from('register');
			return $this->db->count_all_results();
		}*/
		function hapusUser($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('users');
		}
		function insertUser($data)
		{
			return $this->db->insert("users",$data);
		}
	}
?>