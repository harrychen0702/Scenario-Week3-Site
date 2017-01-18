<?php
session_start();
unset($_SESSION["name"]);
unset($_SESSION["allsnippet"]); // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
unset($_SESSION["timeout"]);
header("Location: ../pages/signin.php");
?>