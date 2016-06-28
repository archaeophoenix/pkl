<?php
class Index_Model extends Model{
	function __construct(){
		parent::__construct();
	}

	function create($table, $data = null){
		if (is_null($data)) {
			$this->db->create($table);
		} else {
			$this->db->create($table, $data);
		}
	}

	function read($table, $where = null, $field = '*'){
		return $this->db->read($table, $where, $field);
	}

	function update($table, $where, $data = null){
		if (is_null($data)) {
			$this->db->update($table, $where);
		} else {
			$this->db->update($table, $where, $data);
		}
	}

	function delete($table, $id){
		$this->db->delete($table, "id = '{$id}'");
	}

	function detail($table, $id, $field = '*'){
		return $this->db->one($table, "WHERE id = '{$id}'", $field);
	}

	function log(){
		extract($_POST);
		return $this->db->one('pengurus',"JOIN jurusan ON jurusan.id = pengurus.id_jurusan WHERE username='$username' AND password='$password' AND status != 0",'pengurus.*, jurusan.nama jurusan');
	}

}