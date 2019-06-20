var authid=document.currentScript.getAttribute("authid"); //1

jQuery(document).ready(function() {
    $.ajax({
        url: "/AuthtrackOptions?id="+authid,

        complete: function(jqXHR){
        var data = $.parseJSON(jqXHR.responseText);
        console.log(data);
        $("#parentTrack").html(data);
        }});


        $.ajax({
            url: "/AuthcategoryOptions",
    
            complete: function(jqXHR){
            var data = $.parseJSON(jqXHR.responseText);
            console.log(data);
            $("#category").html(data);
            }});


        
    });