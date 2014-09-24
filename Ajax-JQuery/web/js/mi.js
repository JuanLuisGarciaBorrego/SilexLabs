$(document).ready(function(){

    $('#formulario').submit(function(e){
        e.preventDefault();
        var location = $(this).attr('action');
        var zona = $(".bg-success");

        $.post(location, function(data){
            zona.html("Soy <b>"+ data.nombre+"</b>");
        },'json');
    });
});