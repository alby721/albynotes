function saveData() {
    //var content = $('#editor').html();
    var content = $('.ql-editor').html();
    var title = $('#title').val();
    //console.log(content);
    var current_note_id = $('#current_note_id').val();
    $.ajax({
        url: "actions/save-note.php", //the page containing php script
        type: "POST", //request type
        data: {
            title: title,
            content: content,
            current_note_id: current_note_id
        },

        success: function() {
            //$('#editor').parent().html(result);
            refreshList();
        }
    });
}