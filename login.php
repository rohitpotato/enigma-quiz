<?php 
include 'core/init.php';
$template = new Template("templates/login.php");		
$validate = new Validator;
if(isset($_POST['dologin']))
{
	$data = array();
	$data['username'] = $_POST['username'];
	$data['password'] = $_POST['password'];
	$required_fields = array('username','password');
	if($validate->isRequired($required_fields))
	{
		if($validate->login($data['username'],$data['password']))
		{
			redirect("level.php?n=".getUserData()['level'],"You have successfully logged in","success");
		}
		else
		{
			redirect("login.php","Incorrect Username and Password","error");
		}
	}
	else
	{
		redirect("login.php","Please fill all the fields","error");
	}
}
echo $template;
?>