<?php

	include("connectdatabase.php");
	include("function.php");
	
	$error = "";
	
	if(isset($_POST['submit']))
	{
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		
		$insertquery1 = "INSERT INTO search_record
						(FirstName, LastName)
						VALUES('$firstName','$lastName')";
				
		if (!customer_exists($firstName, $lastName, $conn)){
			$error = "该客户不存在，请去首页添加!";
		}
		else if(mysqli_query($conn, $insertquery1)){
			$error = "$lastName $firstName";
		}
		else {
			$error = "";
		}
	}
		

?>


<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="UTF-8" />
<title>查询结果</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/reset.css" rel="stylesheet" />
<link href="css/main.css" rel="stylesheet" />
<link href="css/search_result.css" rel="stylesheet"/>
</head>
<body>

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

<div class = "include">
	<div class = "info"><p>查询结果</p></div>
	
	<div class = "table_info">
    	<?php
			include("connectdatabase.php");
			
			if (isset($_GET['page'])) {
				$page = intval($_GET['page']);
			} 
			else {
				$page = 1;
			}
			$per_page = 3;
			$calc = $per_page * $page;
			$start = $calc - $per_page;

			
			$firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
			$lastName = mysqli_real_escape_string($conn, $_POST['lastname']);
			$sql = "select distinct concat(cr.LastName, ' ', cr.FirstName) as name, cr.Date as date, cr.Amount as amount, cr.Type as type, cr.Message as message from customer_record as cr where cr.FirstName='$firstName' and cr.LastName='$lastName' LIMIT $start, $per_page";
			$result = mysqli_query($conn, $sql);
			$num_rows = mysqli_num_rows($result);
			
			if ($num_rows > 0){
				//output data of each row
				echo "<div id='table_arrange'>";
				echo "<table><tr><th>姓名</th><th>日期</th><th>金额</th><th>付款方式</th><th>详细备注</th></tr>";
				//output data of each row
				$total_debt=0;
				while($row = mysqli_fetch_array($result)){
					echo "<tr><td>".$row["name"]."</td><td>".$row["date"]."</td><td>".$row["amount"]."</td><td>".$row["type"]."</td><td>".$row["message"]."</td></tr>";	
					$total_debt+=$row["amount"];
				}
				echo "</table>";
				echo "</div>";
				echo "<div id='debt_form'>";
					echo "<p>欠款总金额: ".$total_debt."</p>";
				echo "</div>";
			}
			else {
				echo "0个查询结果";
			}
			$total_sql = "select distinct concat(cr.LastName, ' ', cr.FirstName) as name, cr.Date as date, cr.Amount as amount, cr.Type as type, cr.Message as message from customer_record as cr where cr.FirstName='$firstName' and cr.LastName='$lastName'";
			$result_new = mysqli_query($conn, $total_sql);
			$total = mysqli_num_rows($result_new);
			$pages_number = $total/$per_page;
			$total_pages = ceil($pages_number);
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			echo "<br/>";
			
			for($b=1; $b<=$total_pages; $b++)
			{
				?><a href="search_result.php?page=<?php echo $b; ?>" style="text-decoration:none"><?php echo "<div id='totalpage'>"; echo "<div id='pages'>"; echo $b." "; echo "</div>"; echo "</div>"; ?></a><?php
			}
			
				
			mysqli_close($conn);
		?>
		
		<div class = "table3">
    	<form method = "Post" action = "insert_debt.php" enctype="multipart/form-data">
        <input type = "submit" name = "submit_first" value = "添加新欠款"/>
		</form>
		</div>
		
		<div class = "table4">
    	<form method = "Post" action = "insert_repayment.php" enctype="multipart/form-data">
        <input type = "submit" name = "submit_second" value = "添加新还款"/>
		</form>
		</div>
		
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