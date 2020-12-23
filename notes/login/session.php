<?php
//Apro la sessione e...
session_start();

//Imposto il timeout
$timeout = 86400; // Number of seconds until it times out.
 
// Check if the timeout field exists.
if(isset($_SESSION['timeout'])) {
    // See if the number of seconds since the last
    // visit is larger than the timeout period.
    $duration = time() - (int)$_SESSION['timeout'];
    if($duration > $timeout) {
        // Destroy the session and restart it.
        session_destroy();
        session_start();
    }
}
 
// Update the timout field with the current time.
$_SESSION['timeout'] = time();

if (empty($_SESSION['id'])) {
    header("location: /notes/login/");
}
//Recupero i dati...
$sessionid = $_SESSION['id'];
$sessionlevel = $_SESSION['level'];
$user = $_SESSION['username'];
$psw = $_SESSION['password'];

//Se non c'è nessuna sessione reindirizzo al login
?>