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
<title>6号店2018年4月销售额</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/reset.css" rel="stylesheet" />
<link href="css/main.css" rel="stylesheet" />
<link href="css/sales_month.css" rel="stylesheet"/>
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
				<li><a href="Search_Customer.php" title="search">查询客户</a></li>
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
	
			$sql = "select Shop_no, Date, Sales_amount, Costs_amount, Message from sales_shop where MONTH(Date)=4 and YEAR(Date)=2018 and Shop_no=6";
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
				echo "<table><tr><th>商店号码</th><th>日期</th><th>销售额</th><th>费用</th><th>详细备注</th></tr>";
				//output data of each row
				$total_sales_amount = 0;
				$total_costs_amount = 0;
				while($row = mysqli_fetch_array($result)){
					echo "<tr><td>".$row["Shop_no"]."</td><td>".$row["Date"]."</td><td>".$row["Sales_amount"]."</td><td>".$row["Costs_amount"]."</td><td>".$row["Message"]."</td></tr>";	
					$total_sales_amount+=$row["Sales_amount"];
					$total_costs_amount+=$row["Costs_amount"];
				}
			//	$total_debt+=$totaldebt_perpage;
				echo "</table>";
				echo "</div>";
				echo "<div id='debt_form'>";
					echo "<p>1月当前总销售: ".$total_sales_amount."</p>";
					echo "<p>1月当前总费用: ".$total_costs_amount."</p>";
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
    	<form method = "Post" action = "sales_6.php" enctype="multipart/form-data">
        <input type = "submit" name = "submit_first" value = "添加新销售记录"/>
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