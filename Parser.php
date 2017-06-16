<?php

include('simple_html_dom.php');
$fileName="sitemap_99acres.xml";

$xml=simplexml_load_file($fileName) or die("Error: Cannot create object");
//print_r($xml);
$url= $xml->url[0]->loc;
echo "$url";
echo "<hr/>";
$html = file_get_html($url);
echo "$html"
?>