$(document).ready(function() {
    $("#doi_field").submit(function(e) {
        e.preventDefault();
        var doi = $("#doi_val").val();
        $.ajax({
            url: '/new-entry/'. doi,
            type: 'get',
            // dataType: 'json',
            // data: {
            //     'doi' : doi,
            //     '_token' : token
            // }
        });
    });
});