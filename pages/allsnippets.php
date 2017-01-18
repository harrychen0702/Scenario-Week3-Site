<?php
session_start();
if($_SESSION['checked'] == "" || $_SESSION['checked']==0){
    echo"<script type="."\""."text/javascript"."\"".">"."window.location="."\""."../pages/signin.php"."\""."</script>";
}

$inactive = 100;
if( !isset($_SESSION['timeout']) )
$_SESSION['timeout'] = time() + $inactive; 

$session_life = time() - $_SESSION['timeout'];

if($session_life > $inactive)
{  session_destroy(); header("Location:../php/logout.php");  }

$_SESSION['timeout']=time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Scenario Week</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

</head>

<body>
<nav>
    <div class="nav-wrapper">
        <ul class="left hide-on-med-and-down">
            <li><a onclick="javascript:history.go(-1)">Back</a></li>
        </ul>
    </div>
</nav>



<div class="container">
   <h4><?php echo $_SESSION['allsnippet'];  ?>'s Snippets</h4>

    <?php
    session_start();
    $connect=mysqli_connect("localhost","root","123456fxf");
    mysqli_select_db($connect,"Scenario4") or die('数据库连接错误，错误信息：'.mysqli_error()); //
    $newname2=trim($_SESSION['allsnippet']);


    // $query = "SELECT * FROM Snippets WHERE Username='wwt' ";
    // $db = new PDO("mysql:dbname=Scenario4", "root", "123456fxf");
    // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $rows = $db->query($query);
    $rows=mysqli_query($connect,"select * from Snippets where Username='$newname2' ");
    foreach ($rows as $row ) {
            ?>
    <div class="row">
        <div class="col s12 m12">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
            <p>
                        Snippet ID:
                        <?=$row["ID"] ?>
                    </p>
            <p><?= $row["snippets"] ?></p>
           </div>
            </div>

        </div>
    </div> 
        <?php
        }

    ?>






</div>
</body>
</html>
