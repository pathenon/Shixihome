<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once( 'saetv2.ex.class.php' );

class Api extends CI_Controller {

	private $count_per_page = 10;
	
	function __construct()
	{   
		parent::__construct();
		$this->load->helper('form');
		//$this->load->helper('url');
		//$this->load->library('session');
	}
	
    /*返回帮助信息*/
	public function getHelp()
	{
        $info = "感谢您关注实习之家！可按照如下格式进行实习信息查询：
        (1)发送 公司名@地名 例如 百度@北京
        (2)发送 1或热门公司 查询热门实习单位
        (3)发送 2或私企 查询私企实习职位
        (4)发送 3或外企 查询外企实习职位
        (5)发送 4或创业 查询创业公司实习职位
        (6)发送 5或国企 查询国企实习职位
        (7)发送 9或帮助 查询帮助信息.";
        
        echo $info;
	}
    
    /*搜索热门公司*/
    public function searchHotCompany()
    {
        $result[0]['job'] = '微软';
        $result[0]['url'] = 'http://www.shixihome.com/index.php/job/searchCompany/微软';
        $result[1]['job'] = '百度';
        $result[1]['url'] = 'http://www.shixihome.com/index.php/job/searchCompany/百度';
        $result[2]['job'] = '人人';
        $result[2]['url'] = 'http://www.shixihome.com/index.php/job/searchCompany/人人';
        $result[3]['job'] = '搜狐';
        $result[3]['url'] = 'http://www.shixihome.com/index.php/job/searchCompany/搜狐';
        $result[4]['job'] = '亚马逊';
        $result[4]['url'] = 'http://www.shixihome.com/index.php/job/searchCompany/亚马逊';
        $result[5]['job'] = '新浪';
        $result[5]['url'] = 'http://www.shixihome.com/index.php/job/searchCompany/新浪';
        $result[6]['job'] = '淘宝';
        $result[6]['url'] = 'http://www.shixihome.com/index.php/job/searchCompany/淘宝';
        $result[7]['job'] = '搜狗';
        $result[7]['url'] = 'http://www.shixihome.com/index.php/job/searchCompany/搜狗';
        $result[8]['job'] = '网易';
        $result[8]['url'] = 'http://www.shixihome.com/index.php/job/searchCompany/网易';
        $result[9]['job'] = '更多请点击';
        $result[9]['url'] = 'http://www.shixihome.com/index.php';
        
        echo json_encode($result);
    }
	
	/*按地名进行搜索*/
	public function searchPlace()
	{
		$place = $this->input->get("place");
		$this->load->model("Job_model");
        $jobs = $this->Job_model->getPlacePageItems("upandi_internjob",  $place, 1, 8);

        echo $this->transformJobFormat($jobs, $place);
	}
	
    
    /*搜索国内私企*/
    public function searchDomesticCompany()
    {
        $this->load->model("Job_model");
        $jobs = $this->Job_model->getCompanyTypePageItems('upandi_internjob', 'type', '国内私企', 1, 5);
        echo $this->transformJobFormat($jobs, '国内私企');
    }
	
    /*搜索大型外企*/
    public function searchInternationalCompany()
    {
         $this->load->model("Job_model");
        $jobs = $this->Job_model->getCompanyTypePageItems('upandi_internjob', 'type', '大型外企', 1, 5);
        echo $this->transformJobFormat($jobs, '大型外企');
    }
    
    /*搜索创业公司*/
    public function searchStartupCompany()
    {
        $this->load->model("Job_model");
        $jobs = $this->Job_model->getCompanyTypePageItems('upandi_internjob', 'type', '创业公司', 1, 5);
        echo $this->transformJobFormat($jobs, '创业公司');
    }
    
    /*搜索国企银行*/
    public function searchStateOwnedCompany()
    {
        $this->load->model("Job_model");
        $jobs = $this->Job_model->getCompanyTypePageItems('upandi_internjob', 'type', '国企银行', 1, 5);
        echo $this->transformJobFormat($jobs, '国企银行');
    }
    
	
    /*搜索某一公司在某一地方的实习职位*/
	public function searchCompanyAtPlace()
	{
        $company = $this->input->get("company");
		$place = $this->input->get("place");
		$page = $this->input->get("page");
		if($page == null)
			$page = 1;
		$count = $this->input->get("count");
		if($count == null)
			$count = 8;
        
        $this->load->model("Job_model");
        $jobs = $this->Job_model->getCompanyAtPlacePageItems($company, $place, $page, $count);

        echo $this->transformJobFormat($jobs, $company);
	}
    
