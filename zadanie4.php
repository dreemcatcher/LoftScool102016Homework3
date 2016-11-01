<?php

function file_get_contents_curl($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Устанавливаем параметр, чтобы curl возвращал данные, вместо того, чтобы выводить их в браузер.
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);
//
//    echo "<pre>";
//    print_r($data);
//    echo "</pre>";
    curl_close($ch);

    $obj= json_decode($data);


    echo "<pre>";
    print_r($obj);
    echo "</pre>";

//    foreach($obj->pageid as $val) {
//        echo $val;
//    }

    echo $obj->query[0]->pages[0]. "<br>";

 //   $title= $obj-
//    echo $obj->pageid;
//    echo $obj->title;
//    echo $obj->office[0];
    //return $data;
}

$content=file_get_contents_curl("https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json");

echo $content;

//$obj= json_decode($content);
//echo "<br>1111<br>".$obj[0]."<br><br><br>";

//echo $obj->pageid;
//echo $obj->title;
//echo $obj->office[0];