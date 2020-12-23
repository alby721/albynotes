// Refresh list
$(document).ready(function () {
    refreshList();
    $('#title').css('display', 'none');
});

function refreshList() {
    var query = $('#input-search').val();

    $.ajax({
        url: "actions/refresh-list.php", //the page containing php script
        type: "POST", //request type
        data: {
            query: query
        },
        success: function (result) {
            $('.note-list').html(result);
        }
    });
}