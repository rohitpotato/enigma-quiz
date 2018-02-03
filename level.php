<?php
include('core/init.php');
$id     =   (isset($_GET['n']))? $_GET['n'] : null;
$validate   =   new Validator;
$template   =   new Template("templates/question.php");

$User       =   new User();

$User->init();

$template->title = $validate->getQuestion($id)->body;

$userid = $User->getUserId();
if(is_logged_in())
{
	if(isset($_POST['submit'])) {
	    $data = array();
	    
	    $data['answer'] = $_POST['answer'];
	    $required_fields  = array("answer");
	    if($validate->isRequired($required_fields)) {
	        if($validate->check_answer($User->getLevel(),$_POST['answer'])) {
	            
	            if($validate->update_level($userid)) {
	                
	                redirect("level.php?n=".$User->init(1)->getLevel(),"Correct Anwser","success"); 
	            }

	        }
	        else {
	        
	            redirect("level.php?n=".$User->getLevel(),"Incorrect","error");
	        }
	    }
	    else {
	            redirect("level.php?n=".$User->getLevel(),"Empty","error");
	    }
	}
	if($id> $User->getLevel())
	{
		redirect("level.php?n=".$User->getLevel(),"No cheating","error");
	}
}
else
{
	redirect("login.php","You must login to view this page","error");
}
echo $template;
?>