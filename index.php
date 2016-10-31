<?php


$xml = simplexml_load_file("data.xml");

//foreach ($xml->PurchaseOrder->item as $item) {
//    echo $item->title."<br>";
//}

echo 'Номер заказа - '.$xml[PurchaseOrderNumber];
echo '<br/>';
echo 'Дата заказа - '.$xml[OrderDate];
echo '<br/>';

echo '<pre>';
echo '</pre>';
echo '<br/>';
echo 'Имя заказчика - '.$xml->Address[0]->Name;
echo '<br/>';
echo 'Улица\дом - '.$xml->Address[0]->Street;
echo '<br/>';
echo 'Город - '.$xml->Address[0]->City;
echo '<br/>';
echo 'Штат - '.$xml->Address[0]->State;
echo '<br/>';
echo 'Пометки - '.$xml->DeliveryNotes[0];
echo '<br/>';

foreach ($xml->Items->Item as $item) {
    echo '<br/>';
    echo '----------------------------------<br/>';
    echo 'Номер партии '.$item[PartNumber]. '<br/>';
    echo 'Наименование '.$item->ProductName. '<br/>';
    echo 'Количество '.$item->Quantity. '<br/>';
    echo 'Цена '.$item->USPrice. '<br/>';
    echo 'Дата доставки '.$item->ShipDate. '<br/>';
}