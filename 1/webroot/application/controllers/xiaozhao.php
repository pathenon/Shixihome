<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Xiaozhao extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	private $count_per_page = 10;
	
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

	public function index($job = "upandi_xiaozhaojob")
	{
		session_start();
		
		$items = $this->get_page($job, 1);
		$data['items'] = $items;
		$data['firstpage'] = true;
		$data['page'] = 1;
		$this->load->model("Job_model");
		$data['pagecount'] = ceil(($this->Job_model->getItemCount($job)) / $this->count_per_page);
		
		//$data['recommend'] = $recommend = $this->Job_model->getRecommendItems();
		
		$this->load->view("xiaozhao", $data);
	}

	
	public function get_page($table, $page)
	{
		$this->load->model("Job_model");
		return $this->Job_model->getPageItems($table, $page, $this->count_per_page);
	}

	public function page($pagecount, $page)
	{
		$table = "upandi_xiaozhaojob";
		$data['items'] = $this->get_page($table, $page);
		if($page == 1)
			$data['firstpage'] = true;
		else
			$data['firstpage'] = false;
		$data['page'] = $page;
		$data['pagecount'] = $pagecount;
		$this->load->view("xiaozhao", $data);
	}
	
	//得到符合属性为$field,值为$value的记录的第$page页结果，总共$pagecount页
	public function conditional_page($field, $value, $pagecount, $page)
	{
		$table = "upandi_xiaozhaojob";
		$this->load->model("Job_model");
		$data['items'] = $this->Job_model->getConditionalPageItems($table, $field, urldecode($value), $page, $this->count_per_page);
		if($page == 1)
			$data['firstpage'] = true;
		else
			$data['firstpage'] = false;
		$data['page'] = $page;
		$data[$field] = $value;
		$data['field'] = $field;
		$data['pagecount'] = $pagecount;
		$this->load->view("xiaozhaosearchresult", $data);
	}

	//得到符合地点的第$page页
	public function place_page($place, $pagecount, $page)
	{
		$this->conditional_page('place', $place, $pagecount, $page);
	}

	//得到符合公司信息的第$page页
	public function company_page($field, $value, $pagecount, $page)
	{
		$this->conditional_page($field, $value, $pagecount, $page);
	}

	public function publishjob()
	{
		//发布实习信息必须登陆
		$this->request_for_login();
		
			$data = array(
			'company' => $this->input->post('company'),
			'field' => $this->input->post('field'),
			'job' => $this->input->post('job'),
			'description' => $this->input->post('description'),
			'requirement' => $this->input->post('requirement'),
			'salary' => $this->input->post('salary'),
			'person' => $this->input->post('person'),
			'phone' => $this->input->post('phone'),
			'email' => $this->input->post('email'),
			'online' => $this->input->post('online'),
			'place' => $this->input->post('place'),
			'other' => $this->input->post('other'),
			'info' => null,
			'edit' =>0
		);
		$this->load->view("xiaozhaopublishjob", $data);
	}
	
	public function addItem()
	{
		$this->request_for_login();
	
		$this->load->helper('form');

		$data = array(
			'company' => addslashes($this->input->post('company')),
			'type' => $this->input->post('type'),
			'job' => addslashes($this->input->post('job')),
			'description' => addslashes($this->url2html(str_replace(array("\r\n", "\n", "\r"), "<br/>", $this->input->post('description')))),
			'requirement' => addslashes($this->url2html(str_replace(array("\r\n", "\n", "\r"), "<br/>", $this->input->post('requirement')))),
			'salary' => $this->input->post('salary'),
			'person' => addslashes($this->input->post('person')),
			'phone' => addslashes($this->input->post('phone')),
			'email' => addslashes($this->input->post('email')),
			'online' => addslashes($this->input->post('online')),
			'place' => addslashes($this->input->post('place')),
			'other' => addslashes($this->url2html(str_replace(array("\r\n", "\n", "\r"), "<br/>", $this->input->post('other')))),
			'publish_by' => $this->session->userdata("uid"),
			'edit' => 0
		);
		if($data['company'] == NULL)
		{
			$data['info'] = "公司名称不能为空";
			$this->load->view('publishjob', $data);
			return;
		}
		if($data['job'] == NULL)
		{
			$data['info'] = "职位名称不能为空";
			$this->load->view('publishjob', $data);
			return;
		}
		if($data['description'] == NULL)
		{
			$data['info'] = "职位描述不能为空";
			$this->load->view('publishjob', $data);
			return;
		}
		if($data['requirement'] == NULL)
		{
			$data['info'] = "职位要求不能为空";
			$this->load->view('publishjob', $data);
			return;
		}
		if($data['salary'] == NULL)
		{
			$data['info'] = "薪水待遇不能为空";
			$this->load->view('publishjob', $data);
			return;
		}
		if($data['phone'] == NULL && $data['email'] == NULL && $data['online'] == NULL)
		{
			$data['info'] = "请至少填写一种联系方式";
			$this->load->view('publishjob', $data);
			return;
		}
		if($data['place'] == NULL)
		{
			$data['info'] = "工作地点不能为空";
			$this->load->view('publishjob', $data);
			return;
		}

		/*$error = null;
		if($error == null)
			$data['info'] = "提交成功";
		else
		{
			$data['info'] = $error;
		}*/

		$this->load->model("Job_model");
		$this->Job_model->addJob("upandi_xiaozhaojob", $data);

		$data['publish_time'] = date("Y-m-d H:i:s");
		$content['count'] = 0;
		$content['item'] = $data;
		$this->load->view('xiaozhaodetail', $content);
	}

	/*public function addItem()
	{
		$this->load->helper('form');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|php|txt|pdf|doc|docx|ppt|pptx';
		$config['max_size'] = '4096';
		$config['max_width']  = '4096';
		$config['max_height']  = '4096';
		$this->load->library('upload', $config);

		$data = null;
		if($this->input->post('course') == NULL)
        //if($_POST('course') == NULL)
		{
			$data['info'] = "课程名称不能为空";
			$this->load->view('add', $data);
			return;
		}

		//upload all the files
		$error = null;
		$file_count = count($_FILES['userfile']['name']);
		$files = $_FILES;
		$attachments = null;
		for($i=0; $i<$file_count; $i++)
		{
			$_FILES['userfile']['name']= $files['userfile']['name'][$i];
			$_FILES['userfile']['type']= $files['userfile']['type'][$i];
			$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			$_FILES['userfile']['error']= $files['userfile']['error'][$i];
			$_FILES['userfile']['size']= $files['userfile']['size'][$i];    
            
            //adapt to SAE
            $storage = new SaeStorage();
            $storage->upload("uploads", $_FILES['userfile']['name'], $_FILES['userfile']['tmp_name']);
            if ( $storage->errno() != 0)
				$error .= "[".$_FILES['userfile']['name']."]:".$storage->errmsg()."<br/>";
			else
				$attachments .= "./uploads/".$_FILES['userfile']['name'].";";
		}
		if($error == null)
			$data['info'] = "提交成功";
		else
		{
			$data['info'] = $error;
		}

		if($attachments != null)
		{
			$item=array(
					'school' => $this->input->post('school'),
					'course' => $this->input->post('course'),
					'year'   => $this->input->post('year'),
					'content'=> $this->input->post('content'),
					'attachments' => $attachments 
					);
			$this->load->model("Job_model");
			$this->Job_model->add($item);
		}

		$this->load->view('add', $data);
	}*/

	public function getAllItems()
	{
		$this->load->model("Job_model");
		$items = $this->Job_model->getAllItems();
		return $items; 
	}

	public function detail($id)
	{
		$this->load->model("Job_model");
		$item = $this->Job_model->getItem("upandi_xiaozhaojob", $id);
		$data['item'] = $item;
		if($item)
			$data['count'] = $this->Job_model->getItemBrowseCount("upandi_xiaozhaolog", $id);
		$this->load->view('xiaozhaodetail', $data);
	}

	public function searchField($field)
	{
		$this->load->model("Job_model");
		$data['items'] = $this->Job_model->search("field", $field);
        $data['firstpage'] = true;
		$data['page'] = 1;
		//$data['pagecount'] = ceil(count($data['items']) / $this->count_per_page);
		$data['pagecount'] = 1;
		$this->load->view("index", $data);
	}
	
	public function conditional_search($key, $value)
	{
		$this->load->model("Job_model");
		$items = $this->Job_model->getConditionalPageItems("upandi_xiaozhaojob", $key, urldecode($value), 1, $this->count_per_page);		
		$data['items'] = $items;
		$data['firstpage'] = true;
		$data['page'] = 1;
		$data[$key] = $value;
		$data['field'] = $key;
		$this->load->model("Job_model");
		$data['pagecount'] = ceil(($this->Job_model->getConditionalItemCount("upandi_xiaozhaojob", $key, urldecode($value))) / $this->count_per_page);
		$this->load->view("xiaozhaosearchresult", $data);
	}
	

	public function searchPlace($place)
	{	
		$this->conditional_search("place", $place);
	}
	
	public function searchCompanyType($type)
	{
		$this->conditional_search("type", $type);
	}
	
	private function getCategoryKeywords($type)
	{
		$keyword = array();
		switch((int)$type)
		{
			case 1:
				$keyword = array('研发','测试','开发');
				break;
			case 2:
				$keyword = array('产品','设计','UI');
				break;
			case 3:
				$keyword = array('运营','市场','销售', '推广', '营销');
				break;
			case 4:
				$keyword = array('行政','管理','HR' ,'人力资源' , '咨询');
				break;
			case 5:
				$keyword = array('金融','财务');
				break;
			default;
				$keyword = array('');
				break;
		}
		
		return $keyword;
	}
	
	public function searchCategory($type)
	{
		$keywords = $this->getCategoryKeywords($type);
		$items = null;
		$this->load->model("Job_model");
		$items = $this->Job_model->searchCategory("upandi_xiaozhaojob", $keywords, 1, $this->count_per_page);
		$data['items'] = $items;
		$data['firstpage'] = true;
		$data['page'] = 1;
		$data['field'] = $type;
		$this->load->model("Job_model");
		$data['pagecount'] = ceil($this->Job_model->getCategoryPageCount("upandi_xiaozhaojob", $keywords) / $this->count_per_page);
		$this->load->view("xiaozhaosearchresult", $data);		
	}
	
	public function category_page($type, $page_count, $page)
	{
		$keyword = $this->getCategoryKeywords($type);
		$items = null;
		$this->load->model("Job_model");
		$items = $this->Job_model->searchCategory("upandi_xiaozhaojob", $keyword, $page, $this->count_per_page);
		$data['items'] = $items;
		if((int)$page > 1)
			$data['firstpage'] = false;
		else
			$data['firstpage'] = true;
		$data['page'] = $page;
		$data['field'] = $type;
		$this->load->model("Job_model");
		$data['pagecount'] = $page_count; 
		$this->load->view("xiaozhaosearchresult", $data);
	}
	
	public function searchCompany($value)
	{	
		$key = "company";
		$this->load->model("Job_model");
		$items = $this->Job_model->getSpecialCompanyPageItems("upandi_xiaozhaojob", $key, urldecode($value), 1, $this->count_per_page);		
		$data['items'] = $items;
		$data['firstpage'] = true;
		$data['page'] = 1;
		$data[$key] = $value;
		$data['field'] = $key;
		$this->load->model("Job_model");
		$data['pagecount'] = ceil(($this->Job_model->getConditionalItemCount("upandi_xiaozhaojob", $key, urldecode($value))) / $this->count_per_page);
		$this->load->view("xiaozhaosearchresult", $data);
	}
		

	public function search()
	{
		$this->load->helper('form');
		$keyword = $this->input->post('keyword');
		$words = preg_split('/[ ]+/ ', trim($keyword));
		if(count($words) == 1 && $words[0] == "")
			$this->index();
		else
		{
			$this->load->model("Job_model");
			$items = $this->Job_model->powerful_search("upandi_xiaozhaojob", $words);
			$data['items'] = array_slice($items, 0, 50);
            $data['firstpage'] = true;
		    $data['page'] = 1;
		    //$data['pagecount'] = ceil(count($data['items']) / $this->count_per_page);
			$data['pagecount'] = 1;
			$this->load->view("xiaozhao", $data);
		}
	}
	
	
	public function leavemessage($id)
	{
        /*$message = $this->input->post('message');
		$this->load->model("Job_model");
		$this->Job_model->leave_message($message);
		$data['items'] = $this->Job_model->get_all_messages();*/
        $this->load->model("Job_model");
		$item = $this->Job_model->getItem("upandi_internjob", $id);
		$data['item'] = $item;
		$this->load->view("message", $data);
	}
	
	public function changeJobState($id, $state)
	{
		$to = ($state == 0 ? 1 : 0);
		$this->load->model("Job_model");
		$this->Job_model->changeJobState($id, $to);
		
		echo "<script type='text/javascript'>";  
		echo "window.location.href='/index.php/user/account/".$this->session->userdata('uid')."'";  
		echo "</script>"; 
	}
	
	public function edit($id)
	{
	  $this->load->model("Job_model");
	  $job = $this->Job_model->getItem("upandi_internjob", $id);  
	  if($job)
		$job['edit'] = 1;
	  $job['info'] = null;
	  $this->load->view('publishjob', $job);
	}
	
	public function topJob($id)
	{
		$this->load->model("Job_model");
		$job = $this->Job_model->updateTime($id);
		
		echo "<script type='text/javascript'>";  
		echo "window.location.href='/index.php/user/account/".$this->session->userdata('uid')."'";  
		echo "</script>";
	}
	
	public function updateJob()
	{
		$this->request_for_login();
	
		$this->load->helper('form');

		$data = array(
			'id' => $this->input->post('id'),
			'company' => addslashes($this->input->post('company')),
			'type' => $this->input->post('type'),
			'job' => addslashes($this->input->post('job')),
			'description' => addslashes(str_replace(array("\r\n", "\n", "\r"), "<br/>", $this->input->post('description'))),
			'requirement' => addslashes(str_replace(array("\r\n", "\n", "\r"), "<br/>", $this->input->post('requirement'))),
			'salary' => $this->input->post('salary'),
			'person' => addslashes($this->input->post('person')),
			'phone' => addslashes($this->input->post('phone')),
			'email' => addslashes($this->input->post('email')),
			'online' => addslashes($this->input->post('online')),
			'place' => addslashes($this->input->post('place')),
			'other' => addslashes(str_replace(array("\r\n", "\n", "\r"), "<br/>", $this->input->post('other'))),
			'publish_by' => $this->session->userdata("uid")
		);
		$this->load->model("Job_model");
		$this->Job_model->updateJob($data);
		
		$this->detail($data['id']);
	}
	

	public function recommend()
	{
		$this->load->model("Job_model");
		$count = $this->Job_model->getRecommendItemCount("upandi_xiaozhaojob");
		$pc = ceil($count / $this->count_per_page);
		$this->recommend_page($pc, 1);
	}
	
	public function recommend_page($pagecount, $page)
	{
		$table = "upandi_xiaozhaojob";
		$this->load->model("Job_model");
		$data['items'] = $this->Job_model->getRecommendPageItems($table, $page, $this->count_per_page);
		if($page == 1)
			$data['firstpage'] = true;
		else
			$data['firstpage'] = false;
		$data['page'] = $page;
		$data['pagecount'] = $pagecount;
		$data['qianbei'] = $this->get_neitui_people();
		$this->load->view("xiaozhaoneituilist", $data);
	}
	
	private function get_neitui_people()
	{
		$this->load->model("Social_model");
		return $this->Social_model->get_neitui_people();
	}
	
	public function neitui()
	{
		$this->request_for_login();
		$data['info'] = null;
		$this->load->view("xiaozhaoprofile", $data);
	}
	
	public function setMyInfo()
	{
		$this->request_for_login();
		$data = array(
			'uid' => $this->session->userdata("uid"),
			'uname' => $this->session->userdata("user"),
			'role' => $this->input->post('role'),
			'company' => $this->input->post('company'),
			'job' => $this->input->post('job')
		);
		
		
		$this->load->model("Social_model");
		$this->Social_model->setNeituiInfo($data);
		
		$this->recommend();
	}
	
	public function test()
	{
		$txt = "";
		$data['info'] = $this->url2html($txt);
		$this->load->view("test", $data);
	}
	
	////////////////////////crawler//////////////////////////////////////////////
	
	private function checkTitle($title)
	{
		$legal_words= array('校招','校园招聘');
		$illegal_words = array('吗', '?', '？', '神器', 'Re', "请问", "请教", "求", "Alcatel", '实习');
		
		foreach($illegal_words as $word)
		{
			if(strpos($title, $word) !== false)
				return false;
		}
		
		foreach($legal_words as $word)
		{
			if(strpos($title, $word) !== false)
				return true;
		}
		
		return false;
	}
	
	private function checkContent($content)
	{	
		if(strlen($content) < 300)
			return false;
			
		$illegal_words = array('大作中提到', '查看原图', '求支招');
		foreach($illegal_words as $word)
		{
			if(strpos($content, $word) !== false)
				return false;
		}
		
		$legal_words= array('简历', '工作职责', '职位描述', '邮箱', 'Qualifications', 'Responsibilities', '@');
		foreach($legal_words as $word)
		{
			if(strpos($content, $word) !== false)
				return true;
		}
		
		return false;
	}
	
	private function getArticleContent($url)
	{
		$html = file_get_contents($url);
		$html = strchr($html, "<div class=\"sp\">");
		$html = substr($html, 16);
		
		if(($i = strpos($html, "<br>--<br />")) != false)
		{
			return substr($html, 0, $i);
		}
		
		return "";
	}

	private function parse($html, $url_src)
	{
		$result = array();
		$i = 0;
		$j = 0;
		$k = strpos($html, "<link rel");
		if($k != false)
			$html = substr($html, $k + 9);
		while(($i = strpos($html, "<li")) != false)
		{
			sleep(1);
			$html = substr($html, $i + 3);
			$html = strchr($html, "<div>");
			$html = strchr($html, "/");
			$i = strpos($html, "\"");
			$url = substr($html, 0, $i);
			
			$html = strchr($html, ">");
			$i = strpos($html, "</a>");
			$title = substr($html, 1, $i - 1);
			
			$html = strchr($html, "<div>");
			$i = strpos($html, "&nbsp;");
			$time = substr($html, 5, $i - 5);
			
			$content = $this->getArticleContent($url_src.$url);
			
			if($url == "" || $url == null || $url == false)
				break;
			
			if(strpos($time, "-") == false && $this->checkTitle($title) == true && $this->checkContent($content) == true)
			{
				$result[$j]['url'] = $url_src.$url;
				$result[$j]['content'] = $content;
				$result[$j]['title'] = $title;
				$result[$j]['time'] = $time;
				
				$this->load->model("Job_model");
				$this->Job_model->crawler_insert_fulltime_job($title, addslashes($content));
				
				++$j;
			}
			
			$html = strchr($html, "</li>");
		}
		return $result;
	}
	
	public function crawl()
	{
		$this->crawl_byr();
		$this->crawl_sm();
		$this->crawl_rd();
	}
	
	
	public function crawl_byr()
	{
		$i = 1;
		$result = array();
		while($i <= 2)
		{
			$url = 'http://m.byr.cn/board/JobInfo?p='.strval($i);
			$html = file_get_contents($url);
			$content = $this->parse($html, "http://m.byr.cn/");
			$result = array_merge($result, $content);
			++$i;
		}
	}
	
	public function crawl_sm()
	{
		$i = 1;
		$result = array();
		while($i <= 2)
		{
			$url = 'http://m.newsmth.net/board/Career_Campus?p='.strval($i);
			$html = file_get_contents($url);
			$content = $this->parse($html, "http://m.newsmth.net/");
			$result = array_merge($result, $content);
			++$i;
		}
	}
	
	public function crawl_rd()
	{
		$i = 1;
		$result = array();
		while($i <= 2)
		{
			$url = 'http://m.tdrd.org/board/Job_Post?p='.strval($i);
			$html = file_get_contents($url);
			$content = $this->parse($html, "http://m.tdrd.org/");
			$result = array_merge($result, $content);
			++$i;
		}
	}

	
	public function tuijian($count)
	{
		$this->load->model("Job_model");
		$data['items'] = $this->Job_model->get_intern_tuijian($count);
		$data['type'] = "intern";
		$this->load->view('tuijianresult', $data);
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

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
