<?php
	
	session_start();
	
	
	if(session_destroy())
	{
		
		header("Location: my_shop.php");
	}
?>