<?php

$url1 = "https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD,RUB";
$url2 = "https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=USD,RUB";
$url3 = "https://min-api.cryptocompare.com/data/price?fsym=USD&tsyms=RUB";
$url4 = "https://min-api.cryptocompare.com/data/price?fsym=EUR&tsyms=RUB";
$json1 = json_decode(file_get_contents($url1));
$json2 = json_decode(file_get_contents($url2));
$json3 = json_decode(file_get_contents($url3));
$json4 = json_decode(file_get_contents($url4));
$BTC_USD = $json1->USD;
$BTC_RUB = $json1->RUB;
$ETH_USD = $json2->USD;
$ETH_RUB = $json2->RUB;
$USD_RUB = $json3->RUB;
$EUR_RUB = $json4->RUB;

//echo $BTC_USD.'<br>';
//echo $BTC_RUB.'<br>';
//echo $ETH_USD.'<br>';
//echo $ETH_RUB.'<br>';
//echo $USD_RUB.'<br>';
//echo $EUR_RUB.'<br>';


//$url = "https://bitpay.com/api/rates";
//$json = json_decode(file_get_contents($url));
//$dollar = $btc = 0;
//foreach($json as $obj){
//    echo '1 bitcoin = $'. $obj->rate .' '. $obj->name .' ('. $obj->code .')<br>';
//}
?>