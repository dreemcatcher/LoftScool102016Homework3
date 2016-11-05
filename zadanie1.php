<?php
error_reporting(-1);
mb_internal_encoding('utf-8');

$xml = simplexml_load_file('data.xml');


echo "Номер заказа - ".$xml['PurchaseOrderNumber']; //индексы в массиве так не читаются это ж не константы
echo "<br>";
echo "Дата заказа - ".$xml['OrderDate'];
echo "<br>";


echo "<br>";
echo "Имя заказчика - ".$xml->Address[0]->Name;
echo "<br>";
echo "Улица/дом - ".$xml->Address[0]->Street;
echo "<br>";
echo "Город - ".$xml->Address[0]->City;
echo "<br>";
echo "Штат - ".$xml->Address[0]->State;
echo "<br>";
echo "Пометки - ".$xml->DeliveryNotes[0];
echo "<br>";

foreach ($xml->Items->Item as $item) {
    echo "<br>";
    echo "----------------------------------<br>";
    echo "Номер партии ".$item['PartNumber']. "<br>";
    echo "Наименование {$item->ProductName} <br/>"; // альтерантива конкатенации
    echo "Количество ".$item->Quantity. "<br/>";
    echo "Цена ".$item->USPrice. "<br>";
    echo "Дата доставки ".$item->ShipDate."<br>";
}
//Есть еще вариант например создать карту соответствие тэгов в xml и Русского и просто вытаскивать соотвествия так код сократится
// и болеее читабельнее будет