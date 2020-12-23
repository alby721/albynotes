<?php

//Database config
$servername = "localhost";
$username = "root";
$passworddb = "root";
$dbname = "local";
$conn = new mysqli($servername, $username, $passworddb, $dbname);

try {
    $dbh = new PDO("mysql:=$servername;dbname=$dbname", $username, $passworddb);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


// App name
$appname = "AlbyNotes";
$appdescription = "This contains the description of the website!";
$appmail = "info@albertoreineri.it";
$appwebsite = "albynotes.albertoreineri.it";

//path
$root_path = substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME'])) . '/';
$layouts_dir = $root_path . "/views/layouts";
$inc_dir = $root_path."/views/inc";
$assets_dir = "/assets";
$utility_dir="/utility";
$blog_image_dir="/notes/uploads/articoli";
$pages_image_dir="/notes/uploads/pagine";
$views_dir="/views";