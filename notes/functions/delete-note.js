function trashData() {
    var current_note_id = $('#current_note_id').val();
    $.ajax({
        url: "actions/trash-note.php", //the page containing php script
        type: "POST", //request type
        data: {
            current_note_id: current_note_id
        },

        success: function() {
            //$('#editor').parent().html(result);
            quill.enable(false)
            $('#title').css("display", "none");
            $('.ql-editor').html("");
            //alert('Note Trashed');
            refreshList();
        }
    });

}