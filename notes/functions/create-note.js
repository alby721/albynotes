function newNote(user_id) {
    var user_id = localStorage.getItem("user_id");
    $.ajax({
        url: "actions/new-note.php", //the page containing php script
        type: "POST", //request type
        data: {
            user_id: user_id,
        },
        success: function(result) {
            quill.enable(true)
            $('#title').css("display", "inline");
            $('#title').focus();
            $('.ql-editor').html(result);
            refreshList();
            if (width < 768) {
                $('.navbar-right').removeClass('d-inline').addClass('d-none');
                $('.right-column').removeClass('d-inline').addClass('d-none');
                $('.navbar-left').removeClass('d-none').addClass('d-inline');
                $('.left-column').removeClass('d-none').addClass('d-inline');
    
            }
        
        }
    });
}