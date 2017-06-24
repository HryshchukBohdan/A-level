$(document).ready(function (){
    var $a = $("#a");
    var $b = $("#b");
    var $result;

    $("#plus").click(function () {

        $result = +$a.val() + +$b.val();
        $("#result").val($result);
    })

    $("#minus").click(function () {

        $result = +$a.val() - +$b.val();
        //alert($result);
        $("#result").val($result);
    })

    $("#divide").click(function () {

        $result = +$a.val() * +$b.val();
        $("#result").val($result);
    })

    $("#multiply").click(function () {

        $result = +$a.val() / +$b.val();
        $("#result").val($result);
    })


})