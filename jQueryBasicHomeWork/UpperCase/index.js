$(document).ready(function (){

    var $text;

    $("#upperCase").click(function () {

        $text = $("#text").val().toUpperCase();
        $("#text").val($text);
    })
})