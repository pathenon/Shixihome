<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rencai extends CI_Controller {
	
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
	
	public function index()
	{
		$this->load->model("Rencai_model");
		$item['c1'] = $this->Rencai_model->getLookingJobMembers();
		//$item['c2'] = $this->Rencai_model->getHaveJobMembers();
		
		$this->load->view("resumes", $item);
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
		
		
		$this->load->model("Rencai_model");
		$this->Rencai_model->sendEmail($data);
		
		if($this->input->post('to_name'))
			$this->index();
		else
		{
			echo "<script type='text/javascript'>";  
			echo "window.location.href='/index.php/'";  
			echo "</script>";
		}
	}
	
	public function myInfo()
	{
		$this->request_for_login();
		
		$data['info'] = null;
		$this->load->view("myinfo", $data);
	}
	
	public function setMyInfo()
	{
		$this->request_for_login();
		$resume = $this->input->post('resume');
		if(strpos($resume, "http://") === false)
			$resume = "http://".$resume;
			
		$data = array(
			'uid' => $this->session->userdata("uid"),
			'uname' => $this->session->userdata("user"),
			'avatar' => ($this->session->userdata("avatar")==null ? '': $this->session->userdata("avatar")),
			'role' => $this->input->post('role'),
			'job' => $this->input->post('job'),
			'resume' => $resume
		);
		
		if($data['job'] == null || $data['resume'] == null)
		{
			$data['info'] = "带*的域不能为空";
			$this->load->view("myinfo", $data);
			return;
		}
		
		if(strpos($data['resume'] , 'linkedin') === false)
		{
			$data['info'] = "请输入正确的linkedin简历地址";
			$this->load->view("myinfo", $data);
			return;
		}
		
		
		$this->load->model("Rencai_model");
		$this->Rencai_model->setMyInfo($data);
		
		$this->index();
	}
	
	public function updateInternInfo($id)
	{
		$this->request_for_login();

		$data = array(
			'id' => $id,
			'job' => $this->input->post('job'),
			'resume' => $this->input->post('resume'),
			'state' => $this->input->post('state')
		);
		
		$this->load->model("Rencai_model");
		$this->Rencai_model->updateInfo($data);
		
		$this->index();
	}
	
	public function addInternship($id)
	{
		$this->request_for_login();
		$data['id'] = $id;
		$this->load->view("addinternship", $data);
		
	}
	
	public function addIntern()
	{
		$this->request_for_login();
			
		$data = array(
			'uid' => $this->session->userdata("uid"),
			'uname' => $this->session->userdata("user"),
			'avatar' => ($this->session->userdata("avatar")==null ? '': $this->session->userdata("avatar")),
			'company' => $this->input->post('company'),
			'job' => $this->input->post('job'),
			'time' => $this->input->post('time'),
			'content' => addslashes($this->url2html(str_replace(array("\r\n", "\n", "\r"), "<br/>", $this->input->post('content')))),
			'contribution' => addslashes($this->url2html(str_replace(array("\r\n", "\n", "\r"), "<br/>", $this->input->post('contribution'))))
		);
		
		$this->load->model("Social_model");
		$this->Social_model->addIntern($data);
		
		$url = "/index.php/user/intern/".$this->session->userdata("uid");
		echo "<script type='text/javascript'>";  
		echo "window.location.href='".$url."'"; 
		echo "</script>"; 
	}
	
	public function addMyResume($id)
	{
		$this->request_for_login();
		$data['id'] = $id;
		$this->load->view("addresume", $data);
		
	}
	
	public function addResume()
	{
		$this->request_for_login();
			
		$data = array(
			'uid' => $this->session->userdata("uid"),
			'email' => $this->input->post('company'),
			'phone' => $this->input->post('phone'),
			'name' => $this->input->post('name'),
			'school' => $this->input->post('school'),
			'grade' => $this->input->post('grade'),
			'major' => $this->input->post('major'),
			'education' => addslashes($this->url2html(str_replace(array("\r\n", "\n", "\r"), "<br/>", $this->input->post('education')))),
			'internship' => addslashes($this->url2html(str_replace(array("\r\n", "\n", "\r"), "<br/>", $this->input->post('internship')))),
			'project' => addslashes($this->url2html(str_replace(array("\r\n", "\n", "\r"), "<br/>", $this->input->post('project')))),
			'other' => addslashes($this->url2html(str_replace(array("\r\n", "\n", "\r"), "<br/>", $this->input->post('other')))),
			'linkedin' => $this->input->post('linkedin')
		);
		
		$this->load->model("Social_model");
		$this->Social_model->addResume($data);
		
		$url = "/index.php/user/intern/".$this->session->userdata("uid");
		echo "<script type='text/javascript'>";  
		echo "window.location.href='".$url."'"; 
		echo "</script>"; 
	}
	
	//功能：将文本中的链接地址转成HTML 
//输入：字符串 
//输出：字符串 
function url2html($text) 
{ 
//匹配一个URL，直到出现空白为止 
preg_match_all("/http:\/\/?[^\s]+/i", $text, $links); 
//设置页面显示URL地址的长度 
$max_size = 40; 
foreach($links[0] as $link_url) 
{ 
//计算URL的长度。如果超过$max_size的设置，则缩短。 
$len = strlen($link_url); 
if($len > $max_size) 
{ 
$link_text = substr($link_url, 0, $max_size)."..."; 
} else { 
$link_text = $link_url; 
} 
//生成HTML文字 
$text = str_replace($link_url,"<a href='$link_url'>$link_text</a>",$text); 
} 
return $text; 
} 
}