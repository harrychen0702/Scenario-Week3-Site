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


<fieldset>
<legend>User Login</legend>
<form method="post" action="../php/signin.php">  <!-- 表单 -->
<p>
<label for="username" class="label">username:</label>
<input id="username" name="user_name" type="text" class="input" />
<p/>
<p>
<label for="password" class="label">Password:</label>
<input id="password" name="password" type="password" class="input" />
<p/>
<p>
<input type="submit" name="submit" value="  Submit  " class="left" />
</p>
</form>
</fieldset>

</body>
</html>

