<?php

/**
* 	
*/
class DB
{
	private $_pdoDBH,
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
		$this->_pdoDBH = new PDO("mysql:host=localhost;dbname=login", 'root', 'simsim');

		try {
		// assign PDO object to db variable
			$this->_pdoDBH  = new PDO( 'mysql:host=localhost;dbname=login', 'root', 'simsim' );
			$this->_pdoDBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}
		catch (PDOException $e) {
		//Output error - would normally log this to error file rather than output to user.
			echo "Connection Error: " . $e->getMessage();
		}
	}

	public function query($sql){
		if($this->_query = $this->_pdoDBH->query($sql)){
			while($row=$this->_query->fetchObject()){
				$this->_results[] = $row;
			}
			//num_rows Gets (in PDO) the number of rows in a result
			$this->_count = $this->_query->rowCount();
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