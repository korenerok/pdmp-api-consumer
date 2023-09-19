<?php

// //conexion 
// $server = "localhost";
// $username = "root";
// $password = 'clon.21079951';
// $database = 'pdmp';
// $db = mysqli_connect($server, $username, $password, $database);

// mysqli_query($db, "SET NAMES 'utf8'");

// //inciamo session 
// if(!isset($_SESSION)){
//   session_start();
// }



$envVariables = parse_ini_file('.env');
$Host = $envVariables['HOST_NAME'];
$Url = $envVariables['URL'];
$cert = $envVariables['CERTFILE'];
$key = $envVariables['KEYFILE'];



include_once('./xml.php');




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

$error = $xmlstring->Body->Error;



if($medicationDispensed){
  $datos = [];

  foreach ($medicationDispensed  as $value) {
    $dato = [
      "medication" => !empty($value->DrugDescription) ? $value->DrugDescription  : "-",

      "state" => !empty($value->Pharmacy->Address->State) ? $value->Pharmacy->Address->State  : "-",


      "date_filled" => !empty($value->LastFillDate->Date) ? date("m-d-Y",strtotime($value->LastFillDate->Date))  : "-",

      "days_written" => !empty($value->WrittenDate->Date) ? date("m-d-Y",strtotime($value->WrittenDate->Date)) : "-",
      
      "day_supply" => !empty($value->DaysSupply) ? $value->DaysSupply  : "-",

      "quantity_dispensed" =>!empty($value->Quantity->Value) ? $value->Quantity->Value  : "0", 

      "refills_remaining" => !empty($value->Refills->Value) ? $value->Refills->Value  : "0",

      "prescriber" =>!empty($value->Prescriber->Name->FirstName) &&!empty($value->Prescriber->Name->LastName)  ? $value->Prescriber->Name->FirstName.' '. $value->Prescriber->Name->LastName : "-",

      "pharmacy_name " => !empty($value->Pharmacy->StoreName) ? $value->Pharmacy->StoreName  : "-"

    ];

    $datos[] = $dato;

  }

}







// Output the response

// echo $response;


?>
