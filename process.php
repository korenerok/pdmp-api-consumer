<?php

$envVariables = parse_ini_file('.env');
$Host = $envVariables['HOST_NAME'];
$Url = $envVariables['URL'];
$cert = $envVariables['CERTFILE'];
$key = $envVariables['KEYFILE'];

include_once('xml.php');

$xmlFile = tempnam(sys_get_temp_dir(), 'xml');
file_put_contents($xmlFile, $xml);

$curlCommand = "curl -X POST -H 'Content-Type: application/xml' ";
$curlCommand .= "-H 'Host: $Host' ";
$curlCommand .= "--cert $cert --key $key ";
$curlCommand .= "-d @$xmlFile ";
//$curlCommand .= "-d @recond_request.xml ";
$curlCommand .= "$Url";
// Execute the curl command
$response = shell_exec($curlCommand);

$xmlstring = simplexml_load_string($response);



$patientInfo = $xmlstring->Body->RxHistoryResponse->Patient;
$medicationDispensed = $xmlstring->Body->RxHistoryResponse->MedicationDispensed;

// $medicationByPage = 25;
// $totalMedicationList = count($medicationDispensed );
// $totalPages = ceil($totalMedicationList / $medicationByPage);



// Output the response

// echo $response;


?>
