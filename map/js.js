function ShowPositon(x, y) {
    var mapOptions = {
        center: new google.maps.LatLng(x, y),
        zoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map"),
        mapOptions);

    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(x, y),
        map: map,
    });
    return (false);
}

function GetLocation() {
    var inp = $('#inp').val();
    var url = 'http://maps.googleapis.com/maps/api/geocode/json?sensor=false&address=' + inp;
    loadJSON(url, function(data) { data.name = inp; sent(data); ShowPositon(data.lat, data.lng); getMessages(data); })
 }

function loadJSON(path, success)
{
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function()
    {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                if (success)
                    success(JSON.parse(xhr.responseText).results[0].geometry.location);
            }
        }
    };
    xhr.open("GET", path, true);
    xhr.send();
}

function sent(responce) {

    $.ajax({
        type: 'POST',
        async: true,
        url: "/",
        data: responce,
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                alert(data['message']);
            } else {
                alert(data['message']);
            }
        }
    })
}

function getMessages(data){

    var text = '<a onclick="ShowPositon(' + data.lat + ', ' + data.lng + ')">' + data.name+ '</a><br/>'
    $("#saved_loc").prepend(text);

}