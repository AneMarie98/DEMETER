<?php
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    setlocale(LC_ALL,'it_IT');

    require_once "../functions/dbAccess.php";

    $db=new DB\DBAccess;
    $connOk=$db->openDBConnection();
    $results = array();

    try {
        if($connOk){
            $results = $db->getSvuotDays();
            $processedResults = array();
    
            foreach ($results as $row) {
                $processedResults[] = array($row['bidone'],$row['giorno'],$row['intervallo'],$row['giornoRif']);
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