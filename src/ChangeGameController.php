<?php 

require_once "IController.php";
require_once "GameModel.php";

class ChangeGameController implements IController{
    public static function execute($path, $params, $data = []){
        $id = explode('/', $path)[2];
        echo GameModel::changeGameData($id, $data);
    } 
}