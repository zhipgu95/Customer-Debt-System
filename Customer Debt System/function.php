<?php

	function email_exists($email, $conn)
	{
		$result = mysqli_query($conn,"SELECT id FROM users WHERE email = '$email'");
		//echo($result);
		if(mysqli_num_rows($result) == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function customer_exists($firstName, $lastName, $conn)
	{
		$result = mysqli_query($conn, "SELECT customer.* FROM customer WHERE customer.FirstName='$firstName' and customer.LastName='$lastName'");
		if(mysqli_num_rows($result) == 1){
			return true;
		}
		else {
			return false;
		}
	}
	
	function logged_in()
	{
		if(isset($_SESSION['email']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function match_username($userName, $conn)
	{
		$result = mysqli_query($conn, "SELECT id FROM users WHERE username = '$userName'");
		if(mysqli_num_rows($result) == 1)
		{
			return true;
		}
		else
		{
			return false;
		}	
	}
	
		
?>