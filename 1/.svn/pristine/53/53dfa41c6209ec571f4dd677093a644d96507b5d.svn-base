<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{   
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	public function request_for_login()
	{
		if(!$this->session->userdata('user'))
		{
			echo "<script type='text/javascript'>";  
			echo "window.location.href='/index.php/user/login'";  
			echo "</script>"; 
		}
	}
	
	public function register()
	{
		$data["error"] = null;
		$this->load->view("register", $data);
	}

	public function login()
	{
		$data["error"] = null;
		$this->load->view("login", $data);
	}
	
	public function weibo_login($name, $avatar)
	{
		if(!$avatar)
			$avatar = "/images/default_avatar.gif";
		$this->session->set_userdata("user", urldecode($name));
		$this->session->set_userdata("avatar", urldecode($avatar));
		$this->load->model("User_model");
		$uid = $this->User_model->addSocialAccount("www.weibo.com/".urldecode($name), urldecode($name), $avatar);
		$this->session->set_userdata("uid", $uid);
		echo "<script type='text/javascript'>";  
        echo "window.location.href='/index.php/job/index'";  
        echo "</script>"; 
	}
	
	public function land()
	{
		$email = $this->input->post('email');
		$pwd = md5($this->input->post('pwd'));
		$this->load->model("User_model");
		if(!$this->User_model->legalUser($email, $pwd))
		{
			$data['error'] = "Email与密码不匹配，请重新输入";
			$this->load->view('login', $data);
			return;
		}
		
		$user = $this->User_model->getUserFromEmail($email);
		$this->session->set_userdata("user", $user['name']);
		$this->session->set_userdata("uid", $user['id']);
		$this->session->set_userdata("avatar", '/images/default_avatar.gif');
        echo "<script type='text/javascript'>";  
        echo "window.location.href='/index.php/job/index'";  
        echo "</script>"; 
	}
    
    public function logout()
    {
		$this->session->unset_userdata("user");
		$this->session->unset_userdata("uid");
		//session_destroy();
        echo "<script type='text/javascript'>";  
		echo "window.location.href='/index.php/job/index'";  
		echo "</script>";
    }
	
	public function add()
	{
		/*********对输入的信息进行检查***********/
		$email = $this->input->post('email');
		$name = $this->input->post('name');
		$pwd = md5($this->input->post('pwd'));
		$pwd2 = md5($this->input->post('pwd2'));
		
		$data = null;
		$this->load->model("User_model");
		//检查email是否合法以及是否已经被注册
		if (!preg_match("/^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$/", $email)) 
		{
			$data['error'] = "该email不符合要求";
			$this->load->view("register", $data);
			return;
		}
		
		if($this->User_model->registeredEmail($email))
		{
			$data['error'] = "该email已经被注册过";
			$this->load->view("register", $data);
			return;
		}
		
		//检测用户名是否合法以及是否以及被使用
		if(strlen($name) < 3 || strlen($name) > 12)
		{
			$data['error'] = "该用户名不符合要求";
			$this->load->view("register", $data);
			return;
		}
		
		if($this->User_model->registeredUserName($name))
		{
			$data['error'] = "该用户名已经被注册过";
			$this->load->view("register", $data);
			return;
		}
		
		//检测密码是否合法以及两次的输入是否一致
		if($pwd != $pwd2)
		{
			$data["error"] = "两次输入密码不一致";
			$this->load->view("register", $data);
			return;
		}
	
		$this->load->model("User_model");
		$uid = $this->User_model->addUser($email, $name, $pwd);
		$this->session->set_userdata("user", $name);
		$this->session->set_userdata("uid", $uid);
		$this->session->set_userdata("avatar", '/images/default_avatar.gif');
		 
		echo "<script type='text/javascript'>";  
		echo "window.location.href='/index.php/job/index'";  
		echo "</script>"; 
	}
	
	public function getUserByID($id)
	{
		$this->request_for_login();
		$this->load->model("User_model");
		$result = $this->User_model->findUserByID($id);
		$item = null;
		if($result == null)
			$item['client'] = null;
		else
			$item['client'] = $result;
			
		$intern = $this->User_model->findInternByID($id);
		$item['intern'] = $intern;
			
		$jobs = $this->User_model->findPublishJobs($id);
		$msgs = $this->User_model->findMessages($id);
		$item['items'] = $jobs;
		$item['msgs'] =$msgs;
		$this->load->view("profile", $item);
	}

	public function account($id)
	{
		$this->request_for_login();
		$this->load->model("User_model");
		$result = $this->User_model->findUserByID($id);
		$item = null;
		if($result == null)
			$item['client'] = null;
		else
			$item['client'] = $result;

		$item['type'] ="account";
		$item['id'] =$id;
		$this->load->view("profile", $item);
	}
	
	public function message($id)
	{
		$this->request_for_login();
		$this->load->model("User_model");
			
		$msgs = $this->User_model->findMessages($id);
		$item['type'] = "message";
		$item['msgs'] =$msgs;
		$item['id'] =$id;
		$this->load->view("profile", $item);
	}
	
	public function resume($id)
	{
		$this->request_for_login();
		$this->load->model("User_model");
			
		$resume = $this->User_model->findResume($id);
		$item['type'] = "resume";
		$item['resume'] =$resume;
		$item['id'] =$id;
		$this->load->view("profile", $item);
	}
	
	public function article($id)
	{
		$this->request_for_login();
		$this->load->model("User_model");
			
		$articles = $this->User_model->findPublishJobs($id);
		$item['items'] = $articles;
		$item['type'] ="article";
		$item['id'] =$id;
		$this->load->view("profile", $item);
	}
	
	public function intern($id)
	{
		$this->request_for_login();
		$this->load->model("User_model");
			
		$intern = $this->User_model->findInternByID($id);
		$item['intern'] = $intern;
		$item['type'] ="intern";
		$item['id'] =$id;
		$this->load->view("profile", $item);
	}
	
	public function weibo()
	{
		$this->load->view("callback");
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>