<?php
//Apro la sessione e...
session_start();

unset($_SESSION['id']);
unset($_SESSION['level']);
unset($_SESSION['username']);
unset($_SESSION['password']);

header("location: ../../");

?>