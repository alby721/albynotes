<?php
// configuration
include($_SERVER['DOCUMENT_ROOT'] . '/notes/config.php');
include($root_path . '/notes/login/session.php');
$user_id = $_POST['user_id'];
//Create new note
$sql = "INSERT INTO notes (
    user_id,
    title,
    content,
    trash,
    created_at,
    updated_at
    ) 
    VALUES (
    " . $user_id . ",
    'New note', 
    'Note text', 
    0,   
    CURRENT_TIMESTAMP(), 
    CURRENT_TIMESTAMP()
    )";
if ($conn->query($sql) === TRUE) {
    $note_id = $conn->insert_id;
    echo "";
}
?>

<script type="text/javascript">
    var note_id = "<?php echo $note_id; ?>";
    $('#current_note_id').val(note_id);
</script>

