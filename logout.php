
<?php include 'core/init.php'; ?>

<?php 
$validate = new Validator; 
	if(isset($_POST['logout']))
	{
		if($validate->logout())
		{
			redirect("login.php","You have successfully logged out","success");
		}
	}
	else
	{
		redirect("index.php");
	}

?>

