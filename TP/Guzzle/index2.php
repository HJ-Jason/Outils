<?php 
    require ('vendor/autoload.php');

    $client = new \GuzzleHttp\Client(['verify'=> false]);
    $response = $client->request('GET', 'https://api-adresse.data.gouv.fr/search/?q=8+bd+du+port');

    //echo $res->getStatusCode();// "200"
    //echo $res->getHeader('content-type');// 'application/json; charset=utf8'
    //echo $res->getBody();// {"type":"User"...'

    $response = $response->getStatusCode();
    $responseAsArray = json_decode($response);
    
    var_dump($responseAsArray);
?>