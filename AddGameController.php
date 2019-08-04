<?php 

require_once "IController.php";

class AddGameController implements IController{
    public static function execute($path, $params, $data = []){
        echo "AddGameController dispatched.\n";
    } 
}