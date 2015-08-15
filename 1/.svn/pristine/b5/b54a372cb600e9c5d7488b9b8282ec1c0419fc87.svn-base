<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parttime extends CI_Controller {
	 
	private $count_per_page = 30;
	
	function __construct()
	{   
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index($job = "upandi_parttimejob")
	{
		session_start();
		$items = $this->get_page($job, 1);
		$data['items'] = $items;
		$data['firstpage'] = true;
		$data['page'] = 1;
		$this->load->model("Job_model");
		$data['pagecount'] = ceil(($this->Job_model->getItemCount($job)) / $this->count_per_page);
		$this->load->view("parttime", $data);
	}
	
	public function get_page($table, $page)
	{
		$this->load->model("Job_model");
		return $this->Job_model->getPageItems($table, $page, $this->count_per_page);
	}

	public function page($pagecount, $page)
	{
		$table = "upandi_parttimejob";
		$data['items'] = $this->get_page($table, $page);
		if($page == 1)
			$data['firstpage'] = true;
		else
			$data['firstpage'] = false;
		$data['page'] = $page;
		$data['pagecount'] = $pagecount;
		$this->load->view("parttime", $data);
	}


	public function detail($id)
	{
		$this->load->model("Job_model");
		$item = $this->Job_model->getItem("upandi_parttimejob", $id);
		$data['item'] = $item;
		if($item)
			$data['count'] = $this->Job_model->getItemBrowseCount("upandi_parttimelog", $id);
		$this->load->view('parttimedetail', $data);
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
	
	public function searchPlace($place)
	{	
		$key = "job";
		$value = $place;
		$this->load->model("Job_model");
		$items = $this->Job_model->getParttimePlacePageItems("upandi_parttimejob", $key, urldecode($value), 1, $this->count_per_page);		
		$data['items'] = $items;
		$data['firstpage'] = true;
		$data['page'] = 1;
		$data['type'] = 'place';
		$data['value'] = $place;
		$this->load->model("Job_model");
		$data['pagecount'] = ceil(($this->Job_model->getConditionalItemCount("upandi_parttimejob", $key, urldecode($value))) / $this->count_per_page);
		$this->load->view("parttime", $data);
	}
	
	function  place_page($page_count, $page, $place)
	{
		$items = null;
		$this->load->model("Job_model");
		$items = $this->Job_model->getParttimePlacePageItems("upandi_parttimejob", "job", urldecode($place), $page, $this->count_per_page);		
		$data['items'] = $items;
		if((int)$page > 1)
			$data['firstpage'] = false;
		else
			$data['firstpage'] = true;
		$data['page'] = $page;
		$data['type'] = 'place';
		$data['value'] = $place;
		$data['pagecount'] = $page_count; 
		$this->load->view("parttime", $data);
	}
	
	
	
	//////////////////////////////////////////////////////////////////////////////
	////////////////////////爬虫/////////////////////////////////////////////////
	
	private function checkTitle($title)
	{
		$legal_words= array('兼职', '招募', '聘');
		$illegal_words = array('实习', '吗', '?', '？', '神器', 'Re', "请问", "请教", "求", '实习之家');
		
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
		if(strlen($content) < 200)
			return false;
			
		$illegal_words = array('大作中提到', '查看原图', '求支招');
		foreach($illegal_words as $word)
		{
			if(strpos($content, $word) !== false)
				return false;
		}
		
		$legal_words= array('兼职', '招募', '聘');
		foreach($legal_words as $word)
		{
			if(strpos($content, $word) !== false)
				return true;
		}
		
		return false;
	}
	
	
	private function parse($html, $url_src, $root_src)
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
				$result[$j]['url'] = $root_src.$url;
				$result[$j]['content'] = $content;
				$result[$j]['title'] = $title;
				$result[$j]['time'] = $time;
				
				//echo $result[$j]['url']."<br/>";
				//echo $title."<br/>";
				//echo $time."<br/>";
				//echo $content."<br/><br/><br/><br/><br/>";
				
				$this->load->model("Job_model");
				$this->Job_model->crawler_insert_parttimejob($title, addslashes($content), $result[$j]['url']);
				
				++$j;
			}
			
			$html = strchr($html, "</li>");
		}
		return $result;
	}
	
	public function crawl_sm_parttime()
	{
		$i = 1;
		$result = array();
		while($i <= 5)
		{
			$url = 'http://m.newsmth.net/board/ParttimeJobPost?p='.strval($i);
			$html = file_get_contents($url);
			$content = $this->parse($html, "http://m.newsmth.net/","http://www.newsmth.net/nForum");
			$result = array_merge($result, $content);
			++$i;
		}
		
		//$data['info'] = $result;
		//$this->load->view("test", $data);
	}
	
	public function crawl_sm_jiajiao()
	{
		$i = 1;
		$result = array();
		while($i <= 5)
		{
			$url = 'http://m.newsmth.net/board/JiaJiao?p='.strval($i);
			$html = file_get_contents($url);
			$content = $this->parse($html, "http://m.newsmth.net/", "http://www.newsmth.net/nForum");
			$result = array_merge($result, $content);
			++$i;
		}
		
		//$data['info'] = $result;
		//$this->load->view("test", $data);
	}
	
	public function crawl_byr_jianzhi()
	{
		$i = 1;
		$result = array();
		while($i <= 5)
		{
			$url = 'http://m.byr.cn/board/ParttimeJob?p='.strval($i);
			$html = file_get_contents($url);
			$content = $this->parse($html, "http://m.byr.cn/", "http://bbs.byr.cn/");
			$result = array_merge($result, $content);
			++$i;
		}
		
		//$data['info'] = $result;
		//$this->load->view("test", $data);
	}
	
	public function crawl_rd_jianzhi()
	{
		$i = 1;
		$result = array();
		while($i <= 5)
		{
			$url = 'http://m.tdrd.org/board/ParttimeJob?p='.strval($i);
			$html = file_get_contents($url);
			$content = $this->parse($html, "http://m.tdrd.org/", "http://www.tdrd.org/nForum");
			$result = array_merge($result, $content);
			++$i;
		}
		
		//$data['info'] = $result;
		//$this->load->view("test", $data);
	}
	
	public function parse_douban_article($content)
	{
		$i = strpos($content, '<div class="topic-content">');
		if($i != false)
		{
			$content = substr($content, $i + 27);
			$j = strpos($content, '<div class="sns-bar" id="sep">');
			if($j != false)
				return substr($content, 0, $j);
		}
		
		return '';
	}
	
	public function parse_douban($html, $meta, $type)
	{
		$result = array();
		$i = 0;
		$j = 0;
		$idx = 0;
		$k = strpos($html, '<table class="olt">');
		if($k != false)
			$html = substr($html, $k + 20);
		while(($i = strpos($html, '<tr class="">')) != false)
		{
			$html = substr($html, $i + 14);
			
			$i = strpos($html, 'http');
			$j = strpos($html, '/"');
			if($i != false && $j != false)
			{
				$url = substr($html, $i, $j - $i + 1);
				$html = substr($html, $j);
				$i = strpos($html, '>');
				$j = strpos($html, '<');
				$title = substr($html, $i+1, $j - $i -1);
				$content = $this->parse_douban_article(file_get_contents($url));
				$i = strpos($html, 'class="time">');
				$html = substr($html, $i + 13);
				$j = strpos($html, '</td>');			
				$time = substr($html, 0, $j);
				if(strpos($time, (string)date('m-d')) === false)
					break;
				
				$result[$idx]['url'] = $url;
				$result[$idx]['title'] = $meta.$title;
				$result[$idx]['content'] = str_replace(array("div"), "span", $content);
				$result[$idx]['time'] = $time;
				
				//echo $url."<br/>";
				//echo $title."<br/>";
				//echo $content."<br/>";
				//echo $time."<br/><br/>";
				$this->load->model("Job_model");
				if($type == 1)
					$this->Job_model->crawler_insert_parttimejob(addslashes($result[$idx]['title']), addslashes($result[$idx]['content']), $result[$idx]['url']);
				else if($type == 2)
					$this->Job_model->crawler_insert_job(addslashes($result[$idx]['title']), addslashes($result[$idx]['content']));
				
				++$idx;
			}
		}
		sleep(3);
		return $result;
	}
	
	public function crawl_douban_parttime($root, $meta)
	{
		$i = 0;
		$result = array();
		while($i <= 2*25)
		{
			$url = $root.strval($i);
			$html = file_get_contents($url);
			$content = $this->parse_douban($html, $meta, 1);
			$result = array_merge($result, $content);
			$i = $i + 25;;
		}
	}
	
	public function crawl_douban_parttime_bj1()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/part-time/discussion?start=', '【北京】');
	}
	
	public function crawl_douban_parttime_bj2()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/bjdxsjzxz/discussion?start=', '【北京】');
	}
	
	public function crawl_douban_parttime_sh()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/100742/discussion?start=', '【上海】');
	}
	
	public function crawl_douban_parttime_hz()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/354503/discussion?start=', '【杭州】');
	}
	
	public function crawl_douban_parttime_wh()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/121625/discussion?start=', '【武汉】');
	}
	
	public function crawl_douban_parttime_gz()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/353130/discussion?start=', '【广州】');
	}
	
	public function crawl_douban_parttime_cd()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/357414/discussion?start=', '【成都】');
	}
	
	public function crawl_douban_parttime_xian()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/xianjianzhi/discussion?start=', '【西安】');
	}
	
	public function crawl_douban_parttime_nanjing()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/jianzhi/discussion?start=', '【南京】');
	}
	public function crawl_douban_parttime_jinan()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/77401/discussion?start=', '【济南】');
	}
	
	public function crawl_douban_parttime_changsha()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/181202/discussion?start=', '【长沙】');
	}
	
	public function crawl_douban_parttime_xiamen()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/176085/discussion?start=', '【厦门】');
	}
	
	public function crawl_douban_parttime_tianjin()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/177817/discussion?start=', '【天津】');
	}
	
	public function crawl_douban_parttime_shenzhen()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/szjzw/discussion?start=', '【深圳】');
	}
	
	public function crawl_douban_parttime_suzhou()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/209703/discussion?start=', '【苏州】');
	}
	
	public function crawl_douban_parttime_changchun()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/86533/discussion?start=', '【长春】');
	}
	
	public function crawl_douban_parttime_dalian()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/dlgq/discussion?start=', '【大连】');
	}
	
	public function crawl_douban_parttime_chongqing()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/355248/discussion?start=', '【重庆】');
	}
	
	public function crawl_douban_parttime_zhengzhou()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/228270/discussion?start=', '【郑州】');
	}
	
	public function crawl_douban_parttime_shijiazhuang()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/sjz-job/discussion?start=', '【石家庄】');
	}
	
	public function crawl_douban_parttime_hefei()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/hefeizhaopin/discussion?start=', '【合肥】');
	}
	
	public function crawl_douban_parttime_qingdao()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/223957/discussion?start=', '【青岛】');
	}
	
	public function crawl_douban_parttime_taiyuan()
	{
		$this->crawl_douban_parttime('http://www.douban.com/group/389712/discussion?start=', '【太原】');
	}
	
	public function crawl_douban()
	{
		$this->crawl_douban_parttime_bj1();
		$this->crawl_douban_parttime_bj2();
		$this->crawl_douban_parttime_sh();
		$this->crawl_douban_parttime_hz();
		$this->crawl_douban_parttime_wh();
		$this->crawl_douban_parttime_gz();
		$this->crawl_douban_parttime_cd();
		$this->crawl_douban_parttime_suzhou();
		$this->crawl_douban_parttime_changchun();
		$this->crawl_douban_parttime_dalian();
		$this->crawl_douban_parttime_chongqing();
	}
	
	public function crawl_douban2()
	{
		$this->crawl_douban_parttime_xian();
		$this->crawl_douban_parttime_nanjing();
		$this->crawl_douban_parttime_jinan();
		$this->crawl_douban_parttime_changsha();
		$this->crawl_douban_parttime_xiamen();
		$this->crawl_douban_parttime_tianjin();
		$this->crawl_douban_parttime_shenzhen();
		$this->crawl_douban_parttime_zhengzhou();
		$this->crawl_douban_parttime_shijiazhuang();
		$this->crawl_douban_parttime_hefei();
		$this->crawl_douban_parttime_qingdao();
		$this->crawl_douban_parttime_taiyuan();
	}
	
	public function tuijian($place, $count)
	{
		$this->load->model("Job_model");
		$data['items'] = $this->Job_model->get_parttime_tuijian(urldecode($place), $count);
		$data['type'] = "parttime";
		$this->load->view('tuijianresult', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
