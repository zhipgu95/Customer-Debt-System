<?php
	include("connectdatabase.php");
	include("function.php");
	
	$error = "";
	
	if(isset($_POST['submit']))
	{
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$gender = $_POST['gender'];
		
		if(strlen($firstName)==0)
		{
			$error = "名字不能为空!";
		}
		else if(strlen($lastName)==0)
		{
			$error = "姓氏不能为空!";
		}
		else if(!customer_exists($firstName, $lastName, $conn)){
			$error = "该客户不存在, 无需取消!";
		}
		//move_uploaded_file($tmp_image, "images/$image")
		//move_uploaded_file($_FILES['image']['tmp_name'] , "images/$image" . $FILES['image']['name']))
		else
		{
			$deleteCustomer = "DELETE customer, customer_record FROM customer INNER JOIN customer_record WHERE customer.FirstName='$firstName'
			and customer.LastName='$lastName' and customer.FirstName=customer_record.FirstName and customer.LastName=customer_record.LastName";
			if(mysqli_query($conn, $deleteCustomer)){
				$error = "您已成功删除!";
			}
		}
	}
	
?>



<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="UTF-8" />
<title>删除客户</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/reset.css" rel="stylesheet" />
<link href="css/main.css" rel="stylesheet" />
<link href="css/delete.css" rel="stylesheet" />

</head>
<body style= "background:">


<h1>
</h1>

<div class="i_header header">
	<div class="wrap">
		<div class="logo"><a href="index.html" title="Jinpeng"><img src="images/JP_Logo.png" width="110" height="70"/></a></div>
		<div class="nav">
			<ul>
				<li><a href="Search_Customer.php" title="search">查询客户</a></li>
				<li><a href="Insert_Customer.php" title="insert">添加新客户</a></li>
				<li><a href="Delete_Customer.php" title="delete">删除客户</a></li>
			
				<div class="clear"></div>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>

<div id="error"><?php echo $error; ?></div>

<div class="table">

	<div class = "table2">
    	<form method = "Post" action = "Delete_Customer.php" enctype="multipart/form-data"><br/>
        <label class = "up" >名字</label><br/>
        <input type = "text" name = "firstname"/><br/>
        
        <label class = "up">姓氏</label><br/>
        <input type = "text" name = "lastname"/><br/>
        
        <label class = "up">性别</label><br/>
        <select name = "gender">
		  <option value="male">男性</option>
		  <option value="female">女性</option>
		</select><br/>
        
		<br/>
        <input type = "submit" name = "submit" value = "点击删除该客户"/>
		</form>
    </div>
 </div>
 
<div class="h30"></div>
<div class="main">
	<a href="index.html" class="btn btn_css3">
		<p class="pic"><img src="images/下载.jpg" width="260" height="200"/></p>
		<h2 class="txt">诚信经营</h2>
	</a>
	<a href="index.html" class="btn btn_css3">
		<p class="pic"><img src="images/friends.jpg" width="260" height="200"/></p>
		<h2 class="txt">品质保障</h2>
	</a>
	<a href="index.html" class="btn btn_css3">
		<p class="pic"><img src="images/qr.jpg" width="260" height="200"/></p>
		<h2 class="txt">服务真挚</h2>
	</a>
	<div class="clear"></div>
</div>

<div class="footer">
	<div id="contact_info">
		<p>地址: San Alfonso 480</p>       
		<p>邮箱: zhipgu@iu.edu</p>       
		<p>手机号: 812-369-2337</p>
	</div>
	<div id="contact_link">
		<p style="font-size:20px;"><b><a href="contact_us.php" target="_blank">联系我们</a></b></p>
	</div>
</div>

<embed src="music.mp3" autostart="true" loop="true"
width="2" height="0">
</embed>
 </body>
 </html>