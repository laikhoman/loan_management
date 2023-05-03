<?php
class Database{
	
	private $host  = 'localhost';
    private $user  = 'ashoxvoy_hislot';
    private $password   = "I?U0}r3FFGmA";
    private $database  = "ashoxvoy_hislot"; 
    
    public function getConnection(){		
		$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $conn;
		}
    }
}
?>