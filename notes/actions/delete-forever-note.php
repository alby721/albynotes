<?php
include($_SERVER['DOCUMENT_ROOT'] . '/notes/config.php');
include($root_path . '/notes/login/session.php');

$current_note_id=$_POST['current_note_id'];
$sql = "DELETE FROM notes 
WHERE id = " .  $current_note_id;

if (mysqli_query($conn, $sql)) {

}

?>