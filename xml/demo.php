<?php

$xml = new SimpleXMLElement('<nodes></nodes>');

$node1 = $xml->addChild('node');
$node1->addAttribute('num', 'node1');

$node1->addChild('title', 'the magic title');
$node1->addChild('time', 11111111);

$node2 = $xml->addChild('node');
$node2->addChild('title', 'the magic title');
$node2->addChild('time', 11111111);

var_dump($xml->asXML());

$xmlStr = $xml->asXml();

print_r(simplexml_load_string($xmlStr));

$obj = simplexml_load_string($xmlStr);

var_dump($obj[0]->node->title);
