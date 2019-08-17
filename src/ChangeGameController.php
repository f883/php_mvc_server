<?php 

require_once "IController.php";



class ChangeGameController implements IController{
    private $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function execute($path, $params, $data = []){
        $id = explode('/', $path)[2];
        $data['id'] = $id;
        $res = $this->model->changeGameData($data);

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