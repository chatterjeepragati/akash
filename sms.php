<?php
//phpinfo();
$url = "http://bulksms.mysmsmantra.com/WebSMS/SMSAPI.jsp?username=akashbeyond&password=425685419&sendername=AKASHB&mobileno=6290865327&message=Hello";
//$url = "http://kachedure.in";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);
echo $curl_scraped_page;
?>