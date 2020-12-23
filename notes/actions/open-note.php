<?php
include($_SERVER['DOCUMENT_ROOT'] . '/notes/config.php');

$note_id_list = $_POST['note_id_list'];
$sql = "SELECT * FROM notes WHERE id = " . $note_id_list;
$_SESSION['current_note']=$note_id_list;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title= $row['title'];
        $content = $row['content'];
        $created_at =date("M d, Y",strtotime($row['created_at']));
        $updated_at = date("M d, Y",strtotime($row['updated_at']));
    }
}
$content = str_replace('<p></p>', '', $content);
echo $content;
?>

<script>
        var title = "<?php echo $title; ?>";
        var note_created_at = "<?php echo $created_at; ?>";
        var note_updated_at = "<?php echo $updated_at; ?>";
        
        $('#title').val(title);
        $('#note_created_at').val(note_created_at);
        $('#note_updated_at').val(note_updated_at);

</script>
