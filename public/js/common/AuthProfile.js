jQuery(document).ready(function() {
    $.ajax({
        url: "/trackOptions",

        complete: function(jqXHR){
        var data = $.parseJSON(jqXHR.responseText);
        //console.log(data);
        $("#track").html(data);
        }});
    });