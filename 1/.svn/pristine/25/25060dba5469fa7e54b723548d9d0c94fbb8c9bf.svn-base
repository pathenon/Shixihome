<?php
class Bbs_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function addTopic($topic)
	{
		$sql = "insert into upandi_bbstopic(title, content, publish_by_id, publish_by_name, publish_avatar) values('".$topic['title']."','".$topic['content']."',".$topic['id'].",'".$topic['name']."','".$topic['avatar']."')";
		$this->db->query($sql);
	}
	
	function addBrowseCount($tid)
	{
		$sql = "update upandi_bbstopic set browse_count=browse_count+1 where id=".$tid;
		$this->db->query($sql);
	}
	
	function addReplyCount($tid)
	{
		$sql = "update upandi_bbstopic set reply_count=reply_count+1 where id=".$tid;
		$this->db->query($sql);
	}
	
	function addReply($reply)
	{
		$sql = "insert into upandi_bbsreply(topic_id, content, publish_by_id, publish_by_name) values(".$reply['topic_id'].",'".$reply['content']."',".$reply['id'].",'".$reply['name']."')";
		$this->db->query($sql);
		
		$this->addReplyCount($reply['topic_id']);
	}
	
	function getAllTopic()
	{
		$sql = "select * from upandi_bbstopic order by publish_time desc";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	
	function getTopicCount()
	{
		$sql = "select count(*) as count from upandi_bbstopic";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return (int)($result[0]['count']);
	}
	
	/*获取给定表中的第page页的所有条目，每一页的条目数是count_per_page*/
	function getPageItems($table, $page, $count_per_page)
	{
		$sql = "select * from ".$table." as tb order by tb.publish_time desc limit ".(string)($count_per_page*($page - 1))." , ".(string)($count_per_page);
		$query = $this->db->query($sql);
		$result = $query->result_array();
	
		return $result;
	}
	
	function getTopic($id)
	{
		$this->addBrowseCount($id);
		$sql = "select * from upandi_bbstopic where id=".$id;
		$result = $this->db->query($sql)->result_array();
		if(array_key_exists(0, $result))
			return $result[0];
		else
			return null;
	}
	
	function getTopicReply($id)
	{
		$sql = "select * from upandi_bbsreply where topic_id=".$id;
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	
}

?>