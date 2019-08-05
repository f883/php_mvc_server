<?php 

require_once "IController.php";
require_once "GameModel.php";

class AddGameController implements IController{
    public static function execute($path, $params, $data = []){
        $id = GameModel::addGame($data);
        header('Content-Type: application/json');
        http_response_code(201);
        echo json_encode([
            "id" => $id
        ]);
    } 
}