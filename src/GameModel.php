<?php
require 'vendor/autoload.php';

class GameModel{
    private static $dbAddress = 'mongodb://192.168.1.102:32771';

    public static function addGame($data){
        $client = new MongoDB\Client(GameModel::$dbAddress);
        $collection = $client->test_db->games;
        
        $filter=[];
        $options = ['sort' => ['id' => -1]]; // -1 is for DESC
        $id = $collection->findOne($filter, $options)->id;
        $id++;
        
        $result = $collection->insertOne( [ 'id' => $id, 'name' => $data->name ] );
        return $id;
    }

    public static function changeGameData($id, $data){
        $client = new MongoDB\Client(GameModel::$dbAddress);
        $collection = $client->test_db->games;

        $game = $collection->findOne(array('id' => (int)$id));
        if (!is_null($game)){
            $game = $collection->updateOne(
                [ 'id' => $id ],
                [ '$set' => [ 'name' => $data->name] ]
            );
            return 'Done.';
        }
        else{
            return "Game not found.";
        }
    }

    public static function getGame($id){
        $client = new MongoDB\Client(GameModel::$dbAddress);
        $collection = $client->test_db->games;
        $game = $collection->findOne(['id' => (int)$id]);
        if (!is_null($game)){
            return $game->name;
        }
        else{
            return "Game not found.";
        }
    }
}