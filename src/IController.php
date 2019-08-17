<?php 

interface IController{
    public function execute($path, $params, $data = []); 
    public function __construct($model);
}
