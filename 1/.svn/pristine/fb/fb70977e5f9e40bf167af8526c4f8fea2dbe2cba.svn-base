<?php
class Job_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/*向数据库插入一条实习职位信息*/
	function addJob($table, $item)
	{
		$sql = "insert into ".$table."(company, type, job, description, requirement, salary, person, phone, email, online, place, other, publish_by) values('".$item['company']."','".$item['type']."','".$item['job']."','".$item['description']."','".$item['requirement']."','".$item['salary']."','".$item['person']."','".$item['phone']."','".$item['email']."','".$item['online']."','".$item['place']."','".$item['other']."',".$item['publish_by'].")";
		$query = $this->db->query($sql);
	}
	
	function crawler_insert_job($title, $content)
	{
		$sql = "select * from upandi_internjob where job='".$title."' and  UNIX_TIMESTAMP(publish_time) > ".(time()-86400);
		
		$query = $this->db->query($sql);
		if(count($query->result_array()) > 0)
			return;
			
		$sql = "insert into upandi_internjob(company, type, job, description, requirement, salary, person, phone, email, online, place, other, publish_by) values('"." "."','"." "."','".$title."','".$content."','"." "."','"." "."','"." "."','"." "."','"." "."','"." "."','"." "."','"." "."',-1)";
		$query = $this->db->query($sql);
	}
	
	function crawler_insert_fulltime_job($title, $content)
	{
		$sql = "select * from upandi_xiaozhaojob where job='".$title."' and  UNIX_TIMESTAMP(publish_time) > ".(time()-86400);
		
		$query = $this->db->query($sql);
		if(count($query->result_array()) > 0)
			return;
			
		$sql = "insert into upandi_xiaozhaojob(company, type, job, description, requirement, salary, person, phone, email, online, place, other, publish_by) values('"." "."','"." "."','".$title."','".$content."','"." "."','"." "."','"." "."','"." "."','"." "."','"." "."','"." "."','"." "."',-1)";
		$query = $this->db->query($sql);
	}
	
	function crawler_insert_parttimejob($title, $content, $source)
	{
		$sql = "select * from upandi_parttimejob where job='".$title."' and  UNIX_TIMESTAMP(publish_time) > ".(time()-86400);
		
		$query = $this->db->query($sql);
		if(count($query->result_array()) > 0)
			return;
			
		$sql = "insert into upandi_parttimejob(job, description, source) values('".$title."', '".$content."', '".$source."')";
		$query = $this->db->query($sql);
	}
	
	function updateJob($item)
	{
		$sql = "update upandi_internjob set company='".$item['company']."',type='".$item['type']."',job='".$item['job']."',description='".$item['description']."',requirement='".$item['requirement']."',salary='".$item['salary']."',person='".$item['person']."',phone='".$item['phone']."',email='".$item['email']."',online='".$item['online']."',place='".$item['place']."',other='".$item['other']."',publish_by=".$item['publish_by'].", publish_time=FROM_UNIXTIME(".time().") where id=".$item['id'];
		$query = $this->db->query($sql);
	}
	
	function updateTime($id)
	{
		$sql = "update upandi_internjob set publish_time=FROM_UNIXTIME(".time().") where id=".$id;
		$this->db->query($sql);
	}

	/*获取给定表中所有的条目，并按照发布时间逆序排序*/
	function getAllItems($table)
	{
		$sql = "select * from ".$table." where state=1 order by publish_time desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	/*获取三天内由HR发的帖子进行推荐*/
	function getRecommendItems($table="upandi_internjob")
	{
		$sql = "select * from  ".$table." where state=1 and publish_by != -1 and UNIX_TIMESTAMP(publish_time) > ".(time()-86400*3)." order by publish_time desc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	/*获取跟某条帖子相关的推荐帖子*/
	function getRelatedRecommendItems($id)
	{
		$sql = "select * from  upandi_internjob where id >".($id-4)." and id<".$id;
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	/*获取一周内热门内推帖子*/
	function getHotNeiTuiItems()
	{
		$sql = "select C.job, C.id from (select * from upandi_internjob as A where A.state=1 and A.job like '%内推%' and UNIX_TIMESTAMP(A.publish_time) > ".(time()-86400*7).") as C join upandi_internlog B on C.id=B.job order by B.count desc limit 0, 3";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	/*获取一周内热门暑期实习帖子*/
	function getHotSummerItems()
	{
		$sql = "select C.job, C.id from (select * from upandi_internjob as A where A.state=1 and  A.job like '%暑期%'  and UNIX_TIMESTAMP(A.publish_time) > ".(time()-86400*7).") as C join upandi_internlog B on C.id=B.job order by B.count desc limit 0, 3";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	/*获取给定表中的条目记录*/
	function getItemCount($table)
	{
		$sql = "select count(*) as count from ".$table;
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return (int)($result[0]['count']);
	}
	
	/*获取给定表中地址为place的条目数*/
	function getPlaceItemCount($table, $place)
	{		
		return $this->getConditionalItemCount($table, "place", $place);
	}
	
	/*获取给定表中field字段值为value的条目数*/
	function getConditionalItemCount($table, $field, $value)
	{
		$sql = "select count(*) as count from ".$table." where state=1 and ".$field." like '%".$value."%'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return (int)($result[0]['count']);
	}

	/*获取给定表中的第page页的所有条目，每一页的条目数是count_per_page*/
	function getPageItems($table, $page, $count_per_page)
	{
		$sql = "select * from ".$table." as tb where state=1 and UNIX_TIMESTAMP(publish_time) > ".(time()-86400*30)." order by tb.publish_time desc limit ".(string)($count_per_page*($page - 1))." , ".(string)($count_per_page);
		$query = $this->db->query($sql);
		$result = $query->result_array();
	
		return $result;
	}
	
	/*按地址搜索时，给出第page页的结果*/
	function getPlacePageItems($table, $place, $page, $count_per_page)
	{		
		return $this->getConditionalPageItems($table, "place", $place, $page, $count_per_page);
	}
	
	/*按公司搜索时，给出第page页的结果*/
	function getCompanyPageItems($table, $field, $value, $page, $count_per_page)
	{
		return $this->getConditionalPageItems($table, $field, $value, $page, $count_per_page);
	}
	
	function getCompanyAtPlacePageItems($company, $place, $page, $count_per_page)
	{
		$sql = "select * from upandi_internjob as tb where state=1 and company like '%".$company."%' and place like '%".$place."%' order by tb.publish_time desc limit ".(string)($count_per_page*($page - 1))." , ".(string)($count_per_page);
		$query = $this->db->query($sql);
		$result = $query->result_array();
	
		return $result;
	}
    
    /*获取特定类型公司的实习职位的某一页数据*/
    function getCompanyTypePageItems($table, $field, $value, $page, $count_per_page)
    {
        return $this->getConditionalPageItems($table, $field, $value, $page, $count_per_page);
    }
	
	/*获取给定表中字段为field，值为value的第page页的所有条目*/
	function getConditionalPageItems($table, $field, $value, $page, $count_per_page)
	{
		$sql = "select * from ".$table." as tb where state=1 and ".$field." like '%".$value."%' or description like '%".$value."%' order by tb.publish_time desc limit ".(string)($count_per_page*($page - 1))." , ".(string)($count_per_page);
		$query = $this->db->query($sql);
		$result = $query->result_array();
	
		return $result;
	}
	
	function getParttimePlacePageItems($table, $field, $value, $page, $count_per_page)
	{
		$sql = "select * from ".$table." as tb where state=1 and ".$field." like '%".$value."%'  order by tb.publish_time desc limit ".(string)($count_per_page*($page - 1))." , ".(string)($count_per_page);
		$query = $this->db->query($sql);
		$result = $query->result_array();
	
		return $result;
	}
	
	function getSpecialCompanyPageItems($table, $field, $value, $page, $count_per_page)
	{
		$sql = "select * from ".$table." as tb where state=1 and ".$field." like '%".$value."%' or job like '%".$value."%' order by tb.publish_time desc limit ".(string)($count_per_page*($page - 1))." , ".(string)($count_per_page);
		$query = $this->db->query($sql);
		$result = $query->result_array();
	
		return $result;
	}
	
	function searchCategory($table, $keywords, $page, $count_per_page)
	{
		$pattern = '';
		for($i = 0; $i <count($keywords)-1; ++$i)
		{
			$pattern .= " job like '%".$keywords[$i]."%' or ";
		}
		if(count($keywords) > 0)
			$pattern .= " job like '%".$keywords[$i]."%' ";
			
		$sql = "select * from ".$table." as tb where state=1 and ".$pattern." order by tb.publish_time desc limit ".(string)($count_per_page*($page - 1))." , ".(string)($count_per_page);
		$query = $this->db->query($sql);
		$result = $query->result_array();
	
		return $result;
	}
	
	public function getCategoryPageCount($table, $keywords)
	{
		$pattern = '';
		for($i = 0; $i <count($keywords)-1; ++$i)
		{
			$pattern .= " job like '%".$keywords[$i]."%' or ";
		}
		if(count($keywords) > 0)
			$pattern .= " job like '%".$keywords[$i]."%' ";
			
		$sql = "select * from ".$table." as tb where state=1 and ".$pattern;
		$query = $this->db->query($sql);
		$result = $query->result_array();
	
		return count($result);
	}

	/*获取给定表中给定id的条目*/
	function getItem($table, $id)
	{
		$sql = "select * from ".$table." where id=".$id;
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		if(array_key_exists(0, $result))
			return $result[0];
		else
			return null;
	}
	
	/*获取给定表中给定id值的记录的访问数*/
	function getItemBrowseCount($table, $id)
	{
		//先增加一个访问量
		$sql = "insert into ".$table."(job, count) values(".$id.",1) on duplicate key update count=count+1";
		$this->db->query($sql);
		
		//再读取出浏览量
		$sql = "select count from ".$table." where job=".$id;
		$query = $this->db->query($sql);
		$result = $query->result_array();

		if($result == null)
			return 0;
		else
			return $result[0]['count'];
	}
	
	function search($key, $value)
	{
		$this->add_search_log($this->session->userdata("user"), $key." = ". $value);
	
		$sql = "select * from upandi_internjob where state=1 and ".$key."='".$value."' order by publish_time desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}

	function summer()
	{
	
		$sql = "select * from upandi_internjob where state=1 and job like '%2015%' or job like '%暑期%' order by publish_time desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function getSummerItemCount()
	{
		$sql = "select count(*) as count from upandi_internjob where state=1 and job like '%2014%' or job like '%暑期%'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return (int)($result[0]['count']);
	}
	
	function getSummerPageItems($table, $page, $count_per_page)
	{
		$sql = "select * from ".$table." as tb where state=1 and job like '%2015%' or job like '%暑期%' order by tb.publish_time desc limit ".(string)($count_per_page*($page - 1))." , ".(string)($count_per_page);
		$query = $this->db->query($sql);
		$result = $query->result_array();
	
		return $result;
	}
	
	function recommend($table="upandi_internjob")
	{
	
		$sql = "select * from ".$table." where state=1 and job like '%内推%' order by publish_time desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function getRecommendItemCount($table="upandi_internjob")
	{
		$sql = "select count(*) as count from ".$table." where state=1 and job like '%内推%'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return (int)($result[0]['count']);
	}
	
	function getRecommendPageItems($table, $page, $count_per_page)
	{
		$sql = "select * from ".$table." as tb where state=1 and job like '%内推%' order by tb.publish_time desc limit ".(string)($count_per_page*($page - 1))." , ".(string)($count_per_page);
		$query = $this->db->query($sql);
		$result = $query->result_array();
	
		return $result;
	}
	
	function fuzzy_search($key, $value)
	{
		$this->add_search_log($this->session->userdata("user"), $key." like ".$value);
		
		$sql = "select * from upandi_internjob where state=1 and ".$key." like '%".$value."%' order by publish_time desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function powerful_search($table, $words, $keyword)
	{
		$this->add_search_log($this->session->userdata("user"), $keyword);
		
		$sql = null;
		if(count($words) == 1)
		{
			$sql = "select * from ".$table." where state=1 and company like '%".$words[0]."%' or job like '%".$words[0]."%' or description like '%".$words[0]."%' order by publish_time desc";
		}
		else if(count($words) >= 2)
		{
			$sql = "select * from ".$table." where state=1 and company like '%".$words[0]."%' and job like '%".$words[1]."%' or description like '%".$words[0]."%' and description like '%".$words[1]."%' order by publish_time desc"; 
		}
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function leave_message($message)
	{
		$sql = "insert into hzd_message(`from`, `to`, `content`)"." values('', '','".$message."')";
		$this->db->query($sql);
	}

	function get_all_messages()
	{
		$sql = "select * from hzd_message";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	
	////////////////////////////////////////////
	function addFriend($data)
	{
		$sql = "insert into upandi_friends(uid, uname, avatar, target) values(".$data['uid'].", '".$data['uname']."', '".$data['avatar']."',".$data['target'].")";
		$this->db->query($sql);
	}
	
	/////////////////////面经处理逻辑////////////////////////////////
	
	/*获取面经总数*/
	function get_experience_count()
	{
		return $this->getItemCount("upandi_experience");
	}
	
	function get_page_experience($page, $count_per_page)
	{	
		return $this->getPageItems("upandi_experience", $page, $count_per_page);
	}

	function get_experience($id)
	{
		//先增加一个访问量
		$sql = "update upandi_experience set browse_count=browse_count+1 where id=".$id;
		$this->db->query($sql);
		return $this->getItem("upandi_experience", $id);
	}
	
	function add_experience($experience)
	{
		$sql = "insert into upandi_experience(title, content, type, browse_count, publish_by) values('".$experience['title']."','"
																									   .$experience['content']."','"
																									   .$experience['type']."',"
																									   .$experience['browse_count'].",'"
																									   .$experience['publish_by']."')";
		$this->db->query($sql);
	}
	
	function search_experience($keyword)
	{
		$this->add_search_log($this->session->userdata("user"), $keyword);
		
		$sql = "select * from upandi_experience where title like '%".$keyword."%'";
		$query = $this->db->query($sql);
		
		return $query->result_array();
	}
	
	function add_search_log($user, $content)
	{
		$sql = "insert into upandi_searchlog(user, content, ip) values('".$user."','".$content."','".$this->getClientIP()."')" ;
		$this->db->query($sql);
	}
	
	//修改职位状态
	function changeJobState($id, $to)
	{
		$sql = "update upandi_internjob set state=".$to." , publish_time=FROM_UNIXTIME(".time().") where id=".$id;
		$this->db->query($sql);
	}
	
	// 获取IP地址（摘自discuz）
	private function getClientIp()
	{
		$ip='未知IP';

		if(!empty($_SERVER['HTTP_CLIENT_IP']))
		{
			$ip =  $this->is_ip($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:$ip;
		}
		elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
			$ip =  $this->is_ip($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$ip;
		}
		
		if($ip=='未知IP')
		{
			return $_SERVER['REMOTE_ADDR'];
		}
		else
			return $ip;
	}

	private function is_ip($str)
	{
		$ip=explode('.',$str);
		for($i=0;$i<count($ip);$i++)
		{  
			if($ip[$i]>255)
			{  
				return false;  
			}  
		}  
		return preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/',$str);  
	}
	
	
	/////////////////////////////////////////tools for admin
	public function get_parttime_tuijian($place, $count)
	{
		$sql = "select * from upandi_parttimejob as tb where state=1 and job like '%".$place."%' order by tb.publish_time desc limit 0 , ".(string)($count);
		$query = $this->db->query($sql);
		$result = $query->result_array();
	
		return $result;
	}
	
	public function get_intern_tuijian($count)
	{
		$sql = "select * from upandi_internjob as tb where state=1 order by tb.publish_time desc limit 0 , ".(string)($count);
		$query = $this->db->query($sql);
		$result = $query->result_array();
	
		return $result;
	}
}

?>