    /*把从数据库中读取出的实习职位转换成微信需要的格式*/
    private function transformJobFormat($jobs, $type)
    {
        if($jobs != null)
		{
            $items = array();
            $items[0]['job'] = "实习之家为您找到如下职位：";
            $i = 1;
            foreach($jobs as $job)
            {
                $items[$i]['url'] = "http://www.shixihome.com/index.php/job/detail/".$job['id'];
                $items[$i]['job'] = $job['company'].":".$job['job'];
                //$items[$i]['description'] = $job['description'];
                ++$i;
            }
            
            $items[$i]['job'] = "查看更多职位，请点击";
            if($this->input->get("company"))
                $items[$i]['url'] = "http://www.shixihome.com/index.php/job/searchCompany/".$type;
            else if($this->input->get("place"))
				$items[$i]['url'] = "http://www.shixihome.com/index.php/job/searchPlace/".$type;
			else
                $items[$i]['url'] = "http://www.shixihome.com/index.php/job/searchCompanyType/".$type;
            
			return json_encode($items);
		}
		else
		{
			return "null";
		}
    }
	
	/*发表微博*/
	public function post_weibo()
	{
		$o = new SaeTOAuthV2( '3104795189' , '494fafb4a98449fb162822f37db40ec0' );
		$keys = array();
		$keys['username'] = "huazhongdian@gmail.com";
		$keys['password'] = 'abcd1234';
		
		$token = $o->getAccessToken("password", $keys);
		var_dump($token);
		
		$c = new SaeTClientV2( '3104795189' , '494fafb4a98449fb162822f37db40ec0' , $token['access_token'] );
		
		
		$this->load->model("Job_model");
		$jobs = $this->Job_model->get_intern_tuijian(3);
        $list = "";
        for($i = 0; $i < 3; ++$i)
        {
            $list .= mb_convert_encoding($jobs[$i]['job'], "GBK", "UTF-8").'   http://www.shixihome.com/index.php/job/detail/'.$jobs[$i]['id']."\n\n";
        }
		$c->post($list); 
	}
	
	public function telnet_sm()
	{
	    $this->load->model("Job_model");
		$jobs = $this->Job_model->get_intern_tuijian(10);
        $listA = "";
		$listB = "";
        for($i = 0; $i < 5; ++$i)
        {
            $listA .= mb_convert_encoding($jobs[$i]['job'], "GBK", "UTF-8").'   http://www.shixihome.com/index.php/job/detail/'.$jobs[$i]['id'].chr(17);
        }
		for($i = 5; $i < 10; ++$i)
        {
            $listB .= mb_convert_encoding($jobs[$i]['job'], "GBK", "UTF-8").'   http://www.shixihome.com/index.php/job/detail/'.$jobs[$i]['id'].chr(17);
        }
	    $fp = fsockopen("bbs.newsmth.net", 23); 
        fputs($fp, "nutchlover\n");
        fputs($fp, "1987312\n");
   
        sleep(3);
        fputs($fp, "No\n");
 
        sleep(1);
        fputs($fp, "\n");
        sleep(1);
        fputs($fp, "\n");
		sleep(1);
        fputs($fp, "\n");
        sleep(1);
        fputs($fp, "\n");
		
		sleep(1);
        fputs($fp, "e");
		sleep(1);
        fputs($fp, "\n");
		sleep(1);
        fputs($fp, "\n");

        sleep(1);
        fputs($fp, "S\n");

        sleep(3);
        fputs($fp, "parttimejobpost\n");
		
         sleep(3);
         fputs($fp, chr(16));
        
         sleep(3);
         fputs($fp, "整理了一份最新实习兼职职位列表供大家参考\n");
        
         sleep(1);
         fputs($fp, "p\n");
         sleep(1);
         fputs($fp, "\n");
          sleep(1);
         fputs($fp, "\n");
          sleep(3);
         fputs($fp, "整理了一份最新实习兼职职位列表供大家参考\n");
		 sleep(1);
         fputs($fp, "\n");
          sleep(1);
         fputs($fp, $listA."\n");
		 sleep(1);
         fputs($fp, $listB."\n");
          sleep(1);
         fputs($fp, "\n");
        
         sleep(1);
         fputs($fp, "\n");
        
         sleep(1);
         fputs($fp, "\n");
         sleep(1);
         fputs($fp, "\n");
   
        
        while(!feof($fp)) {  
			echo fgets($fp,128);  
		} 
	}
	
