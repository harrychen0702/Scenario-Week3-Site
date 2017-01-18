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
            <li><a href="home.php">Home</a></li>
            <li><a href="mysnippets.php">My Snippets</a></li>
            <li><a href="newsnippet.php">New Snippets</a></li>
            <!-- <li><a href="upload.php">Upload</a></li> -->
        </ul>
        <ul class="right hide-on-med-and-down">
            <li><span><?php echo $_SESSION['name'];  ?>  </span></li>
            <li><a href="#">Profile</a></li>
            <li><a href="../php/logout.php">Sign out</a></li>
        </ul>
    </div>
</nav>
<form method="POST" action="../php/edit.php">  <!-- 发送表单 -->
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Edit Profile</span>
                    <div class="row">
                        <div class="input-field col s12">
                            <input disabled value="<?php echo $_SESSION['name']; ?>" id="user_id" type="text" class="validate"> <!-- username,无法修改 -->
                            <label for="user_id">User id:</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="old_password" type="password" class="validate" name="oldpassword">  <!-- 旧密码,需要验证 -->
                            <label for="old_password">OLD Password:</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="new_password" type="password" class="validate" name="newpassword"> <!-- 新密码 -->
                            <label for="new_password">NEW Password:</label>
                        </div>
                    
                        <div class="input-field col s6">
                            <input  id="homepage_url" type="url" class="validate" name="homepage_url">
                            <label class="active" for="homepage_url" >Home page::</label> <!-- homepage url -->
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea type="text" id="private_snippet" class="materialize-textarea" name="snippet"></textarea>
                            <label for="private_snippet">Private snippet:</label>   <!-- snippet -->
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <!-- <a href="#">Update</a> -->
                    <input type="submit" name="Update" value="Update">
                </div>
            </div>
        </div>
    </div>
</div>
</form>
</body>
</html>
