<?php
error_reporting(-1);
mb_internal_encoding('utf-8');

function createMyCsv(){
    $fileName="test.csv";
    $maxArray=mt_rand(50,100);
    $csvArray=[];
    for ($i=0;$i<$maxArray;$i++){
        $csvArray[$i]=mt_rand(0,1000);
    }
    file_put_contents($fileName, '');

    $fp=fopen($fileName,'w');
        fputcsv($fp, $csvArray);

    fclose($fp);

    $Result="TRUE";
    Return $Result;
}

function summFromCSV($filename){
    $tempArray=[];
    $row=1;
    if(($handle=fopen("test.csv","r"))!==FALSE){
        while (($data=fgetcsv($handle, 1000, ",")) !==FALSE){
            $num=count($data);
            echo "<p>$num полей св строке $row:<br></p>\n";
            $row++;
            for($c=0;$c<$num;$c++){
                if(($data[$c] % 2) == 0){
                    $tempArray[] = $data[$c];
                    //echo $data[$c]."<br>";
                }else{
                    //блок зачем?
                    // пробелы так де надо расставить везде иначе код не читаем

                }
            }
        }
        fclose($handle);
    }
    $summ=array_sum($tempArray);
    return $summ;
}

echo createMyCsv();
echo summFromCSV("test.csv");