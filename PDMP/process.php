<?php




$envVariables = parse_ini_file('.env');
$Host = $envVariables['HOST_NAME'];
$Url = $envVariables['URL'];
$cert = $envVariables['CERTFILE'];
$key = $envVariables['KEYFILE'];
$server = $envVariables['DBSERVER'];
$username = $envVariables['DBUSER'];
$password = $envVariables['DBPASS'];
$database = $envVariables['DBNAME'];
$db = mysqli_connect($server, $username, $password, $database);
// include_once('./assets/conection.php');

if($_GET['user'] && $_GET['patientID']){
  $user = $_GET['user'];
  $patient = $_GET['patientID'];
  $query = "INSERT INTO logs (PatientID, UserID) VALUES('$user', '$patient')";
  $save = mysqli_query($db, $query);  

  if ($save){
    $sql = "SELECT id, Date, Time FROM logs ORDER BY id DESC LIMIT 1";
    $result=mysqli_query($db,$sql);
    $result=mysqli_fetch_assoc($result);
    $messageID = $result['id'];
    $date = $result['Date'];
    $time = $result['Time'];
  }


}else {
  
}


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










// Output the response

// echo $response;


?>
