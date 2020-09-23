
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event  extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('pegawai/P_event', 'e');
		
	}

	function index()
	{
		$this->load->model('pegawai/P_event');
		$id_event = $this->session->userdata('id_event');
		//$data_event = $this->get_event($id_event);
		
		$data = [
			// 'id_user' => $id_user,
			'event' => $id_event
		];
		
		$this->load->view('pegawai/event/listevent', $data);
	}

	function load()
	{
		$event = $this->P_event->fetch_all_event();
		foreach($event->result_array() as $row)
		{
			$data[] = array(
				'id_event '	=>	$row['id_event '],
				'nama_event'	=>	$row['nama_event'],
				'tgl_event'	=>	$row['tgl_event'],
				//'jam_event'	=>	$row['jam_event'],
				'tempat_event'	=>	$row['tempat_event']
			);
		}
		echo json_encode($data);
	}

	function insert()
	{
		if($this->input->post('nama_event'))
		{
			$data = array(
				'nama_event' =>	$this->input->post('nama_event'),
				'tgl_event'=>	$this->input->post('tgl_event'),
				//'jam_event'	=>	$this->input->post('jam_event'),
				'tempat_event'	=>	$this->input->post('tempat_event')
			);
			$this->P_event->insert_event($data);
		}
	}


}

?>