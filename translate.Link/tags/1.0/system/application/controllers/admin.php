<?php

class Admin extends Controller {

	function Admin()
	{
		parent::Controller();
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('cookie');
	}
	
	function index()
	{
		$data['title'] = "Translation Center - Administration";
		
		if (!get_cookie('dl_tca')) 
		{
			$this->load->view('admin/header', $data);
			$this->load->view('admin/menu');
			$this->load->view('admin/login', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			$data['users'] = $this->db->get('user');
		
			$this->load->view('admin/header', $data);
			$this->load->view('admin/menu');
			$this->load->view('admin/body', $data);
			$this->load->view('admin/footer');
		}
	}
	
	function login()
	{
		$query = $this->db->query('select id, password from user where username = \''.$_POST['username'].'\' and group_id = 1');
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			if ($row->password == $_POST['password']) 
			{
				set_cookie("dl_tca", $row->id, 0);
				$sql = "INSERT INTO log (user_id, action, lang_id) VALUES (".$row->id.", 'admin login', null)";
				$this->db->query($sql);
			}
			else
			{
				$sql = "INSERT INTO log (user_id, action, lang_id) VALUES (".$row->id.", 'failed admin login', null)";
				$this->db->query($sql);
			}
		}
		
		redirect('admin/');
	}
	
	function user_new()
	{
		if (!get_cookie('dl_tca')) redirect('admin/');
		
		$data['title'] = "Translation Center - User Add";
		
		$query = $this->db->query('select id as value, name as text from `group`');
		
		if ($query->num_rows())
		{
			foreach ($query->result_array() as $row)
			{
				$rs[$row['value']] = $row['text'];
			}
		}
		$query->free_result();
		unset($query);
		
		$data['groups'] = $rs;
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/menu');
		$this->load->view('admin/user_add', $data);
		$this->load->view('admin/footer');
	}
	
	function user_edit()
	{
		if (!get_cookie('dl_tca')) redirect('admin/');
		
		$data['title'] = "Translation Center - User Edit";
		$data['user'] = $this->db->query('select * from user where id = '.$this->uri->segment(3));
		
		$query = $this->db->query('select id as value, name as text from `group`');
		
		if ($query->num_rows())
		{
			foreach ($query->result_array() as $row)
			{
				$rs[$row['value']] = $row['text'];
			}
		}
		$query->free_result();
		unset($query);
		
		$data['groups'] = $rs;
		
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
		if (!get_cookie('dl_tca')) redirect('admin/');
		
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
		if (!get_cookie('dl_tca')) redirect('admin/');
		
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
		if (!get_cookie('dl_tca')) redirect('admin/');
		
		$data['title'] = "Translation Center - Logs";
		
		$data['logs'] = $this->db->query('SELECT u.name, l.action, l.lang_id, l.date FROM log l, user u WHERE l.user_id = u.id ');
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/menu');
		$this->load->view('admin/log', $data);
		$this->load->view('admin/footer');
	}
	
	function clear_logs()
	{
		$ver = $this->uri->segment(3);
		$data['title'] = "Translation Center - Clear Logs";
		
		if ($ver != "clear") 
		{
			$this->load->view('admin/header', $data);
			$this->load->view('admin/menu');
			$this->load->view('admin/clear_logs', $data);
			$this->load->view('admin/footer');
		}
		else
		{
			$this->db->query('delete from log');
			redirect('admin/view_log');
		}
	}
	
	function logout()
	{
		$uid = get_cookie('dl_tca');
		$sql = "INSERT INTO log (user_id, action, lang_id) VALUES (".$uid.", 'admin logout', null)";
		$this->db->query($sql);
		delete_cookie("dl_tca");
		redirect('admin/');
	}
	
}

?>