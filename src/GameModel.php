<?php
require 'vendor/autoload.php';

class GameModel
{
    private $dbAddress = 'mongodb://192.168.1.103:32768';

    public function addGame($data)
    {
        $client = new MongoDB\Client($this->dbAddress);
        $collection = $client->test_db->games;

        $filter = [];
        $options = ['sort' => ['id' => -1]]; // -1 is for DESC
        $id = $collection->findOne($filter, $options)->id;
        $id++;

        $result = $collection->insertOne(
            ['id' => $id, 'name' => $data['name']]
        );
        return $id;
    }

    public function changeGameData($data)
    {
        $client = new MongoDB\Client($this->dbAddress);
        $collection = $client->test_db->games;
        $id = (int) $data['id'];
        $game = $collection->findOne(array('id' => $id));
        if (!is_null($game)) {
            $game = $collection->updateOne(
                ['id' => $id],
                ['$set' => [
                    'name' => $data['name'],
                ],
                ]
            );
            $game = $collection->findOne(array('id' => $id));
            unset($game['_id']); // удаляем метку mongodb
            return $game;
        } else {
            return null;
        }
    }

    public function getGame($id)
    {
        $client = new MongoDB\Client($this->dbAddress);
        $collection = $client->test_db->games;
        $game = $collection->findOne(['id' => (int) $id]);
        if (!is_null($game)) {
            unset($game['_id']); // удаляем метку mongodb
            return $game;
        } else {
            return null;
        }
    }

    public function deleteGame($id)
    {
        $client = new MongoDB\Client($this->dbAddress);
        $collection = $client->test_db->games;
        $game = $collection->findOne(['id' => (int) $id]);

        if (!is_null($game)) {
            $collection->deleteOne(['id' => (int) $id]);
            unset($game['_id']); // удаляем метку mongodb
            return $game;
        } else {
            return null;
        }
    }
}
