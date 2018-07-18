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
		

?>


<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="UTF-8" />
<title>2018年6月员工借款记录</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/reset.css" rel="stylesheet" />
<link href="css/main.css" rel="stylesheet" />
<link href="css/employee_month.css" rel="stylesheet"/>
</head>
<body>

<h1>
</h1>

<div class="i_header header">
	<div class="wrap">
		<div class="logo"><a href="index.php" title="Jinpeng"><img src="images/JP_Logo.png" width="110" height="70"/></a></div>
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
	<div class = "info"><p>查询结果</p></div>
	
	<div class = "table_info">
		<div id="menu">
		<div class="dropdown_new">
				<button class="dropbtn_new">员工借款索引
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content_new">
					<a href="employee_one.php">1月份</a>
					<a href="employee_two.php">2月份</a>
					<a href="employee_three.php">3月份</a>
					<a href="employee_four.php">4月份</a>
					<a href="employee_five.php">5月份</a>
					<a href="employee_six.php">6月份</a>
					<a href="employee_seven.php">7月份</a>
					<a href="employee_eight.php">8月份</a>
					<a href="employee_nine.php">9月份</a>
					<a href="employee_ten.php">10月份</a>
					<a href="employee_eleven.php">11月份</a>
					<a href="employee_twelve.php">12月份</a>
					<a href="employee_2018.php">2018年</a>
					<a href="employee_2019.php">2019年</a>
				</div>
		</div>
		<a href="index.php">返回主页</a>
		</div>
    	
		<?php
			include("connectdatabase.php");
			
		//	$perpage = 3;
		//	if(isset($_GET["page"])){
		//		$page = intval($_GET["page"]);
		//	}
		//	else {
		//		$page = 1;
		//	}
			
		//	$total = $perpage * $page;
		//	$start = $total - $perpage;
	
			$sql = "SELECT distinct concat(er.LastName, ' ', er.FirstName) AS name, YEAR(er.Date) AS year, MONTH(er.Date) AS month, SUM(er.Amount) as amount
					FROM employee_record AS er 
					WHERE MONTH(er.Date)=6 AND YEAR(er.Date)=2018 GROUP BY name ORDER BY amount DESC";
			$result = mysqli_query($conn, $sql);
			$num_rows = mysqli_num_rows($result);
			
			if(!logged_in()){
				$error = "请先登陆账号!";
				echo "<div id='error_new'>"; 
					echo $error;
				echo "</div>";
			}
			else if ($num_rows > 0){
				//output data of each row
				echo "<div id='table_arrange'>";
				echo "<table><tr><th>姓名</th><th>年份</th><th>月份</th><th>金额数</th><th>具体查询</th></tr>";
				//output data of each row
				$total_amount_one = 0;
				while($row = mysqli_fetch_array($result)){
					echo "<tr><td>".$row["name"]."</td><td>".$row["year"]."</td><td>".$row["month"]."</td><td>".$row["amount"]."</td><td><a href='employee_six_detail.php?search=$row[name]'>点击查看</a></td></tr>";	
					$total_amount_one += $row["amount"];
				}
			//	$total_debt+=$totaldebt_perpage;
				echo "</table>";
				echo "</div>";
				echo "<div id='debt_form'>";
					echo "<p>2018年6月员工借款金额总数: ".$total_amount_one."</p>";
				echo "</div>";
				
			}
			else {
				echo "0个查询结果";
			}
		
		/*	$result1 = mysqli_query($conn, "select distinct concat(cr.LastName, ' ', cr.FirstName) as name, cr.Date as date, cr.Amount as amount, cr.Type as type, cr.Message as message from customer_record as cr where cr.FirstName='Zhipeng' and cr.LastName='Gu'");
			$total_record = mysqli_num_rows($result1);
			$pages = $total_record/$perpage;
			$pages = ceil($pages);
			echo "<br/>";
			//echo "<br/>";
			for($b=1; $b<=$pages; $b++)
			{
				?><a href="search_result.php?page=<?php echo $b; ?>" style="text-decoration:none"><?php echo "<div id='totalpage'>"; echo "<div id='pages'>"; echo $b." "; echo "</div>"; echo "</div>"; ?></a><?php
			} */
				
			mysqli_close($conn);
		?>
		
		<div class = "table3">
    	<form method = "Post" action = "insert_employee_debt.php" enctype="multipart/form-data">
        <input type = "submit" name = "submit_first" value = "添加新借款记录"/>
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