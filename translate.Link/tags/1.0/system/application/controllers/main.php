<?php

class Main extends Controller {
	
	function Main()
	{
		parent::Controller();
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('cookie');
	}
	
	function index()
	{
		include 'config.php';
		$data['page_title'] .= " - Login";
		
		if (!get_cookie('dl_tc')) 
		{
			$this->load->view('header', $data);
			$this->load->view('menu');
			$this->load->view('login', $data);
			$this->load->view('footer');
		}
		else
		{
			//$query = $this->db->query('select id, lang_id from user_lang where user_id = '.get_cookie("dl_tc"));
			
			//if ($query->num_rows() != 1)
				redirect('main/list_lang');
			//else
			//{
			//	$row = $query->row();
			//	redirect('main/translate/'.$row->lang_id);
			//}
		}
	}
	
	/**
	 * Login
	 * 
	 * Description: Gets user id and password from username, compares to posted
	 * password and if same sets a cookie and redirects to main page
	 */
	function login()
	{
		$query = $this->db->query('select id, password from user where username = \''.$_POST['username'].'\'');
		
		if ($query->num_rows() > 0)
		{
			$row = $query->row();
			if ($row->password == $_POST['password']) 
			{
				set_cookie("dl_tc", $row->id, 0);
				$sql = "INSERT INTO log (user_id, action, lang_id) VALUES (".$row->id.", 'login', null)";
				$this->db->query($sql);
			}
			else
			{
				$sql = "INSERT INTO log (user_id, action, lang_id) VALUES (".$row->id.", 'failed login', null)";
				$this->db->query($sql);
			}
		}
		
		redirect('');
	}
	
	/**
	 * List available languages for translation
	 * 
	 */
	function list_lang()
	{
		if (!get_cookie('dl_tc')) redirect('');
		
		include 'config.php';
		$data['page_title'] .= " - Available Languages";
				
		$data['langs'] = $this->db->query('select l.id, l.org_name, l.int_name ' .
				'from user_lang ul, language l ' .
				'where ul.user_id = '.get_cookie('dl_tc').
				' and ul.lang_id = l.id');
				
		$this->load->view('header', $data);
		$this->load->view('menu');
		$this->load->view('lang_list', $data);
		$this->load->view('footer');
	}
	
	function translate()
	{
		// check if authenticated
		if (!get_cookie('dl_tc')) redirect('');
		
		include 'config.php';
		
		// get details
		$uid = get_cookie('dl_tc');
		$lid = $this->uri->segment(3);
		
		// check if user can edit language (in case manually entered in url)
		$query = $this->db->query('select * from user_lang where user_id = '.$uid.' and lang_id ='.$lid);
		if ($query->num_rows() < 1) redirect('main/list_lang');
		
		// get language details
		$query = $this->db->get_where('language', 'id ='.$lid);
		$row = $query->row();
		
		$data['translated_lang'] = $row->org_name.'/'.$row->int_name;
		$data['page_title'] .= " - $row->int_name Translation";
		
		//load language files
		$lang = null;
		include 'languages/English.php';
		$data['english'] = $lang;
		
		include 'languages/'.$row->tag.'.php';
		$data['other'] = $lang;
		
		// set-up views/page
		$this->load->view('header', $data);
		$this->load->view('menu');
		$this->load->view('translate', $data);
		$this->load->view('footer');
	}
	
	function save()
	{
		$uid = get_cookie('dl_tc');
		$lid = $this->uri->segment(3);
		
		$query = $this->db->get_where('language', 'id ='.$lid);
		$row = $query->row();
		
		$filename = 'languages/'.$row->tag.'.php';;
		
		$fp = fopen($filename,'w');

		if (is_writable($filename) == true)
		{
			$write = fwrite($fp, "<?php\n\n");
			foreach ($_POST as $key=>$val)
			{
				$line = "\$lang[\"$key\"]=\"$val\";\n";
				$write = fwrite($fp, $line);
			}
			
			$write = fwrite($fp, "\n?>");
			fclose($fp);
			
			$sql = "INSERT INTO log (user_id, action, lang_id) VALUES (".$uid.", 'update', ".$lid.")";
			$this->db->query($sql);
			
			redirect('main/list_lang');
			
		}
		else
		{
			echo "Error!!! Language files not writable!!";
		}
		fclose($fp);
		
	}
	
	function logout()
	{
		$uid = get_cookie('dl_tc');
		$sql = "INSERT INTO log (user_id, action, lang_id) VALUES (".$uid.", 'logout', null)";
		$this->db->query($sql);
		delete_cookie("dl_tc");
		redirect('/');
	}
}
?>
