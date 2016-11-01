<?php
error_reporting(-1);
mb_internal_encoding('utf-8');

function rndArray(){
    $rndArray=array();
    $size=mt_rand(5,7);
    for($i=0;$i<$size;$i++){
        for ($j=0; $j<$size; $j++){
            $arrayj[]=$j+$j."Тест";
        }
        $rndArray[]=$arrayj;
    }
    return json_encode($rndArray);
}

function myFileCreate($fileName, $fileContent){
    file_put_contents($fileName, $fileContent);
    $result=file_get_contents($fileName);
    return $result;
}

function myReadFromFile($fileName){
    $result=file_get_contents($fileName);
    return $result;
}

function compareFiles(){  // Функция сравнения файлов
    $readFirstFile=myReadFromFile("output2.json");
    $readFirstFile2=myReadFromFile("output.json");

    $diffArray=[];

    $readFirstFile=json_decode($readFirstFile);
    $readFirstFile2=json_decode($readFirstFile2);


    for($i=0; $i<count($readFirstFile);$i++){
        for($j=0; $j<count($readFirstFile[$i]);$j++){
            if($readFirstFile[$i][$j]==$readFirstFile2[$i][$j]){
                // Различий нет, сидим курим.
            }else{
                $diffArray[]=($readFirstFile[$i][$j]); // брутально добавим различие в третий массив.
            }
        }
    }

    $result =  implode("[]", $diffArray);
    return $result;
}

echo "<br>Вызываем JSON ".rndArray();

echo "<br>Создаём файл output.json ".myFileCreate("output.json", rndArray());

echo "<br>Читаем файл ".myReadFromFile("output.json");

$openOrNotOpen=mt_rand(0,0);

if($openOrNotOpen==0){
    echo "<br>Тут мы решили что файл изменять надо ";
    $changeFileData= json_decode(myReadFromFile("output.json"));
    for ($i=0;$i<count($changeFileData);$i++){
        for($j=0;$j<count($changeFileData[$i]);$j++){  // Ну тут меняем каждую строку которая равна 2тест
            if ($changeFileData[$i][$j]=='2Тест'){
                $changeFileData[$i][$j]='И тут такое изменение. Пыщь.';
            }else{
            }
        }
    }

    echo "<br>Создаём файл output2.json ".myFileCreate("output2.json", json_encode($changeFileData));
}else{
    echo "<br>Тут мы с рандомом решили что файл изменять не надо ";
    echo "<br>Создаём файл output2.json ".myFileCreate("output2.json", myReadFromFile("output.json"));
}

echo "<br>Сравниваем файлы и выводим разницу ".compareFiles();