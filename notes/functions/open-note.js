//Open Note from sidebar
$(document).on("click", ".note-list-item", function() {
    //refreshList();
    $('.note-list-item').css('background', 'transparent');


    var note_id_list = $(this).find("[name='note_id_list']").val();
    //alert("note_id_list" + note_id_list);
    $('#title').css('display', 'inline');
    $(this).css('background-color', 'rgba(243, 163, 44,.5');
    $.ajax({
        url: "actions/open-note.php", //the page containing php script
        type: "POST", //request type
        data: {
            note_id_list: note_id_list
        },
        success: function(result) {
            //$('#editor').html(result);
            // If i'm in trash quill is not enable
            if ($('.menu-delete').css('display') == "inline") {
                quill.enable(false)
            } else {
                quill.enable(true)
            }
            $('.ql-editor').html(result);
            $('#current_note_id').val(note_id_list);
            width = $(window).width();
            if (width < 768) {
                $('.navbar-right').removeClass('d-inline').addClass('d-none');
                $('.right-column').removeClass('d-inline').addClass('d-none');
                $('.navbar-left').removeClass('d-none').addClass('d-inline');
                $('.left-column').removeClass('d-none').addClass('d-inline');

            }
            current_note_id = $('#current_note_id').val();
            var highlightNote = 'note_id_list_' + current_note_id;
            //alert(highlightNote);
            $('#' + highlightNote).css('background-color', 'rgba(243, 163, 44,.5');
            //alert(current_note_id);
            var created_at = $('#note_created_at').val();
            var updated_at = $('#note_updated_at').val();
            $('.info-box-p').html('Created: ' + created_at + '<br><br> Updated: ' + updated_at);
        }
    });
});