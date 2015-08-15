<?php
class User_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function registeredEmail($email)
	{
		$sql = "select * from upandi_account where email='".$email."'";
		$query = $this->db->query($sql);
		if(count($query->result_array()) > 0)
			return true;
		else
			return false;
	}
	
	function registeredUserName($name)
	{
		$sql = "select * from upandi_account where name='".$name."'";
		$query = $this->db->query($sql);
		if(count($query->result_array()) > 0)
			return true;
		else
			return false;
	}
	
	function addUser($email, $name, $pwd)
	{
		$sql = "insert into upandi_account(name, email, pwd) values('".$name."','".$email."','".$pwd."')";
		$query = $this->db->query($sql);
		
	//	return mysql_insert_id();
		$sql = "select * from upandi_account where email='".$email."'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		if(count($result) > 0)
			return $result[0]['id'];
	}
	
	function addSocialAccount($account, $name, $avatar)
	{
		$sql = "select * from upandi_account where social_account='".$account."'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		if(count($result) > 0)
		{
			$sql = "update upandi_account set avatar='".$avatar."' where social_account='".$account."'";
			$this->db->query($sql);
			return $result[0]['id'];
		}
		else
		{
			$sql = "insert into upandi_account(name, social_account, avatar) values('".$name."','".$account."','".$avatar."')";
			$query = $this->db->query($sql);
			
			$sql = "select max(id) from upandi_account";
			$query = $this->db->query($sql);
			$result = $query->result_array();
			if(count($result) > 0)
			{
				return $result[0]['max(id)'];
				}
			//return mysql_insert_id();
		}
	}
	
	function legalUser($email, $pwd)
	{
		$sql = "select * from upandi_account where email='".$email."' and pwd='".$pwd."'";
		$query = $this->db->query($sql);
		if(count($query->result_array()) > 0)
			return true;
		else
			return false;
	}
	
	function getUserFromEmail($email)
	{
		$sql = "select id, name from upandi_account where email='".$email."'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result[0];
	}
	
	function findUserByName($name)
	{
		$sql = "select * from upandi_account where name='".$name."'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		if(count($result) > 0)
			return $result[0];
		else
			return null;
	}
	
	function findUserByID($id)
	{
		$sql = "select * from upandi_account where id=".$id;
		$query = $this->db->query($sql);
		$result = $query->result_array();
		if(count($result) > 0)
			return $result[0];
		else
			return null;
	}
	
	function findInternByID($id)
	{
		$sql = "select * from upandi_intern where uid=".$id;
		$query = $this->db->query($sql);
		$result = $query->result_array();
		if(count($result) > 0)
			return $result;
		else
			return null;
	}
	
	function findPublishJobs($id)
	{
		$sql = "select * from upandi_internjob where publish_by=".$id." order by publish_time desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	
	function findMessages($id)
	{
		$sql = "select * from upandi_message where from_id=".$id." or to_id=".$id." order by publish_time desc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	
	function findResume($id)
	{
		$sql = "select * from upandi_resumes where uid=".$id;
		$query = $this->db->query($sql);
		$result = $query->result_array();
		if(count($result) > 0)
			return $result[0];
		else
			return null;
	}
}

?>