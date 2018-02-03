<?php

function redirect($page = FALSE ,$message = NULL, $message_type = NULL )
{
	if(is_string($page))
	{
		$location = $page;
	}
	else
	{
		$location = $_SERVER['SCRIPT_NAME'];
	}
	if($message!=NULL)
	{
		$_SESSION['message'] = $message;
	}
	if($message_type!=NULL)
	{
		$_SESSION['message_type'] = $message_type;
	}
	header("location:".$location);
	exit();

}

function displayMessage()
{
	if(!empty($_SESSION['message']))
	{
		$message = $_SESSION['message'];
		
		if(!empty($_SESSION['message_type']))
		{
			$message_type = $_SESSION['message_type'];

			if($message_type == 'error')
			{
				echo '<div class="alert alert-danger">' . $message . '</div>';
			}
			else
			{
				echo '<div class = "alert alert-success">' . $message . '</div>';		
			}
		}
		unset($_SESSION['message']);
		unset($_SESSION['message_type']);
	}
	else
	{
		echo "";
	}
}
 
 function is_logged_in()
 {
 	if(isset($_SESSION['is_logged_in']))
 	{
 		return true;
 	}
 	else
 	{
 		return false;
 	}
 }
 
function getUserData()
{
	$userarray = array();
	$userarray['username'] = $_SESSION['username'];
	$userarray['user_id'] = $_SESSION['user_id'];
	$userarray['email'] = $_SESSION['email'];
	$userarray['level'] = $_SESSION['level'];
	return $userarray;
}

?>