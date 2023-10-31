<?php
class Subject {
  protected function validator($xml, $xsd) {
    $validator = new DOMDocument();
    $validator->loadXML($xml->saveXML());
    if ($validator->schemaValidate($xsd)) {
        echo "XML соответствует XSD";
    } else {
        echo "XML не соответствует XSD";
    }
  }
}

class Legal extends Subject {
  public function __construct($xml, $root, $subject) {
    $subjectXML = $xml->createElement("subject", $subject);
    $chief = $xml->createElement("chief");
    $surname = $xml->createElement("surname", "Иванов");
    $name = $xml->createElement("name", "Иван");
    $patronymic = $xml->createElement("patronymic", "Иванович");
    $inn = $xml->createElement("inn", 1234567890);
    $org = $xml->createElement("org");
    $nameOrg = $xml->createElement("nameOrg", "ООО Пожилой");
    $ogrn = $xml->createElement("ogrn", 1234566789);
    $innOrg = $xml->createElement("innOrg", 1234566789);
    $kpp = $xml->createElement("kpp", 1234566789);
    $address = $xml->createElement("address");
    $region = $xml->createElement("region", "Тот самый");
    $city = $xml->createElement("city", "Москва");
    $street = $xml->createElement("street", "Пожилая");
    $house = $xml->createElement("house", 12);
    $chief->appendChild($surname);
    $chief->appendChild($name);
    $chief->appendChild($patronymic);
    $chief->appendChild($inn);
    $org->appendChild($nameOrg);
    $org->appendChild($ogrn);
    $org->appendChild($innOrg);
    $org->appendChild($kpp);
    $org->appendChild($address);
    $address->appendChild($region);
    $address->appendChild($city);
    $address->appendChild($street);
    $address->appendChild($house);
    $root->appendChild($subjectXML);
    $root->appendChild($chief);
    $root->appendChild($org);
    $xsd = "xsd/legal.xsd";
    $this->validator($xml, $xsd);
  }
} 

class Individual extends Subject {
  public function __construct($xml, $root, $subject) {
    $subjectXML = $xml->createElement("subject", $subject);
    $client = $xml->createElement("client");
    $surname = $xml->createElement("surname", "Иванов");
    $name = $xml->createElement("name", "Иван");
    $patronymic = $xml->createElement("patronymic", "Иванович");
    $dateBirth = $xml->createElement("dateBirth", "2001-01-01");
    $inn = $xml->createElement("inn", 1234567890);
    $passport = $xml->createElement("passport");
    $serial = $xml->createElement("serial", 1234);
    $number = $xml->createElement("number", 123456);
    $dateIssue = $xml->createElement("dateIssue", "2001-01-01");
    $client->appendChild($surname);
    $client->appendChild($name);
    $client->appendChild($patronymic);
    $client->appendChild($dateBirth);
    $client->appendChild($inn);
    $client->appendChild($passport);
    $passport->appendChild($serial);
    $passport->appendChild($number);
    $passport->appendChild($dateIssue);
    $root->appendChild($subjectXML);
    $root->appendChild($client);
    $xsd = "xsd/individual.xsd";
    $this->validator($xml, $xsd);
  }
} 

class SubjectFactory {
  public static function createSubject($xml, $root, $subject) {
    switch ($subject) {
      case 'legal':
        return new Legal($xml, $root, $subject);
        break;
      case 'individual':
        return new Individual($xml, $root, $subject);
        break;
    }
  }
}