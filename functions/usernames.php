<?php

require_once "dbAccess.php";

$db=new DB\DBAccess;
$connOk=$db->openDBConnection();
$results = array();

try {
    if($connOk){
        $users = $db->getUsernames();
        $processedUsers = array();
            foreach ($users as $row) {
                $processedUsers[] = $row['username'];
            }
        $mails = $db->getEmails();
        $processedMails = array();
            foreach ($mails as $row) {
                $processedMails[] = $row['email'];
            }
        // Content type JavaScript
        header('Content-Type: application/javascript');
        // JavaScript code
        echo 'var usernames = ' . json_encode($processedUsers) . '; var emails = ' . json_encode($processedMails) . ';';
    }
    
} catch (Exception $e) {
    // Log the error
    error_log($e->getMessage());
    // Return a JSON error response
    header('Content-Type: application/json');
    echo json_encode(['error' => 'An error occurred.']);
}


