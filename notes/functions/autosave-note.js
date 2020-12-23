var timeoutId;
// Title
$('#title').on('input propertychange change', function() {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(function() {
        // Runs 1 second (500 ms) after the last change    
        saveData();
        console.log("saved");
    }, 500);
});

//Editor
$('#editor').on('input propertychange change', function() {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(function() {
        // Runs 1 second (500 ms) after the last change    
        saveData();
        console.log("saved");
    }, 500);
});

$('#editor').click(function() {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(function() {
        // Runs 1 second (500 ms) after the last change    
        saveData();
        console.log("saved");
    }, 500);
});