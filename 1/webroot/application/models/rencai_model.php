<?php
class Rencai_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function getLookingJobMembers()
	{
		$sql = "select * from upandi_intern where role=0 and state =1";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function sendEmail($data)
	{
		$sql = "insert into upandi_message(from_id, from_name, to_id, to_name, content) values(".$data['from_id'].",'".$data['from_name']."',".$data['to_id'].",'".$data['to_name']."','".$data['content']."')";
		$this->db->query($sql);
	}
	
	function setMyInfo($data)
	{
		$sql = "insert into upandi_intern(uid, uname, avatar, role, job, resume) values(".$data['uid'].",'".$data['uname']."','".$data['avatar']."', 0 ,'".$data['job']."', '".$data['resume']."')";
		$this->db->query($sql);
	}
	
	function updateInfo($data)
	{
		$sql = "update upandi_intern set job='".$data['job']."', resume='".$data['resume']."', state=".$data['state']." where uid=".$data['id'];
		$this->db->query($sql);
	}
	

}
?>