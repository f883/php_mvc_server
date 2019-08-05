<?php 

require_once "IController.php";
require_once "GameModel.php";

class AddGameController implements IController{
    public static function execute($path, $params, $data = []){
        // $datae = [
        //     'name' => 'hl 228'
        // ];
        // var_dump($data);
        echo GameModel::addGame($data);
    } 
}