<?php
include($_SERVER['DOCUMENT_ROOT'] . '/notes/config.php');
include($root_path . '/notes/login/session.php');

$title = $_POST['title']; 
$content = ($_POST['content']); 
$current_note_id=$_POST['current_note_id'];
$sql = "UPDATE notes SET 
title='".$title."',
content = '" . $content . "',
updated_at = CURRENT_TIMESTAMP()
WHERE id = " .  $current_note_id;

if (mysqli_query($conn, $sql)) {

}

?>
<script type="text/javascript">
    var $current_time = <?php echo date('m/d/Y', time());?>
    $('#note_updated_at').val(current_note_id);
</script>