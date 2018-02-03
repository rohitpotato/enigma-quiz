<?php
class Validator
{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}
	public function isrequired($field_array)
	{
		foreach($field_array as $field)
		{
			if(empty($_POST[''.$field.'']))
			{
				return false;
			}
		}
		return true;
	}

	public function login($username,$password)
	{
		$this->db->query("SELECT * FROM users WHERE username=:username AND password=:password");
		$this->db->bind(":username",$username);
		$this->db->bind(":password",$password);
		$result = $this->db->single();
		$row = $this->db->rowCount();
		if($row>0)
		{
			$this->getData($result);
			return true;
		}
		else
		{
			return false;

		}
	}
	public function getData($row)
	{
		$_SESSION['is_logged_in'] = true;
		$_SESSION['user_id'] = $row->id;
		$_SESSION['username'] = $row->username;
		$_SESSION['email'] = $row->email;
		$_SESSION['level'] = $row->level;
	}

	public function getQuestion($id)
	{
		$this->db->query("SELECT * FROM question WHERE question_id = :id");
		$this->db->bind(":id",$id);
		$result = $this->db->single();
		return $result;
	}

	public function logout()
	{
		unset($_SESSION['is_logged_in']); 
  		unset($_SESSION['username']);
		unset($_SESSION['user_id']); 
		unset($_SESSION['email']);
		return true;
	}

	public function update_level($id)
	{
		$level = getUserData()['level']+1;
		$this->db->query("UPDATE users SET level = :level, time = NOW() WHERE id = :id");
		$this->db->bind(":level",$level);
		$this->db->bind(":id",getUserData()['user_id']);
		$this->db->execute();
		return true;	
	}
	function check_answer($id,$answer)
	{
		$this->db->query("SELECT * FROM answers WHERE question_id =:id AND answer = :answer");
		$this->db->bind(":id",$id);
		$this->db->bind(":answer",$answer);
		$row = $this->db->single();
		return $row;

	}
}

?>