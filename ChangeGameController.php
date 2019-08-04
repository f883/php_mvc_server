<?php 

require_once "IController.php";

class ChangeGameController implements IController{
    public static function execute($path, $params, $data = []){
        echo "ChangeGameController dispatched.\n";
    } 
}