<?php
require_once 'vendor/autoload.php';
use Tustin\PlayStation\Client;

//connection to the playstation api with psn-php librairy
function getPlayStationClient(){
    $client = new Client();
    $client->loginWithNpsso('Z05VaSabBl8a1SPVNUeoK4XAqKYTp0TNr65LVti27DX8sNzOvMTU0wZlnPx698CG');
    return $client;
}

function getAccountIdByUsername($username){
    $client = getPlayStationClient();
    $query = $client->users()->search($username);
    $users = $query->cache;
    foreach($users as $user){
        if($user->socialMetadata->onlineId == $username){
            return $user->socialMetadata->accountId;
        }
        else{
            return "";
        }
    }
}

echo(getAccountIdByUsername('tustin255444'));





?>