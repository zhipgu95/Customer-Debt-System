<?php

	include("connectdatabase.php");
	include("function.php");
	
	if(logged_in())
	{
		echo "You are logged in!";
	}
	else
	{
		echo "You are not logged in!";
	}
	
	$error = "";
	
	if(isset($_POST['submit']))
	{
		$number_demander = $_POST['number_shop_need'];
		$number_provider = $_POST['number_shop_provide'];
		$Year = $_POST['year'];
		$Month = $_POST['month'];
		$Day = $_POST['day'];
		$Dob = "{$Year}-{$Month}-{$Day}";
		$Date = date("Y-m-d", strtotime($Dob));
		$msg = $_POST['msg'];
		$amount = $_POST['amount'];
		
		if(!logged_in()){
			$error = "请先登陆账号!";
		}
		else if(strlen($msg)==0){
			$error = "信息栏不能为空!";
		}
		else {
			$insertQuery = "INSERT INTO items_transfer(Demander, Provider, Date, Transfer_Detail, Amount)
							VALUES('$number_demander','$number_provider','$Date','$msg', '$amount')";
			if(mysqli_query($conn,$insertQuery)){
				$error = "您已成功添加该记录!";
			}
		}		
	}
	
?>


<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="UTF-8" />
<title>5号店调货</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/reset.css" rel="stylesheet" />
<link href="css/main.css" rel="stylesheet" />
<link href="css/search_number.css" rel="stylesheet" />
</head>
<body>

<h1>
</h1>

<div class="i_header header">
	<div class="wrap">
		<div class="logo"><a href="index.php" title="Jinpeng"><img src="images/JP_logo.png" width="110" height="70"/></a></div>
		<div class="nav">
			<ul>
				<li>
				<div class="dropdown">
				<button class="dropbtn">员工借款
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="insert_employee.php">添加新员工</a>
					<a href="employee_search.php">员工搜索</a>
					<a href="employee_list.php">员工列表</a>
				</div>
				</div>
				</li>
				<li>
				<div class="dropdown">
				<button class="dropbtn">各店销售
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="login2.php">2号店</a>
					<a href="login5.php">5号店</a>
					<a href="login6.php">6号店</a>
					<a href="login8.php">8号店</a>
					<a href="login9.php">9号店</a>
				</div>
				</div>
				</li>
				<li>
				<div class="dropdown">
				<button class="dropbtn">各店调货
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="search_2.php">2号店</a>
					<a href="search_5.php">5号店</a>
					<a href="search_6.php">6号店</a>
					<a href="search_8.php">8号店</a>
					<a href="search_9.php">9号店</a>
				</div>
				</div>
				</li>
				<li>
				<div class="dropdown">
				<button class="dropbtn">查询客户
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					<a href="Search_Customer.php">客户搜索</a>
					<a href="Search_Customer_Total.php">客户列表</a>
				</div>
				</div>
				</li>
				<li><a href="Insert_Customer.php" title="insert">添加新客户</a></li>
				<li><a href="Delete_Customer.php" title="delete">删除客户</a></li>
				<li>
				<?php
				if (isset($_SESSION['username'])){
					echo "<form action='logout.php'>
                        <button>退出</button>
                    </form>";
				} else {
					echo "<form action='login.php' method='POST'>
	                    <button type='submit'>登陆</button>
                    </form>";
				}
				?>
				</li>
					
				<div class="clear"></div>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>

<div id="error"><?php echo $error; ?></div>

<div class = "include">
	<div class = "info"><p>5号店调货系统</p></div>
	
	<div class = "table_info">
		<div id="menu">
		<div class="dropdown_new">
				<button class="dropbtn_new">5号店出货
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content_new">
					<a href="items_out_5_one.php">1月份</a>
					<a href="items_out_5_two.php">2月份</a>
					<a href="items_out_5_three.php">3月份</a>
					<a href="items_out_5_four.php">4月份</a>
					<a href="items_out_5_five.php">5月份</a>
					<a href="items_out_5_six.php">6月份</a>
					<a href="items_out_5_seven.php">7月份</a>
					<a href="items_out_5_eight.php">8月份</a>
					<a href="items_out_5_nine.php">9月份</a>
					<a href="items_out_5_ten.php">10月份</a>
					<a href="items_out_5_eleven.php">11月份</a>
					<a href="items_out_5_twelve.php">12月份</a>
					<a href="items_out_5_2018.php">2018年</a>
					<a href="items_out_5_2019.php">2019年</a>
				</div>
		</div>
		<div class="dropdown_new">
				<button class="dropbtn_new">5号店入货
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content_new">
					<a href="items_in_5_one.php">1月份</a>
					<a href="items_in_5_two.php">2月份</a>
					<a href="items_in_5_three.php">3月份</a>
					<a href="items_in_5_four.php">4月份</a>
					<a href="items_in_5_five.php">5月份</a>
					<a href="items_in_5_six.php">6月份</a>
					<a href="items_in_5_seven.php">7月份</a>
					<a href="items_in_5_eight.php">8月份</a>
					<a href="items_in_5_nine.php">9月份</a>
					<a href="items_in_5_ten.php">10月份</a>
					<a href="items_in_5_eleven.php">11月份</a>
					<a href="items_in_5_twelve.php">12月份</a>
					<a href="items_in_5_2018.php">2018年</a>
					<a href="items_in_5_2019.php">2019年</a>
				</div>
		</div>
		<a href="index.php">返回主页</a>
		</div>		
    
    <div class = "provider">
    	<form method = "Post" action = "search_5.php"><br/>
		
		<label class = "up" >需求方</label>
        <select name="number_shop_need">
			<option value="02">02</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="08">08</option>
			<option value="09">09</option>
		</select><br/>
		<br/>
        
        <label class = "up" >提供方</label>
        <select name="number_shop_provide">
			<option value="02">02</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="08">08</option>
			<option value="09">09</option>
		</select><br/>
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
		
		<label class = "up">调货信息备注</label><br/>
		<textarea name = "msg" rows="5" cols="50" placeholder="在这里输入..."></textarea>
		<br/>
		<br/>
		
		<label class = "up">金额</label>
        <input type = "text" name = "amount"/><br/>
		<br/>
        
		<input type = "submit" name = "submit" value = "添加该记录"/>
		</form>
    </div>
 </div>
 </div>

<div class="h30"></div>
<div class="main">
	<a href="index.php" class="btn btn_css3">
		<p class="pic"><img src="images/下载.jpg" width="260" height="200"/></p>
		<h2 class="txt">诚信经营</h2>
	</a>
	<a href="index.php" class="btn btn_css3">
		<p class="pic"><img src="images/friends.jpg" width="260" height="200"/></p>
		<h2 class="txt">品质保障</h2>
	</a>
	<a href="index.php" class="btn btn_css3">
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
