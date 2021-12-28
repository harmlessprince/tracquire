<?php


function format_date($date, string $format ='Y-m-d H:m:i')
{
    return $date->format($format);
}
