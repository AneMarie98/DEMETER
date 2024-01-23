<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
setlocale(LC_ALL,'it_IT');

$rifiuto = $_POST['rifiuto'];


require_once "../functions/dbAccess.php";

$db=new DB\DBAccess;
$connOk=$db->openDBConnection();
$results = array();



try {
    if($connOk){
        $results = $db->searchRifiuto(strtolower($rifiuto));
        $processedResults = array();

        foreach ($results as $row) {
            $processedResults[] = array(
                'nomeRifiuto' => $row['nome'],
                'bidone' => $row['fkSvuotB']
            );
        }

    }
    header('Content-Type: application/json');
   echo json_encode($processedResults);
} catch (Exception $e) {
    // Log the error
    error_log($e->getMessage());
    // Return a JSON error response
    header('Content-Type: application/json');
    echo json_encode(['error' => 'An error occurred.']);
}