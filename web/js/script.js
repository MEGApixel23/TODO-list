$(document).ready(function() {
    $('body').on('click', '[role=controls]', function(e) {
        e.preventDefault();

        return false;
    });
});