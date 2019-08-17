<?php 

require_once "IController.php";

class AddGameController implements IController{
    private $model;
    
    public function __construct($model){
        $this->model = $model;
    }
    
    public function execute($path, $params, $data = []){
        $id = $this->model->addGame($data);
        header('Content-Type: application/json');
        http_response_code(201);
        echo json_encode([
            "id" => $id
        ]);
    } 
}