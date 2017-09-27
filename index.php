<?php
include ('libs/soap.php');
include ('libs/soapCurl.php');
include ('libs/soapCurlXML.php');
include ('libs/soapXML.php');

/*$soap = new Soap;
print_r($soap->players());*/

/*$soap = new SoapXML;
print_r($soap->getCurs());*/

/*$soap = new SoapCurl;
print_r($soap->xmlString());*/

$soap = new SoapCurlXML;
print_r($soap->xmlPost());

//include ("templates/index.php");
