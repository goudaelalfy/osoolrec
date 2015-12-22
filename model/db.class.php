<?php

class db{

	private $connection;
	
	private $query;
	
	private $result;
	 
	public function connect()
	{
		//connection parameters
		$host = 'localhost';
		$user = 'root';
		$password = '';
		$database = 'osoolrec';
	
		//your implementation may require these...
		$port = NULL;
		$socket = NULL;	
		
		//create new mysqli connection
		$this->connection = new mysqli
		(
			$host , $user , $password , $database , $port , $socket
		);
		
		return TRUE;
	}


	public function disconnect()
	{
		//clean up connection!
		$this->connection->close();	
		
		return TRUE;
	}
	

	public function escape($data)
	{
		return $this->connection->real_escape_string($data);
	}
	

	public function query($query)
	{
		//By Gouda.
		$this->connection->query("SET NAMES 'utf8'");
		
		if ($this->result = $this->connection->query($query))
		{
			return TRUE;
		}
		
		return FALSE;		
	}
	
	
	public function fetch($type = 'object')
	{
		if (isset($this->result))
		{
			switch ($type)
			{
				case 'array':
				
					//fetch a row as array
					$row = $this->result->fetch_array();
				
				break;
				
				case 'object':
				
				//fall through...
				
				default:
					
					//fetch a row as object
					$row = $this->result->fetch_object();	
						
				break;
			}
			
			return $row;
		}
		
		return FALSE;
	}
	
    public function fetch_all()
	{
		if (isset($this->result))
		{
			//$rows = $this->result->fetch_all();
			//return $rows;
			
			$array = array();
			while($row = $this->result->fetch_array())
			    $array[] = $row;
			return $array;
		}
		return FALSE;
	}

} 

?>
