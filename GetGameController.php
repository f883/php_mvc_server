<?php 

require_once "IController.php";

class GetGameController implements IController{
    public static function execute($path, $params, $data = []){
        echo "GetGameController dispatched.\n";
    } 
}