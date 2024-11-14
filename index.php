<?php

require_once 'vendor/autoload.php';

use Tustin\PlayStation\Client;

$client = new Client();

$client->loginWithNpsso('Z05VaSabBl8a1SPVNUeoK4XAqKYTp0TNr65LVti27DX8sNzOvMTU0wZlnPx698CG');

$refreshToken = $client->getRefreshToken()->getToken();

$user = $client->users()->me();


$titles = $user->trophyTitles();


foreach ($titles as $title) {
    echo $title->name() . "<br><br>";
}

?>