<?php

	include("connectdatabase.php");
	include("function.php");
	
	$error = "";
	
	if(isset($_POST['submit']))
	{
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$Year = $_POST['year'];
		$Month = $_POST['month'];
		$Day = $_POST['day'];
		$Dob = "{$Year}-{$Month}-{$Day}";
		$Date = date("Y-m-d", strtotime($Dob));
		$Amount = $_POST['amount'];
		$Type = $_POST['type'];
		$msg = $_POST['msg'];
		
		if(strlen($firstName)==0){
			$error = "名字不能为空!";
		}
		else if(strlen($lastName)==0){
			$error = "姓氏不能为空!";
		}
		else if($Amount<0){
			$error = "添加的欠款金额需要大于0!";
		}
		else {
			$insertQuery = "INSERT INTO customer_record(FirstName, LastName, Date, Amount, Type, Message)
							VALUES('$firstName','$lastName','$Date','$Amount','$Type', '$msg')";
			if(mysqli_query($conn,$insertQuery)){
				$error = "您已成功添加该欠款!";
			}
		}		
	}
	
?>



<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="UTF-8" />
<title>添加新的欠款</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/reset.css" rel="stylesheet" />
<link href="css/main.css" rel="stylesheet" />
<link href="css/insert_debt.css" rel="stylesheet" />
</head>
<body>

<h1>
</h1>

<div class="i_header header">
	<div class="wrap">
		<div class="logo"><a href="index.html" title="Jinpeng"><img src="images/JP_logo.png" width="110" height="70"/></a></div>
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
    
    <div class = "provider">
    	<form method = "Post" action = "insert_debt.php"><br/>
		
		<label class = "up" >名字</label>
        <input type = "text" name = "firstname"/><br/>
		<br/>
        
        <label class = "up" >姓氏</label>
        <input type = "text" name = "lastname"/><br/>
        <br/>
        
        <label class="up">年</label>
		<select name="year">
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
		</select>
		
        <label class = "up" >月</label>
        <select name = "month">
		  <option value="1">01</option>
		  <option value="2">02</option>
		  <option value="3">03</option>
		  <option value="4">04</option>
		  <option value="5">05</option>
		  <option value="6">06</option>
		  <option value="7">07</option>
		  <option value="8">08</option>
		  <option value="9">09</option>
		  <option value="10">10</option>
		  <option value="11">11</option>
		  <option value="12">12</option>
		</select>
        
        <label class = "up">日</label>
        <select name = "day">
		  <option value="1">01</option>
		  <option value="2">02</option>
		  <option value="3">03</option>
		  <option value="4">04</option>
		  <option value="5">05</option>
		  <option value="6">06</option>
		  <option value="7">07</option>
		  <option value="8">08</option>
		  <option value="9">09</option>
		  <option value="10">10</option>
		  <option value="11">11</option>
		  <option value="12">12</option>
		  <option value="13">13</option>
		  <option value="14">14</option>
		  <option value="15">15</option>
		  <option value="16">16</option>
		  <option value="17">17</option>
		  <option value="18">18</option>
		  <option value="19">19</option>
		  <option value="20">20</option>
		  <option value="21">21</option>
		  <option value="22">22</option>
		  <option value="23">23</option>
		  <option value="24">24</option>
		  <option value="25">25</option>
		  <option value="26">26</option>
		  <option value="27">27</option>
		  <option value="28">28</option>
		  <option value="29">29</option>
		  <option value="30">30</option>
		  <option value="31">31</option>
		</select> <br/>
        <br/>
        
        <label class = "up">金额</label>
        <input type = "text" name = "amount"/><br/>
        <br/>
        
        <label class = "up">欠款方式</label>
        <select name = "type">
		  <option value="cash">现金</option>
		  <option value="check">支票</option>
		</select><br/>
        <br/>
		
		<label class = "up">详细备注</label><br/>
		<textarea name = "msg" rows="5" cols="50" placeholder="在这里输入..."></textarea>
		<br/>
		<br/>
		
        <input type = "submit" name = "submit" value = "添加该欠款"/>
		</form>
    </div>
 </div>

<div class="h30"></div>
<div class="main">
	<a href="board.php" class="btn btn_css3">
		<p class="pic"><img src="images/下载.jpg" width="260" height="200"/></p>
		<h2 class="txt">诚信经营</h2>
	</a>
	<a href="search guardian.php" class="btn btn_css3">
		<p class="pic"><img src="images/friends.jpg" width="260" height="200"/></p>
		<h2 class="txt">品质保障</h2>
	</a>
	<a href="contact_us.php" class="btn btn_css3">
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
