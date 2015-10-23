<?php

$c = curl_init();

curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($c, CURLOPT_URL, 'http://service.nfusionsolutions.biz/api/metals/spotsummaries?metals=gold,silver,platinum,palladium&currency=usd&token=388d59c3-fde9-4793-8f62-39137ad4e2cc');
$spot = curl_exec($c);

curl_setopt($c, CURLOPT_URL, 'http://www.cmi-gold-silver.com/content/themes/cmi_new/api/channels/brokerspage');
$products = curl_exec($c);

curl_close($c);

echo '[{"Spot" : ' . $spot . ', "Products" ' . ': ' . $products . '}]';
