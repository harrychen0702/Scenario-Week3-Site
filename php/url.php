<?php

$value = “DefenseSCRF”;
setcookie(”cookie”, $value, time()+3600);

$name=$_POST['name'];
$connect=mysqli_connect("localhost","root","123456fxf");
mysqli_select_db($connect,"Scenario4") or die('数据库连接错误，错误信息：'.mysqli_error()); //链接到Scenario4数据库
$rows=mysqli_query($connect,"select * from userinfo where Username='$name' ");
foreach ($rows as $row ) {
	$url=$row['homepage_url'];
}if ($url!=NULL)
{header("Location:$url");}
else
{
	echo"<script type="."\""."text/javascript"."\"".">"."window.alert"."("."\""."The user has not set his/her website yet!"."\"".")".";"."</script>";
        echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."../pages/home.php"."\""."</script>";
}
exit();

?>
