<?php
class Social_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function getLookingJobMembers()
	{
		$sql = "select * from upandi_intern where state=0";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function getHaveJobMembers()
	{
		$sql = "select * from upandi_intern where state=1";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		
		return $result;
	}
	
	function get_neitui_people()
	{
		$sql = "select * from upandi_neitui where role=1 and state=1";
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
		$sql = "insert into upandi_intern(uid, uname, state, company) values(".$data['uid'].",'".$data['uname']."',".$data['state'].",'".$data['company']."')";
		$this->db->query($sql);
	}
	
	function setNeituiInfo($data)
	{
		$sql = "insert into upandi_neitui(uid, uname, role, company, job) values(".$data['uid'].",'".$data['uname']."',".$data['role'].",'".$data['company']."','".$data['job']."')";
		$this->db->query($sql);
	}
	
	function addIntern($data)
	{
		$sql = "insert into upandi_intern(uid, uname, avatar, company, job, time, content, contribution) values(".$data['uid'].",'".$data['uname']."','".$data['avatar']."','".$data['company']."','".$data['job']."','".$data['time']."','".$data['content']."','".$data['contribution']."')";
		$this->db->query($sql);
	}
	
	function addResume($data)
	{
		$sql = "insert into upandi_resumes(uid, email, phone, name, school, grade, major, education, internship, project, other, linkedin) values(".$data['uid'].",'".$data['email']."','".$data['phone']."','".$data['name']."','".$data['school']."','".$data['grade']."','".$data['major']."','".$data['education']."','".$data['internship']."','".$data['project']."','".$data['other']."','".$data['linkedin']."')";
		$this->db->query($sql);
	}
	
}
?>