	public function telnet_renda()
	{
	    $this->load->model("Job_model");
		$jobs = $this->Job_model->get_intern_tuijian(10);
        $listA = "";
        for($i = 0; $i < 10; ++$i)
        {
            $listA .= mb_convert_encoding($jobs[$i]['job'], "GBK", "UTF-8").'   http://www.shixihome.com/index.php/job/detail/'.$jobs[$i]['id'].chr(17);
        }
	    $fp = fsockopen("bbs.tdrd.org", 23); 
        fputs($fp, "upandi\n");
        fputs($fp, "111111\n");
   
        sleep(3);
        fputs($fp, "\n");
 
        sleep(3);
        fputs($fp, "\n");
     
        sleep(3);
        fputs($fp, "\n");

        sleep(3);
        fputs($fp, "S\n");

        sleep(3);
        fputs($fp, "parttimejob\n");
		
         sleep(3);
         fputs($fp, chr(16));
        
         sleep(3);
         fputs($fp, "整理了一份最新实习兼职职位列表供大家参考\n");
        
         sleep(1);
         fputs($fp, "p\n");
         sleep(1);
         fputs($fp, "\n");
          sleep(1);
         fputs($fp, "\n");
          sleep(3);
         fputs($fp, "整理了一份最新实习兼职职位列表供大家参考\n");
          sleep(1);
         fputs($fp, $listA."\n");
          sleep(1);
         fputs($fp, "\n");
        
         sleep(1);
         fputs($fp, "\n");
        
         sleep(1);
         fputs($fp, "\n");
         sleep(1);
         fputs($fp, "\n");
   
        
        while(!feof($fp)) {  
			echo fgets($fp,128);  
		} 
	}
    
    public function telnet()
    {
        $this->load->model("Job_model");
		$jobs = $this->Job_model->get_intern_tuijian(10);
        $listA = "";
        $listB = "";
		for($i = 0; $i < 5; ++$i)
        {
            $listA .= mb_convert_encoding($jobs[$i]['job'], "GBK", "UTF-8").'   http://www.shixihome.com/index.php/job/detail/'.$jobs[$i]['id'].chr(17);
        }
        for($i = 5; $i < 10; ++$i)
        {
            $listB .= mb_convert_encoding($jobs[$i]['job'], "GBK", "UTF-8").'   http://www.shixihome.com/index.php/job/detail/'.$jobs[$i]['id'].chr(17);
        }
        echo $listA;
        echo $listB;
        
		$fp = fsockopen("bbs.byr.cn", 23); 
        fputs($fp, "upandi\n");
        fputs($fp, "111111\n");
        
		//sleep(3);
        fputs($fp, "\n");
        //sleep(3);
        fputs($fp, "\n");
     
        //sleep(3);
        fputs($fp, "\n");
		
		//sleep(3);
        fputs($fp, "\n");

        //sleep(3);
        fputs($fp, "S\n");

        //sleep(3);
        fputs($fp, "parttimejob\n");
      
         //sleep(3);
         fputs($fp, chr(16));
        
         //sleep(3);
         fputs($fp, "【实习之家】整理了一份最新实习职位列表供大家参考\n");
         
		 //sleep(3);
         fputs($fp, "p\n");
         //sleep(3);
         fputs($fp, "\n");
          //sleep(3);
         fputs($fp, "\n");
         // sleep(3);
         fputs($fp, "【实习之家】整理了一份最新实习职位列表供大家参考\n");
         // sleep(1);
         fputs($fp, "\n");
         // sleep(1);
         fputs($fp, "\n");
        // sleep(1);
         fputs($fp, "\n");
        // sleep(1);
         fputs($fp, "\n");
        // sleep(1);
         fputs($fp, "\n");
        // sleep(1);
         fputs($fp, "\n");
        // sleep(1);
         fputs($fp, "\n");
        // sleep(1);
         fputs($fp, "\n");
        // sleep(1);
         fputs($fp, "\n");
        // sleep(1);
         fputs($fp, "\n");
        // sleep(1);
         fputs($fp, "\n");
        // sleep(1);
         fputs($fp, "\n");
        // sleep(3);
         fputs($fp, $listA."\n");
        
        // sleep(3);
         fputs($fp, $listB."\n");
        
        // sleep(1);
         fputs($fp, "\n");
        // sleep(1);
         fputs($fp, "\n");
  echo 'done';
  return;
        while(!feof($fp)) {  
		//	echo fgets($fp,128);  
		} 
    }
}
