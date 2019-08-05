<?php 

require_once "IController.php";
require_once "GameModel.php";

class GetGameController implements IController{
    public static function execute($path, $params, $data = []){
        $id = explode('/', $path)[2];
        // error_log($id);
        echo GameModel::getGame($id);
    } 
}