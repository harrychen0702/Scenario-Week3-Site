<?php
    session_start();
    $_SESSION["checked"] = 0;
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
        <a  href="home.php" class="brand-logo">Home</a>
        <ul class="right hide-on-med-and-down">
            <li><a href="signin.php">Sign in</a></li>
            <li><a href="signup.php">Sign up</a></li>
        </ul>
    </div>
</nav>

<form method="post" action="../php/signup.php">   <!-- 表单 -->
<div class="container">
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Sign Up</span>
                    <p>Sign up for a new account:</p>                  
                     <form method="post" action="../php/signup.php">   <!-- 表单 -->
                      <div class="row">
                        <div class="input-field col s12">
                            <input id="user_name" type="text" class="validate" name="user_name" > <!-- 用户名 -->
                            <label for="user_name">User name:</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password"> <!-- 密码 -->
                            <label for="password">Password:</label>
                        </div>
                    
                      </div>
                </div>
                <div class="card-action">
                    <input type="submit" value="Create Account" name="submit">
                </div>
            </div>
        </div>
    </div>
</div>
</form>
</body>
</html>