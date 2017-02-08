<?php
function articles_all(){
    $art1 = ["id"=>1, "title"=> "title11111", "date"=> "2015-01-01", "content"=> "CONTENT1"];
    $art2 = ["id"=>2, "title"=> "title2222", "date"=> "2015-05-08", "content"=> "CONTEN222"];    
    
    $arr[0] = $art1;
    $arr[1] = $art2;
    
    return $arr;
}

function articles_get($id){
    return ["id"=>1, "title"=> "это заголовок", "data"=> "2015-01-01", "content"=> "Cтаньсяяя"];
    
}

function articles_new($title, $date, $content){
    
}

function articles_edit($id, $title, $date, $content){
    
}

function articles_delete($id){
    
}



?>