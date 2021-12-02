<?php 
    require ('vendor/autoload.php');

    if(!isset($argv[1])){
        echo "Please provide an adress";
        exit;
    }

    $param = $argv[1];

    $client = new \GuzzleHttp\Client(['verify'=> false]);
    $response = $client->request('GET', 'https://api-adresse.data.gouv.fr/search/', [
        'query' => ['q' => $param]
    ]);

    echo $response->getStatusCode()."\n";
    $data = json_decode($response->getBody(), true);

    foreach($data['features'] as $addr){

        echo sprintf(
            '%s(Lat: %s, Lng: %s) - %s',
            $addr['properties']['label'],
            $addr['properties']['x'],
            $addr['properties']['y'],
            $addr['properties']['score'],
        ), PHP_EOL;
    }
?>