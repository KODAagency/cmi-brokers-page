<?php

$ch = curl_init('http://www.cmi-gold-silver.com/content/themes/cmi_new/api/channels/brokerspage');

curl_exec($ch);
curl_close($ch);
