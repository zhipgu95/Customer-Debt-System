<?php
// Create connection
$conn=mysqli_connect("localhost","root","jinpeng2018","customer-debt-system");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//session_start();
?>