<!DOCTYPE html>
<html>
<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <link href="main.css" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="js.js"></script>
</head>

<body onload="ShowPositon(49.9935, 36.2304)">
<div class="left-bar">
    <div id="add">
        <form>
            <input type="text" id="inp">
            <input type="button" onclick="GetLocation();" class="btn btn-primary" value="Add">
        </form>
    </div>
    <div id="saved_loc">
        <?php foreach ($arr as $ar):?>
            <a onclick="ShowPositon(<?php echo $ar[lat] ?>, <?php echo $ar[lng] ?>)"><?php echo $ar[name] ?></a><br/>
        <?php endforeach; ?>
    </div>
</div>
<div id="map"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfPYPYwqKC7oX1zG54iyEoU5cs-rFYNrI&callback=initMap"
        async defer></script>
</body>
</html>
