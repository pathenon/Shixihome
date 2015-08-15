<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bbs extends CI_Controller {

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
	 
	private $count_per_page = 20;
	
	function __construct()
	{   
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
	}
	
	function index()
	{
		$this->load->model("Bbs_model");
		$data['topics'] = $this->Bbs_model->getAllTopic();
		
		$items = $this->get_page("upandi_bbstopic", 1);
		$data['topics'] = $items;
		$data['firstpage'] = true;
		$data['page'] = 1;
		$this->load->model("Bbs_model");
		$data['pagecount'] = ceil(($this->Bbs_model->getTopicCount()) / $this->count_per_page);
		
		$this->load->view("bbs", $data);
	}
	
	function get_page($table, $page)
	{
		$this->load->model("Bbs_model");
		return $this->Bbs_model->getPageItems($table, $page, $this->count_per_page);
	}

	 function page($pagecount, $page)
	{
		$table = "upandi_bbstopic";
		$data['topics'] = $this->get_page($table, $page);
		if($page == 1)
			$data['firstpage'] = true;
		else
			$data['firstpage'] = false;
		$data['page'] = $page;
		$data['pagecount'] = $pagecount;
		$this->load->view("bbs", $data);
	}
	
	function request_for_login()
	{
		if(!$this->session->userdata('user'))
		{
			echo "<script type='text/javascript'>";  
			echo "window.location.href='/index.php/user/login'";  
			echo "</script>"; 
		}
	}
	
	function publishTopic()
	{
		$this->request_for_login();
		$this->load->view("publishtopic");
	}
	
	
	public function addTopic()
	{
		$this->request_for_login();

		$data = array(
			'title' => addslashes($this->input->post('title')),
			'content' => addslashes($this->url2html(str_replace(array("\r\n", "\n", "\r"), "<br/>", $this->input->post('content')))),
			'id' => $this->session->userdata("uid"),
			'name' => $this->session->userdata("user"),
			'avatar' => $this->session->userdata("avatar")
		);
		if($data['title'] == NULL)
		{
			$data['info'] = "标题不能为空";
			$this->load->view('publishtopic', $data);
			return;
		}
		if($data['content'] == NULL)
		{
			$data['info'] = "内容不能为空";
			$this->load->view('publishtopic', $data);
			return;
		}

		$this->load->model("Bbs_model");
		$this->Bbs_model->addTopic($data);
		$this->index();
	}
	
	function getTopic($id)
	{
		$this->load->model("Bbs_model");
		$data['topic'] = $this->Bbs_model->getTopic($id);
		if($data['topic'])
			$data['replies'] = $this->Bbs_model->getTopicReply($id);
		
		$this->load->view("topic", $data);
	}
	
	public function addReply()
	{
		$this->request_for_login();

		$data = array(
			'topic_id' => $this->input->post('topic_id'),
			'content' => addslashes(str_replace(array("\r\n", "\n", "\r"), "<br/>",$this->input->post('content'))),
			'id' => $this->session->userdata("uid"),
			'name' => $this->session->userdata("user")
		);
		
		if($data['content'] == NULL)
		{
			$data['info'] = "内容不能为空";
			$this->getTopic($data['topic_id']);
			return;
		}

		$this->load->model("Bbs_model");
		$this->Bbs_model->addReply($data);

		$this->getTopic($data['topic_id']);
	}
	
	/**
 * 友好的时间显示
 *
 * @param int    $sTime 待显示的时间
 * @param string $type  类型. normal | mohu | full | ymd | other
 * @param string $alt   已失效
 * @return string
 */
 function friendlyDate($sTime,$type = 'normal',$alt = 'false') {
    if (!$sTime)
        return '';
    //sTime=源时间，cTime=当前时间，dTime=时间差
    $cTime      =   time();
    $dTime      =   $cTime - $sTime;
    $dDay       =   intval(date("z",$cTime)) - intval(date("z",$sTime));
    //$dDay     =   intval($dTime/3600/24);
    $dYear      =   intval(date("Y",$cTime)) - intval(date("Y",$sTime));
    //normal：n秒前，n分钟前，n小时前，日期
    if($type=='normal'){
        if( $dTime < 60 ){
            if($dTime < 10){
                return '刚刚';    //by yangjs
            }else{
                return intval(floor($dTime / 10) * 10)."秒前";
            }
        }elseif( $dTime < 3600 ){
            return intval($dTime/60)."分钟前";
        //今天的数据.年份相同.日期相同.
        }elseif( $dYear==0 && $dDay == 0  ){
            //return intval($dTime/3600)."小时前";
            return '今天'.date('H:i',$sTime);
        }elseif($dYear==0){
            return date("m月d日 H:i",$sTime);
        }else{
            return date("Y-m-d H:i",$sTime);
        }
    }elseif($type=='mohu'){
        if( $dTime < 60 ){
            return $dTime."秒前";
        }elseif( $dTime < 3600 ){
            return intval($dTime/60)."分钟前";
        }elseif( $dTime >= 3600 && $dDay == 0  ){
            return intval($dTime/3600)."小时前";
        }elseif( $dDay > 0 && $dDay<=7 ){
            return intval($dDay)."天前";
        }elseif( $dDay > 7 &&  $dDay <= 30 ){
            return intval($dDay/7) . '周前';
        }elseif( $dDay > 30 ){
            return intval($dDay/30) . '个月前';
        }
    //full: Y-m-d , H:i:s
    }elseif($type=='full'){
        return date("Y-m-d , H:i:s",$sTime);
    }elseif($type=='ymd'){
        return date("Y-m-d",$sTime);
    }else{
        if( $dTime < 60 ){
            return $dTime."秒前";
        }elseif( $dTime < 3600 ){
            return intval($dTime/60)."分钟前";
        }elseif( $dTime >= 3600 && $dDay == 0  ){
            return intval($dTime/3600)."小时前";
        }elseif($dYear==0){
            return date("Y-m-d H:i:s",$sTime);
        }else{
            return date("Y-m-d H:i:s",$sTime);
        }
    }
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
?>