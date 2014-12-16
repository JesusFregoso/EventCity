<?php

class BaseModel{

	public $table;
	protected $fields;
	protected $custom_fields=array();
	public $isNew=true;
	public $data = array();
	public $errors;

    function __construct($data=NULL) {        
        if($data){
            $this->setData($data);
        }
	}

	public function setData($data){

		$data = $this->prepareData($data);

		foreach($data as $key => $value){
			if($key == "id" || array_key_exists($key, $this->fields) || in_array($key, $this->custom_fields)){
				//$this->data[$key] = $value;
				$this->$key = $value;
			}
		}
	}

	public function prepareData($data){
		return $data;
	}

	public function isValid(){
		$this->errors = array();
		foreach($this->fields as $key=>$value){			
			//if($value == 'required' && empty($this->data[$key])){
			if($value == 'required' && empty($this->$key)){
				array_push($this->errors, 'El campo '.$key.' es requerido.');
			}
		}
		if(count($this->errors) > 0){
			return false;
		}else{
			return true;	
		}
	}

	public function save(){
		if($this->isValid()){
			if($this->isNew){
				$this->insert();	
			}else{
				$this->update();
			}			
			return true;
		}else{
			return false;
		}
	}

	public function insert(){		

		$mysql = new DBMannager();
		$mysql->connect();		


		$query_fields = implode(",",array_keys($this->fields));

		$array_values = array();
		$query_values = array();
		foreach($this->fields as $key=>$value){			
			//array_push($array_values, $this->data[$key]);
			array_push($array_values, $this->$key);
			array_push($query_values, '?');
		}		
		
		$query_values = implode(",",$query_values);			
		$query="INSERT INTO ".$this->table." (".$query_fields.") VALUES (".$query_values.")";
		$mysql->execute($query,$array_values);

	}

	public function update(){		

		$mysql = new DBMannager();
		$mysql->connect();		

		$query_fields = implode(",",array_keys($this->fields));

		$array_values = array();
		$query_values = array();
		foreach($this->fields as $key=>$value){			
			array_push($array_values, $this->$key);
			array_push($query_values, $key.'=?');
		}		
		array_push($array_values, $this->id);

		$query_values = implode(",",$query_values);			
		$query="UPDATE ".$this->table." SET ".$query_values." WHERE id=?";
		$mysql->execute($query,$array_values);

	}	

	public function delete(){
		$mysql = new DBMannager();
		$mysql->connect();	

		$query="DELETE FROM ".$this->table." WHERE id=?";
		$mysql->execute($query,array($this->id));				
	}
	

}