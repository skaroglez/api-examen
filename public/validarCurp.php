<?php
$peticion = '<soapenv:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:ValidateMexico">
   <soapenv:Header/>
   <soapenv:Body>
      <urn:Curp soapenv:encodingStyle="http://schemas.xmlsoap.org/soap/encoding/">
     <return xsi:type="urn:CurpReq">
        <user xsi:type="xsd:string">prueba</user>
        <password xsi:type="xsd:string">sC}9pW1Q]c</password>
        <Curp xsi:type="xsd:string">CACE910901HSLSRL00</Curp>
     </return>
      </urn:Curp>
   </soapenv:Body>
</soapenv:Envelope>';
    $header = array(
        'Content-type: text/xml;charset="utf-8"',
        'Accept-Encoding: gzip, deflate',
        'SOAPAction: "urn:ValidateMexico#Curp"',
        'Connection: Keep-Alive',
        'Content-length: '.strlen($peticion),
    );
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://187.160.251.219/ws/index.php');
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FRESH_CONNECT, 1);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $peticion);
    curl_setopt($curl, CURLOPT_ENCODING, $peticion);
    $re = curl_exec($curl);
curl_close($curl);
print_r($re);
$doom = new \DOMDocument();
$doom->loadXML($re);
$estatus = $doom->getElementsByTagName('Response')->item(0)->nodeValue;
if ($estatus=='correct') {
        echo 'Curp: '.  $doom->getElementsByTagName('Curp')->item(0)->nodeValue ."<br/>";
        echo 'Paterno: '.$doom->getElementsByTagName('Paterno')->item(0)->nodeValue."<br/>";
        echo 'Materno: '.$doom->getElementsByTagName('Materno')->item(0)->nodeValue."<br/>";
        echo 'Nombre: '.$doom->getElementsByTagName('Nombre')->item(0)->nodeValue."<br/>";
        echo 'Nombre: '.$doom->getElementsByTagName('Calle')->item(0)->nodeValue."<br/>";
        echo $doom;
}else{
    echo "Error";
}


