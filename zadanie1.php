<?php
error_reporting(-1);
mb_internal_encoding('utf-8');
function myReadFromFile($fileName){
    $result=file_get_contents($fileName);
    return $result;
}
echo myReadFromFile('data.xml');