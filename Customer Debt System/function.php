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
	
	function username_exists($username, $password, $conn)
	{
		$result = mysqli_query($conn,"SELECT id FROM accounts WHERE username='$username' and password='$password'");
		if(mysqli_num_rows($result) == 1){
			return true;
		}
		else {
			return false;
		}
	}
	
	function username_exists_2($conn)
	{
		$result = mysqli_query($conn, "SELECT id FROM accounts WHERE username='jinpengtienda2' and password='jinpeng2'");
		if(mysqli_num_rows($result) == 1){
			return true;
		}
		else {
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
	
	function employee_exists($firstName, $lastName, $conn)
	{
		$result = mysqli_query($conn, "SELECT employee.* FROM employee WHERE employee.FirstName='$firstName' and employee.LastName='$lastName'");
		if(mysqli_num_rows($result) == 1){
			return true;
		}
		else {
			return false;
		}
	}
	
	function logged_in()
	{
		if(isset($_SESSION['username']))
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