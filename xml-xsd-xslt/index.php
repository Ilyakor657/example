<?php
  require_once 'factory.php';

  $subject = "legal";

  $xml = new DOMDocument();
  $xml->formatOutput = true;
  $root = $xml->createElement("report");
  $xml->appendChild($root);
  SubjectFactory::createSubject($xml, $root, $subject);

  $xslt = new DOMDocument();
  $xslt->load("xslt/report.xslt");

  $processor = new XSLTProcessor();
  $processor->importStylesheet($xslt);
  $html = $processor->transformToXML($xml);
  
  echo $html;
?>