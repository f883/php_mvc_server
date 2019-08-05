<?php

require 'vendor/autoload.php';

//$dbAddress = 'mongodb://192.168.1.102:32771';
$dbAddress = 'mongodb://192.168.101.160:32768';

// $client = new MongoDB\Client($dbAddress);
// $collection = $client->test_db->games;
// //$result = $collection->insertOne( [ 'id' => 3, 'name' => 'afghgdfsa' ] );
// //echo "Идентификатор вставленного документа '{$result->getInsertedId()}' \n";
// //$result = $collection->findOne(array('_id' => '5d4721c9e65c83188d799812'));

// $cursor = $collection->findOne(array('id' => 2));
// var_dump($cursor);


$client = new MongoDB\Client($dbAddress);
$collection = $client->test_db->games;
//$id = $collection->find();
//var_dump($id);


// $filter=[];
// $options = ['sort' => ['id' => -1]]; // -1 is for DESC
// $result = $collection->findOne($filter, $options);
// var_dump($result->id);


// $client = new MongoDB\Client(GameModel::$dbAddress);
// $collection = $client->test_db->games;

$game = $collection->findOne(array('id' => 20));

var_dump($game);

$game = $collection->updateOne(
    [ 'id' => 20 ],
    [ '$set' => [ 
//        'id' => 20,
        'name' => 'tessssss'
        ] 
    ]
);

$game = $collection->findOne(array('id' => 20));

var_dump($game);



// $result = $collection->insertOne( [ 'id' => 1, 'name' => $data->name ] );
// return $id;
// foreach ($cursor as $doc) {
//     var_dump($doc);
// }