<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Social extends CI_Controller {
	
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
	
	public function browse()
	{
		$this->load->model("Social_model");
		$item['c1'] = $this->Social_model->getLookingJobMembers();
		$item['c2'] = $this->Social_model->getHaveJobMembers();
		
		$this->load->view("connection", $item);
	}
	
	public function email($to_id, $to_name="")
	{
		$this->request_for_login();
		$user['to_id'] = $to_id;
		$user['to_name'] = $to_name;
		
		$this->load->view("email", $user);
	}
	
	public function writeEmail()
	{
		$this->request_for_login();
		$data = array(
			'from_id' => $this->session->userdata("uid"),
			'from_name' => $this->session->userdata("user"),
			'to_id' => $this->input->post('to_id'),
			'to_name' => $this->input->post('to_name'),
			'content' => $this->input->post('content')
		);
		
		
		$this->load->model("Social_model");
		$this->Social_model->sendEmail($data);
		
		echo "<script type='text/javascript'>";  
		echo "window.location.href='/index.php/xiaozhao/recommend'";  
		echo "</script>";
	}
	
	public function myInfo()
	{
		$this->request_for_login();
		$this->load->view("myinfo");
	}
	
	public function setMyInfo()
	{
		$this->request_for_login();
		$data = array(
			'uid' => $this->session->userdata("uid"),
			'uname' => $this->session->userdata("user"),
			'state' => $this->input->post('state'),
			'company' => $this->input->post('company')
		);
		
		
		$this->load->model("Social_model");
		$this->Social_model->setMyInfo($data);
		
		$this->browse();
	}
}