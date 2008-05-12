<?php

class Admin extends Controller {

	function Admin()
	{
		parent::Controller();
		
		$this->load->helper('url');
		$this->load->helper('form');
	}
	
	function index()
	{
		$data['title'] = "VPSMatrix Administration";
		$data['query'] = $this->db->get('provider');
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/menu');
		$this->load->view('admin/provider_list', $data);
		$this->load->view('admin/footer');
	}
	
	/** Display's form to insert new providers **/
	function provider_insert()
	{
		$query = $this->db->query('select id as value, name as text from country order by name asc');
		
		if ($query->num_rows())
		{
			foreach ($query->result_array() as $row)
			{
				$rs[$row['value']] = $row['text'];
			}	
		}
		$query->free_result();
		unset($query);
		
		$data['title'] = "VPSMatrix Administration - Add Provider";
		$data['options'] = $rs;
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/menu');
		$this->load->view('admin/add_provider', $data);
		$this->load->view('admin/footer');
	}
	
	function provider_db_insert()
	{
		$this->db->insert('provider', $_POST);
		
		redirect('admin/');
	}
	
	function product_list()
	{	
		$data['title'] = "VPSMatrix Administration - Product List";
		$data['provider_id'] = $this->uri->segment(3);
		$data['query'] = $this->db->query('select id, reference from product where provider_id ='.$data['provider_id']);
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/menu_products');
		$this->load->view('admin/product_list', $data);
		$this->load->view('admin/footer');
	}
	
	function product_insert()
	{
		$query = $this->db->query('select id as value, abbr as text from currency');
		
		if ($query->num_rows())
		{
			foreach ($query->result_array() as $row)
			{
				$rs[$row['value']] = $row['text'];
			}	
		}
		$query->free_result();
		unset($query);
		
		$data['title'] = "VPSMatrix Administration - Add Product";
		$data['options'] = $rs;
		$data['provider_id'] = $this->uri->segment(3);
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/menu_products');
		$this->load->view('admin/add_product', $data);
		$this->load->view('admin/footer');
	}
	
	function product_db_insert()
	{
		$this->db->insert('product', $_POST);
		
		redirect('admin/product_list/'.$this->input->post('provider_id'));
	}
	
}
?>