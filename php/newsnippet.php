<?php
session_start();
$name=$_SESSION['name'];

$value = “DefenseSCRF”;
setcookie(”cookie”, $value, time()+3600);

$connect=mysqli_connect("localhost","root","123456fxf");
mysqli_select_db($connect,"Scenario4") or die('数据库连接错误，错误信息：'.mysqli_error()); //链接到Scenario4数据库

$snippet=$_POST['snippet'];
      require './xss.php';
      $xss = new xss_filter();
 
    $string = $xss->filter_it($snippet );
$query="SELECT Num FROM num_for_id WHERE Username='$name' ";
$result=mysqli_query($connect,$query)or die(mysqli_error());
$row=mysqli_fetch_row($result);
$ID=$row[0]+1;

$sql = "UPDATE num_for_id SET Num ='$ID' WHERE Username = '$name' ";
mysqli_query($connect,$sql) or die(mysqli_error());
 


mysqli_query($connect,"INSERT INTO Snippets (Username, snippets,ID) VALUES ('$name','$string','$ID')");
header('Location:../pages/mysnippets.php');


?>
