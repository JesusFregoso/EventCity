<?php

abstract class BaseRepo{

    protected $model;

    function __construct() {
        $this->model = $this->getModel();
    }

    abstract public function getModel();

    function find($id){
        $mysql = new DBMannager();
        $mysql->connect();

        $query="SELECT * FROM ".$this->model->table." WHERE id=?";
        $mysql->execute($query,array($id));

        if($mysql->count() < 1){
            return NULL;
        }

        $result = $mysql->getArray();
        $modelResult = $this->arrayModel($result);
        return array_shift($modelResult);
    }
    

    function getList($key, $name){
        $mysql = new DBMannager();
        $mysql->connect();

        $query="SELECT $key,$name FROM ".$this->model->table."";
        $mysql->execute($query);

        if($mysql->count() < 1){
            return NULL;
        }

        $result = $mysql->getArray();        

        $arrayResult = array();
        foreach($result as $row){
            $arrayResult[$row[$key]] = $row[$name];
        }

        return $arrayResult;        
    }

    function arrayModel($sqldata){    
        $array = array();
        $model = $this->model;
        for($i = 0; $i < count($sqldata); $i++){
            $obj = new $model($sqldata[$i]);
            $obj->isNew = false;
            array_push($array, $obj);                        
        }
        return $array;
    }

}