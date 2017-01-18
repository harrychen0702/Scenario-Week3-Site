<?php
session_start();

$value = “DefenseSCRF”;
setcookie(”cookie”, $value, time()+3600);

$connect=mysqli_connect("localhost","root","123456fxf");
mysqli_select_db($connect,"Scenario4") or die('数据库连接错误，错误信息：'.mysqli_error()); //链接到Scenario4数据库
$name=$_SESSION['name'];
$oldpassword=md5($_POST['oldpassword']);
$newpassword=md5($_POST['newpassword']);
$homepage_url=$_POST['homepage_url'];
$private_snippet=$_POST['snippet'];
if (is_correct_password($name,$oldpassword)) {
	// mysql_query("UPDATE userinfo SET Password=$newpassword, homepage_url = $homepage_url, private_snippet=$private_snippet WHERE Username = '$name' ");
	// mysql_query("INSERT INTO userinfo (Username, Password, homepage_url, private_snippet) VALUES($name, $newpassword, $homepage_url,$private_snippet) ON DUPLICATE KEY UPDATE Password=$newpassword, homepage_url=$homepage_url, private_snippet=$private_snippet");
	$sql = "UPDATE userinfo SET Password='$newpassword', homepage_url = '$homepage_url', private_snippet='$private_snippet' WHERE Username = '$name' ";
    mysqli_query($connect,$sql) or die(mysqli_error());
    echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."Changes successfully made!"."\"".")".";"."</script>";
    echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."../pages/home.php"."\""."</script>";
	//header("Location: ../pages/home.php");
	// echo "success";//test
}
else{
	//echo $name;
	// $result = mysql_query("SELECT Password FROM userinfo WHERE Username='$name' ")
 //    or die("无效查询: " . mysql_error());
 //    if(is_resource($result) and mysql_num_rows($result)>0){ //because mysql_query returns a resource
 //    $row = mysql_fetch_array($result);
 //    echo $row["Password"];
 //    }
	// echo $homepage_url;
	//echo "Wrong Password!";
	echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."Your password is wrong!"."\"".")".";"."</script>";
	echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."../pages/editprofile.php"."\""."</script>";
}




function is_correct_password($name, $oldpassword) {
	$db = new PDO("mysql:dbname=Scenario4", "root", "123456fxf");  //修改
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$rows = $db->query("SELECT Password FROM userinfo WHERE Username ='$name' ");
	foreach ($rows as $row) {
		$correct_password = $row["Password"];
		if ($oldpassword == $correct_password) {
			return TRUE;
		}
	}
	return FALSE;
}



?>
