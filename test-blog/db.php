<?php

function db_connect(){
    $link = mysqli_connect(localhost, bohdan0516, "0516", blog)
        or die("Error!: " . mysqli_error($link));
    if(!mysqli_set_charset($link, "utf8")){
        printf("Error!: " . mysql_error($link));  
    }   return $link;
}