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
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$gender = $_POST['gender'];
		$city = $_POST['city'];
		$wechat = $_POST['wechat'];
		
		$firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
		$lastName = mysqli_real_escape_string($conn, $_POST['lastname']);
		$gender = mysqli_real_escape_string($conn, $_POST['gender']);
		$city = mysqli_real_escape_string($conn, $_POST['city']);
		$wechat = mysqli_real_escape_string($conn, $_POST['wechat']);
		
		$sql = "select c.* from customer as c where c.FirstName='$firstName' and c.LastName='$lastName' and c.Gender='$gender' and c.City='$city' and c.Wechat='$wechat'";
		$result = mysqli_query($conn, $sql);
		if(!logged_in())
		{
			$error = "请先登陆账号!";
		}
		else if(strlen($firstName)==0)
		{
			$error = "名字不能为空!";
		}
		else if(strlen($lastName)==0)
		{
			$error = "姓氏不能为空!";
		}
		//move_uploaded_file($tmp_image, "images/$image")
		//move_uploaded_file($_FILES['image']['tmp_name'] , "images/$image" . $FILES['image']['name']))
		else if(mysqli_num_rows($result)!=0)
		{
			$error = "此客户已存在，无需再添加!";
		}			
		else
		{	
			$insertQuery = "INSERT INTO customer(FirstName, LastName, Gender, City, Wechat)
							VALUES('$firstName','$lastName','$gender', '$city', '$wechat')";
			if(mysqli_query($conn, $insertQuery))
			{
				$error = "您已成功添加!";
			}
		}
	}
	
?>



<!DOCTYPE html>
<html class="no-js">
<head>
<meta charset="UTF-8" />
<title>添加新客户</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/reset.css" rel="stylesheet" />
<link href="css/main.css" rel="stylesheet" />
<link href="css/insert.css" rel="stylesheet" />

</head>
<body style= "background:">


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

<div class="table">

	<div class = "table2">
    	<form method = "Post" action = "Insert_Customer.php" enctype="multipart/form-data"><br/>
        <label class = "up" >名字</label><br/>
        <input type = "text" name = "firstname"/><br/>
        
        <label class = "up">姓氏</label><br/>
        <input type = "text" name = "lastname"/><br/>
        
       <label class = "up">性别</label><br/>
        <select name = "gender">
		  <option value="male">男性</option>
		  <option value="female">女性</option>
		</select><br/>
        
        <label class = "up">城市</label><br/>
        <input type = "text" name = "city"/><br/>
        
        <label class = "up">微信号</label><br/>
        <input type = "text" name = "wechat"/><br/>
        
		<br/>
        <input type = "submit" name = "submit" value = "点击添加新客户"/>
		</form>
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