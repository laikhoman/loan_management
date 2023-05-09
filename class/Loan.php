<?php
class Loan{   
    
    private $itemsTable = "loan_applications";      
    public $id_akun;
    public $nama;
    public $loan_amount;
    public $phone_number;
    public $description;
    public $card_number;
    public $duration;   
    public $created_by_id; 
	
    public function __construct($db){
        $this->conn = $db;
    }	
	
	
	function create_loan(){
		
		$stmt = $this->conn->prepare("
			INSERT INTO ".$this->itemsTable."(`nama`, `loan_amount`, `phone_number`, `description`, `card_number`, `duration`, `created_by_id`)
			VALUES(?,?,?,?,?,?,?)");
		
		$this->nama = $this->nama;
		$this->loan_amount = $this->loan_amount;
		$this->phone_number = $this->phone_number;
		$this->description = $this->description;
		$this->card_number = $this->card_number;
		$this->duration = $this->duration;
		$this->created_by_id = $this->created_by_id;
		
		
// 		$stmt->bind_param("ssiis", $this->name, $this->description, $this->price, $this->category_id, $this->created);
		
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}
}
?>