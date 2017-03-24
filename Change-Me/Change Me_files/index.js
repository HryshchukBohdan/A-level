$(document).ready(function(){
    var nextMessageId = 0;
    var $result;

    $("#msg").change(function () {
        var result = $("#msg").val();
        //$result = "vnvvn" + $result;
        var jpg = result.substr(0,23);
        alert(jpg)

        if (jpg == 'https://www.youtube.com') {
            var res = '<iframe src="' + result + '" width="468" height="60" align="left"> Ваш браузер не поддерживает плавающие фреймы   </iframe>'
                   // alert(res)
           // var res = '<img src="' + result + '" alt="альтернативный текст" />'
            $("#msg").val(res);
        }

    })

    function sendData(data, callback){
        $.post("http://students.a-level.com.ua:8070",JSON.stringify(data),callback, "json");
    }

    function sendMessage(nick, message){
        var data    = {func: "addMessage", nick: nick, message: message};
        sendData(data, function(data){
            getMessages();
        });
    }

    function getMessages(){
        var data    = {func: "getMessages", messageId: nextMessageId};
        sendData(data, function(data){
            //for (var msgIndex=0;msgIndex<data.data.length;msgIndex++)
            for (var msgIndex in data.data){
                msg     = data.data[msgIndex]
                $msgDiv = $("<div>").html("<b>" + msg.nick + "</b>:" + msg.message);
                $("#chat").prepend($msgDiv);
            }
            nextMessageId = data.nextMessageId;
        });
    }

    $("#send").click(function(){
        var nick    = $('#nick').val();
        var message = $('#msg').val();
        sendMessage(nick, message);
    });

    setInterval(getMessages,2000);
});
