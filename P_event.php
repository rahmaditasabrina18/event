

<?php

class P_event extends CI_Model
{
	function fetch_all_event(){
		$this->db->order_by('id_event');
		return $this->db->get('event')->result_array();;
	}

	function insert_event($data)
	{
		$this->db->insert('event', $data);
	}

	
}

?>