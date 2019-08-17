<?php 

require_once "GameModel.php";
require_once "src/GetGameController.php";
require_once "src/ChangeGameController.php";
require_once "src/AddGameController.php";
require_once "src/DeleteGameController.php";


class Storage{
    public $data;

    public function __construct(){
        $model = new GameModel();
        $this->data = [
            'GetGameController' => new GetGameController($model),
            'ChangeGameController' => new ChangeGameController($model),
            'AddGameController' => new AddGameController($model),
            'DeleteGameController' => new DeleteGameController($model),
        ];
    }
}