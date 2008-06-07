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
		$data['title'] = "Translation Center - Administration";
		
		$data['users'] = $this->db->get('user');
		/*
		$data['users'] = $this->db->query('SELECT u.id, u.name, u.dt_added, l.int_name ' .
				'FROM user u, user_lang ul, language l ' .
				'where u.id = ul.user_id ' .
				'and ul.lang_id = l.id ');
		*/
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/menu');
		$this->load->view('admin/body');
		$this->load->view('admin/footer');
	}
	
	function user_new()
	{
		$data['title'] = "Translation Center - User Add";
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/menu');
		$this->load->view('admin/user_add');
		$this->load->view('admin/footer');
	}
	
	function user_edit()
	{
		$data['title'] = "Translation Center - User Edit";
		$data['user'] = $this->db->query('select * from user where id = '.$this->uri->segment(3));
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/menu');
		$this->load->view('admin/user_edit', $data);
		$this->load->view('admin/footer');
	}
	
	function user_save()
	{
		$this->db->update('user', $_POST, 'id = '.$_POST['id']);
		
		redirect('admin/');
	}
	
	function user_add()
	{
		$this->db->insert('user', $_POST);
		
		redirect('admin/');
	}
	
	function user_delete()
	{
		echo "Code commented!";
		/*
		$this->db->delete('user', 'id ='.$this->uri->segment(3));
		$query = $this->db->query('select id from user_lang where user_id = '.$this->uri->segment(3));
		foreach ($query->result() as $row)
		{
			$this->db->delete('log', 'user_lang_id = '.$row->id);
		}
		$this->db->delete('user_lang', 'user_id ='.$this->uri->segment(3));
		redirect('admin/');
		*/
	}
	
	function lang_new()
	{
		$data['title'] = "Translation Center - Language Add";
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/menu');
		$this->load->view('admin/lang_add');
		$this->load->view('admin/footer');
	}
	
	function lang_add()
	{
		$this->db->insert('language', $_POST);
		
		redirect('admin/');
	}
	
	function languages()
	{
		$data['title'] = "Translation Center - User Language(s)";
		
		$data['uid'] = $this->uri->segment(3);
		$query = $this->db->query('select name from user where id = '.$data['uid'].' limit 1');
		$row = $query->row_array();
		$data['name'] = $row['name'];
		$data['assoc_langs'] = $this->db->query('select ul.id as ul_id, l.id, l.int_name ' .
				'FROM user u, user_lang ul, language l ' .
				'where u.id = ul.user_id ' .
				'and ul.lang_id = l.id ' .
				'and u.id = '.$data['uid']);
				
		$query = $this->db->query('select id as value, int_name as text from language order by int_name asc');
		
		if ($query->num_rows())
		{
			foreach ($query->result_array() as $row)
			{
				$rs[$row['value']] = $row['text'];
			}	
		}
		$query->free_result();
		unset($query);
		
		$data['avail_langs'] = $rs;
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/menu');
		$this->load->view('admin/languages', $data);
		$this->load->view('admin/footer');
	}
	
	function lang_associate()
	{
		$this->db->insert('user_lang', $_POST);
		redirect('admin/languages/'.$_POST['user_id']);
	}
	
	function lang_unassociate()
	{
		$this->db->delete('user_lang', 'id ='.$this->uri->segment(3));
		
		redirect('admin/languages/'.$this->uri->segment(4));
	}
	
	function view_log()
	{
		
	}
}
?>