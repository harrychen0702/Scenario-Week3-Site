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

    <script   src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>

</head>
<body>
<nav>
    <div class="nav-wrapper">
        <ul class="left hide-on-med-and-down">
            <li><a href="#">Home</a></li>
            <li><a href="mysnippets.php">My Snippets</a></li>
            <li><a href="newsnippet.php">New Snippets</a></li>
            <!-- li><a href="upload.php">Upload</a></li> -->
        </ul>
        <ul class="right hide-on-med-and-down">
            <li><span><?php echo $_SESSION['name'];  ?>  </span></li> 
            <li><a href="editprofile.php">Profile</a></li>
            <li><a href="../php/logout.php">Sign out</a></li>
        </ul>
    </div>
</nav>

<!-- 
    <div class="row">
        <div class="col s12 m12">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <img style="height: 5%; width: 5%" src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/sign-check-icon.png"/>
                    <span class="card-title">Allen</span>
                    <p>Archie is cool.</p>
                </div>
                <div class="card-action">
                    <a href="allsnippets.html">All snippets</a>
                    <a href="#">Homepage</a>
                </div>
            </div>           
        </div>
    </div> -->

<div class="container">
    
<?php
$connect=mysqli_connect("localhost","root","123456fxf");
    mysqli_select_db($connect,"Scenario4") or die('数据库连接错误，错误信息：'.mysqli_error()); 
$query="SELECT DISTINCT Username FROM Snippets" ;
$db = new PDO("mysql:dbname=Scenario4", "root", "123456fxf");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$rows = $db->query($query);
foreach ($rows as $row) {
    ?>  
    <div class="row">
        <div class="col s12 m12">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                     <span class="card-title"> <?=$row['Username'] ?>   </span>    
                   
                </div>

                <div class="card-action">

                    <form method="post" action="../php/url.php">
                    
                    <button class="btn" name="name"  type="submit" value="<?=$row['Username']?>">  Homepage  </button></br>
              
                    </form>
                    </br>





                    <form method="post" action="../php/showsnippet.php">

                    <button name="Username"  class="btn"  type="submit" value="<?=$row['Username']?>">All Snippets</button>

                    </form>

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




