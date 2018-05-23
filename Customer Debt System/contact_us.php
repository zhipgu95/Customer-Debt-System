<?php

	include("connectdatabase.php");
	include("function.php");
	
	$error = "";
	
	if(isset($_POST['submit']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$msg=$_POST['msg'];

		$to='zhipgu@iu.edu'; // Receiver Email ID, Replace with your email ID
		$subject='Form Submission';
		$message="Name :".$name."\n"."Phone :".$phone."\n"."Wrote the following :"."\n\n".$msg;
		$headers="From: ".$email;
		
		if(empty($name))
		{
			$error = "请输入姓名!";
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$error = "请输入正确的邮箱格式!";
		}
		else if(empty($phone))
		{
			$error = "请输入你的手机号!";
		}
		else if(empty($msg))
		{
			$error = "请输入你的信息!";
		}
		else if(mail($to, $subject, $message, $headers))
		{
			$insertquery = "INSERT INTO contact_us 
						(ContactName, ContactEmail, ContactPhone, ContactMsg)
						VALUES('$name','$email','$phone','$msg')";
			if(mysqli_query($conn, $insertquery))
			{
				$error = "发送成功，谢谢!"." ".$name.", 我们会尽快联系你!";
			}
		}
		else
		{
			$error = "发送错误，请再次尝试!";
		}
	}	
		

	
?>


<!DOCTYPE html>

<html class="no-js">
<head>
	<meta charset="UTF-8" />
	<title>联系我们</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="css/reset.css" rel="stylesheet" />
	<link href="css/main.css" rel="stylesheet" />
	<link href="css/contact_us.css" rel="stylesheet" />

</head>
<body style= "background:">


<h1>
</h1>

<div class="i_header header">
	<div class="wrap">
		<div class="logo"><a href="index.html" title="Jinpeng"><img src="images/JP_logo.png" width="110" height="70"/></a></div>
		<div class="nav">
			<ul>
				<li><a href="Search_Customer.php" title="查询">查询客户</a></li>
				<li><a href="Insert_Customer.php" title="添加">添加新客户</a></li>
				<li><a href="Delete_Customer.php" title="删除">删除客户</a></li>
	
				<div class="clear"></div>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>

<div id="error"><?php echo $error; ?></div>

<div class="table">

	<div class = "table2">
    	<form method = "Post" action = "contact_us.php"><br/>
		<label class="up">姓名</label><br/>
		<input type = "text" name = "name"/>
		<br/>
		
		<label class = "up">邮箱</label><br/>
		<input type = "text" name = "email"/> 
		<br/>
		
		<label class = "up">手机号</label><br/>
		<input type = "text" name = "phone"/>
		<br/>
        
        <label class = "up">添加你的信息</label><br/>
		<textarea name = "msg" rows="5" cols="50" placeholder="在这里输入..."></textarea>
		<br/>
		<br/>
		
        <input type = "submit" name = "submit" value="提交上传"/>
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