<?php
include($_SERVER['DOCUMENT_ROOT'] . '/notes/config.php');
include($root_path . '/notes/login/session.php');
$query = $_POST['query'];
$sql = "SELECT * FROM notes WHERE user_id = " . $_SESSION['id'] . " AND trash = 0 AND (title like '%". $query."%' OR content like '%. $query .%') ORDER BY updated_at DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
        ?>
        <div class="note-list-item" id="note_id_list_<?php echo $row['id']; ?>" style="background-color:transparent">
            <input type="hidden" name="note_id_list" value="<?php echo $row['id']; ?>">
            <div class="text">
                <b><?php echo $row['title']; ?></b> <br>
                <?php 
                $content = $row['content'];
                $content = str_replace( '<', ' <',$content );
                $content = strip_tags( $content );
                $content = str_replace( '  ', ' ', $content );              
                  echo substr(($content),0,50); 
                ?>
            </div>
        </div>
<?php


    }
}
?>