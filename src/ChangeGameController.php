<?php 

require_once "IController.php";
require_once "GameModel.php";

class ChangeGameController implements IController{
    public static function execute($path, $params, $data = []){
        $id = explode('/', $path)[2];
        $data->id = $id;
        $res = GameModel::changeGameData($data);

        header('Content-Type: application/json');
        if ($res){
            http_response_code(202);
            echo json_encode($res);
        }
        else{
            http_response_code(404);
            echo json_encode([
                "ERROR" => 'Game not found.'
            ]);
        }
    } 
}