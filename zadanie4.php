<?php

    $url="https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json";
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Устанавливаем параметр, чтобы curl возвращал данные, вместо того, чтобы выводить их в браузер.
    curl_setopt($ch, CURLOPT_URL, $url);

    $data = curl_exec($ch);

    curl_close($ch);

    $curlArray = json_decode($data, true);

//    echo "<pre>";
//    print_r($curlArray);
//    echo "</pre>";

    echo $curlArray[query][pages][15580374][pageid]."<br>";
    echo $curlArray[query][pages][15580374][title]."<br>";