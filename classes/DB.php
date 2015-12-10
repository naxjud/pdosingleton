<?php

/**
* 	
*/
class DB
{
	private $_mysqli,
			$_query,
			$_results=array(),
			$_count =0;
	public static $instance;

	public static function getInstance()
	{
		if(!isset(self::$instance)){
			self::$instance = new DB();
		}
		return self::$instance;
		# code...
	}

	public function __construct(){
		$this->_mysqli = new mysqli('localhost','root','simsim', 'Login');
		if($this->_mysqli->connect_error){
			die($this->_mysqli->connect_error);
		}
	}

	public function query($sql){
		if($this->_query = $this->_mysqli->query($sql)){
			while($row=$this->_query->fetch_object()){
				$this->_results[] = $row;
			}
			//num_rows Gets (in mysqli) the number of rows in a result
			$this->_count = $this->_query->num_rows;
		}
		return $this;
	}

	public function results(){
		return $this->_results;
	}
	
	public function count(){
		return $this->_count;
	}
}