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
		if (!get_cookie('dl_tca')) 
		{
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('admin/login');
			$this->load->view('footer');
		}
		else
		{
			$this->db->order_by('username', 'asc'); 
			$data['users'] = $this->db->get('user');
		
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('admin/body', $data);
			$this->load->view('footer');
		}
	}
	
	/**
	 * Login form, is user is part of Admin group and password is the same then create cookie
	 */
	function login()
	{
		$query = $this->db->query('select id, password from user where username = \''.$_POST['username'].'\' and group_id = 1');
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			if ($row->password == $_POST['password']) 
			{
				set_cookie("dl_tca", $row->id, 0);
				//$sql = "INSERT INTO log (user_id, action, language) VALUES (".$row->id.", 'admin login', null)";
				//$this->db->query($sql);
			}
			else
			{
				//$sql = "INSERT INTO log (user_id, action, language) VALUES (".$row->id.", 'failed admin login', null)";
				//$this->db->query($sql);
			}
		}
		
		redirect('admin/');
	}
	
	/**
	 * Displays form to add a new user
	 */
	function user_new()
	{
		if (!get_cookie('dl_tca')) redirect('admin/');
		
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
		
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/user_add', $data);
		$this->load->view('footer');
	}
	
	/**
	 * Edit user information
	 */
	function user_edit()
	{
		if (!get_cookie('dl_tca')) redirect('admin/');
		
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
		
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/user_edit', $data);
		$this->load->view('footer');
	}
	
	/**
	 * Save changes made to user information
	 */
	function user_save()
	{
		$this->db->update('user', $_POST, 'id = '.$_POST['id']);
		
		redirect('admin/');
	}
	
	/**
	 * Adds a new user to translation center
	 */
	function user_add()
	{
		$this->db->insert('user', $_POST);
		
		redirect('admin/');
	}
	
	/**
	 * Confirm user removal
	 */
	function user_delete_confirm()
	{		
		$query = $this->db->get_where('user', 'id ='.$this->uri->segment(3));
		$row = $query->row();
		$data['user_name'] = $row->name;
		
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/user_delete',$data);
		$this->load->view('footer');
	}
	
	/**
	 * If deletion confirmed remove all traces from DB
	 */
	function user_delete()
	{
		if (!get_cookie('dl_tca')) redirect('admin/');
		
		$confirmed = $this->uri->segment(3);
		
		if ($confirmed == "confirmed")
		{
			//remove language associations
			$this->db->delete('user_lang', 'user_id ='.$this->uri->segment(4));
			
			//remove all logs for this user
			$this->db->delete('log', 'user_id ='.$this->uri->segment(4));
			
			//remove user
			$this->db->delete('user', 'id ='.$this->uri->segment(4));
		}
		
		redirect('admin/');
	}
	
	/**
	 * Lists available languages and gives user edit/remove capabilities
	 */
	function languages()
	{
		if (!get_cookie('dl_tca')) redirect('admin/');
		
		$this->db->order_by('int_name', 'asc'); 
		$data['languages'] = $this->db->get('language');
		
		$this->load->view('admin/header');
		$this->load->view('admin/menu_lang');
		$this->load->view('admin/languages', $data);
		$this->load->view('footer');
	}
	
	/**
	 * Edits existing language from Database
	 */
	function lang_edit()
	{
		//$data['lang_id'] = $this->uri->segment(3);
		
		$data['language'] = $this->db->query('select * from language where id = '.$this->uri->segment(3));
		
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/lang_edit', $data);
		$this->load->view('footer');
	}
	
	/**
	 * Save changes to language
	 */
	function lang_save()
	{
		$this->db->update('language', $_POST, 'id = '.$_POST['id']);
		
		redirect('admin/languages');
	}
	
	/**
	 * Removes language from database
	 */
	function lang_delete_confirm()
	{
		$data['lang_id'] = $this->uri->segment(3);
		
		$query = $this->db->get_where('language', 'id ='.$this->uri->segment(3));
		$row = $query->row();
		$data['language'] = $row->int_name;
		
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/lang_delete',$data);
		$this->load->view('footer');
	}
	
	function lang_delete()
	{
		if (!get_cookie('dl_tca')) redirect('admin/');
		
		$confirmed = $this->uri->segment(3);
		
		if ($confirmed == "confirmed")
		{
			//remove user / language associations
			$this->db->delete('user_lang', 'lang_id ='.$this->uri->segment(4));
			
			//remove language
			$this->db->delete('language', 'id ='.$this->uri->segment(4));
		}
		
		redirect('admin/');
	}
	
	/**
	 * Loads new language form
	 */
	function lang_new()
	{
		if (!get_cookie('dl_tca')) redirect('admin/');
		
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/lang_add');
		$this->load->view('footer');
	}
	
	/**
	 * Inserts new language in DB
	 */
	function lang_add()
	{
		$this->db->insert('language', $_POST);
		
		redirect('admin/');
	}
	
	/**
	 * Lists all associated languages to user.
	 */
	function user_languages()
	{
		if (!get_cookie('dl_tca')) redirect('admin/');
		
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
		
		$this->load->view('admin/header');
		$this->load->view('admin/menu');
		$this->load->view('admin/user_languages', $data);
		$this->load->view('footer');
	}
	
	/**
	 * Associates a new language to a specific user
	 */
	function lang_associate()
	{
		$this->db->insert('user_lang', $_POST);
		redirect('admin/user_languages/'.$_POST['user_id']);
	}
	
	/**
	 * Removes a language association from a user
	 */
	function lang_unassociate()
	{
		$this->db->delete('user_lang', 'id ='.$this->uri->segment(3));
		
		redirect('admin/user_languages/'.$this->uri->segment(4));
	}
	
	function view_log()
	{
		if (!get_cookie('dl_tca')) redirect('admin/');
		
		$data['title'] = "Translation Center - Logs";
		
		$data['logs'] = $this->db->query('SELECT u.username, l.action, l.language, l.date FROM log l, user u WHERE l.user_id = u.id order by l.date desc');
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/menu');
		$this->load->view('admin/log', $data);
		$this->load->view('footer');
	}
	
	/**
	 * 
	 */
	function clear_logs()
	{
		$ver = $this->uri->segment(3);
		
		if ($ver != "clear") 
		{
			$this->load->view('admin/header');
			$this->load->view('admin/menu');
			$this->load->view('admin/log_clear');
			$this->load->view('footer');
		}
		else
		{
			$this->db->query('delete from log');
			redirect('admin/view_log');
		}
	}
	
	/**
	 * 
	 */
	function logout()
	{
		$uid = get_cookie('dl_tca');
		//$sql = "INSERT INTO log (user_id, action, lang_id) VALUES (".$uid.", 'admin logout', null)";
		//$this->db->query($sql);
		delete_cookie("dl_tca");
		redirect('admin/');
	}
	
}

?>