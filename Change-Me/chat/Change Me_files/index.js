$(document).ready(function()
{
    var nextMessageId = 2;

    function sendData(data, callback)
    {
        $.post("../server.php",JSON.stringify(data),callback, "json");
    }

    function sendMessage(nick, message)
    {
        var data    = {func: "addMessage", nick: nick, message: message};
        sendData(data, function(data){
            getMessages();
        });
    }

    function getMessages()
    {
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
