<?php
require_once 'vendor/autoload.php';
use Tustin\PlayStation\Client;

//connection to the playstation api with psn-php librairy
function getPlayStationClient(){
    $client = new Client();
    $client->loginWithNpsso('Z05VaSabBl8a1SPVNUeoK4XAqKYTp0TNr65LVti27DX8sNzOvMTU0wZlnPx698CG');
    return $client;
}

function getUserByOnlineId($username){
    $client = getPlayStationClient();
    $query = $client->users()->search($username);
    try{
        $user = $query->current();
    }
    catch(Exception $e){
        return "";
    }
    return $user;
}

function getUserByAccountId($account_id){
    $client = getPlayStationClient();
    $user = $client->users()->find($account_id);
    return $user;
}

?>