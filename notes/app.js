// Include Function
function include(file) {
    var script = document.createElement('script');
    script.src = file;
    script.type = 'text/javascript';
    script.defer = true;
    document.getElementsByTagName('head').item(0).appendChild(script);
}

//Refresh List
include('/notes/functions/refresh-list.js');

//Open Note from sidebar
include('/notes/functions/open-note.js');

// create new note
include('/notes/functions/create-note.js');

//Save Data
include('/notes/functions/save-note.js');

//Delete note
include('/notes/functions/delete-note.js');

//AutoSave
include('/notes/functions/autosave-note.js');

$('.tag-trash').click(function () {
    refreshTrashList();

});

function refreshTrashList() {
    closeNote();
    var query = $('#input-search').val();
    $('#input-search').val('');

    $.ajax({
        url: "actions/open-trash-notes.php", //the page containing php script
        type: "POST", //request type
        data: {
            query: query
        },
        success: function (result) {
            $('.tags-section-content').css('display', 'none');
            $('.tags-section').css('width', '0');
            $('.note-list').html(result);
            $('.menu-delete').css('display', 'inline')
            $('.note-menu').css('display', 'none')
        }
    });
}

$('.tag-notes').click(function () {
    closeNote();
    $('#input-search').val('');
    $.ajax({
        url: "actions/refresh-list.php", //the page containing php script
        type: "POST", //request type
        success: function (result) {
            $('.tags-section-content').css('display', 'none');
            $('.tags-section').css('width', '0');
            $('.note-list').html(result);
            $('.menu-delete').css('display', 'none')
            $('.note-menu').css('display', 'inline')
        }
    });
});

function closeNote() {
    //$('#input-search').val('');

    quill.enable(false)
    $('.ql-editor').html('');
    $('#current_note_id').val('');
    $('#title').css('display', 'none');

}

// Restore Note
$('.restore-note').click(function () {
    var current_note_id = $('#current_note_id').val();
    $.ajax({
        url: "actions/restore-note.php", //the page containing php script
        type: "POST", //request type
        data: {
            current_note_id: current_note_id
        },

        success: function () {
            //$('#editor').parent().html(result);
            location.reload();

        }
    });

});

// Delete Note
$('.delete-forever').click(function () {
    var current_note_id = $('#current_note_id').val();

    $.ajax({
        url: "actions/delete-forever-note.php", //the page containing php script
        type: "POST", //request type
        data: {
            current_note_id: current_note_id
        },

        success: function () {
            $.ajax({
                url: "actions/open-trash-notes.php", //the page containing php script
                type: "POST", //request type
                success: function (result) {
                    $('.tags-section-content').css('visibility', 'hidden');
                    $('.tags-section').css('width', '0');
                    $('.note-list').html(result);
                    $('.menu-delete').css('display', 'inline')
                    $('.note-menu').css('display', 'none')
                }
            });
        }
    });

});

// Search Notes
$('#input-search').on('keypress', function (e) {
    if (e.which === 13) {
        if ($('.note-menu').is(':visible')) {
            refreshList();
        } else {
            refreshTrashList();
        }
    }
});