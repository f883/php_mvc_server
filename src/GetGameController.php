<?php

require_once "IController.php";

class GetGameController implements IController
{
    private $model;
    
    public function __construct($model){
        $this->model = $model;
    }

    public function execute($path, $params, $data = [])
    {
        $id = explode('/', $path)[2];
        $res = $this->model->getGame($id);

        header('Content-Type: application/json');

        if ($res) {http_response_code(200);
            echo json_encode($res);
        } else {
            http_response_code(404);
            echo json_encode([
                "ERROR" => 'Game not found.',
            ]);
        }
    }
}
