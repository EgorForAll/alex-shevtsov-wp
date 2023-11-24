<?php
date_default_timezone_set("Europe/Moscow");
// $date_one = date('Y-m-d H:i:s');

list($year, $month, $day) = explode('-', date('Y-m-d'));

$arr_of_data = [$year, $month, $day];

function get_sum($arr)
{
    $sum = 0;
    foreach ($arr as $value) {
        $sum = $sum + array_sum(str_split($value));
    }
    return $sum;
}

$result = get_sum($arr_of_data);

echo $result;
