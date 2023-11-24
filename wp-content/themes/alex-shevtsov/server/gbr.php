<?php
$json = file_get_contents("https://www.cbr-xml-daily.ru/daily_json.js");

$currency = json_decode($json);

$gbp = round($currency->Valute->GBP->Value);

echo $gbp;
