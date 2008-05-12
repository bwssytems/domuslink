<?php

class Main extends Controller {

	function Main()
	{
		parent::Controller();
		
		$this->load->helper('url');
		//$this->load->helper('form');
		
		$this->load->scaffolding('currency');
	}
	
	function index()
	{
		$data['title'] = "VPSMatrix.info";
		$data['query'] = $this->db->get('provider');

		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('main_body', $data);
		$this->load->view('footer');
	}
	
	function provider()
	{
		$sql = 'select * from product where provider_id = '.$this->uri->segment(3);
		$data['query'] = $this->db->query($sql);
		
		$this->load->view('header');
		$this->load->view('menu');
		$this->load->view('provider', $data);
		$this->load->view('footer');
	}
}
?>
