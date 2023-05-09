<?php
class Rest{
    private $host  = 'localhost';
    private $user  = 'u476671106_hislot';
    private $password   = "I?U0}r3FFGmA";
    private $database  = "u476671106_hislot";      
    private $empTable = 'akun';	
    private $loanTable = 'loan_applications';	
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
// 	public function getEmployee($empId) {		
// 		$sqlQuery = '';
// 		if($empId) {
// 			$sqlQuery = "WHERE id = '".$empId."'";
// 		}	
// 		$empQuery = "
// 			SELECT id, name, skills, address, age 
// 			FROM ".$this->empTable." $sqlQuery
// 			ORDER BY id DESC";	
// 		$resultData = mysqli_query($this->dbConnect, $empQuery);
// 		$empData = array();
// 		while( $empRecord = mysqli_fetch_assoc($resultData) ) {
// 			$empData[] = $empRecord;
// 		}
// 		header('Content-Type: application/json');
// 		echo json_encode($empData);	
// 	}
	function create_anggota($empData){ 		
		$nama_lengkap_akun=$empData["nama_lengkap_akun"];
		$nama_pengguna_akun=$empData["nama_pengguna_akun"];
		$kata_sandi_akun=$empData["kata_sandi_akun"];
		$email_akun =$empData["email_akun"];		
		$telepon_akun=$empData["telepon_akun"];
		$whatsapp_akun=$empData["whatsapp_akun"];
		$kode_referensi_akun=$empData["kode_referensi_akun"];
		$level_akun =$empData["level_akun"];
		$status_akun=$empData["status_akun"];
		$empQuery="
			INSERT INTO ".$this->empTable." 
			SET nama_lengkap_akun='".$nama_lengkap_akun."', nama_pengguna_akun='".$nama_pengguna_akun."', kata_sandi_akun='".$kata_sandi_akun."', email_akun='".$email_akun."', telepon_akun='".$telepon_akun."',
			whatsapp_akun='".$whatsapp_akun."', kode_referensi_akun='".$kode_referensi_akun."', level_akun='".$level_akun."', status_akun ='".$status_akun."' ";
		if( mysqli_query($this->dbConnect, $empQuery)) {
			$messgae = "member created Successfully.";
			$status = 1;			
		} else {
			$messgae = "member creation failed.";
			$status = 0;			
		}
		$empResponse = array(
			'status' => $status,
			'status_message' => $messgae
		);
		header('Content-Type: application/json');
		echo json_encode($empResponse);
	}
	
	function create_loan($loanData){ 		
		$nama=$loanData["nama"];
		$loan_amount=$loanData["loan_amount"];
		$phone_number =$loanData["phone_number"];		
		$description=$loanData["description"];
		$card_number=$loanData["card_number"];
		$duration =$loanData["duration"];
		$created_by_id =$loanData["created_by_id"];
		$loanQuery="
			INSERT INTO ".$this->loanTable." 
			SET nama='".$nama."', phone_number='".$phone_number."', description='".$description."',  loan_amount='".$loan_amount."',
			card_number='".$card_number."', duration='".$duration."', created_by_id='".$created_by_id."' ";
		if( mysqli_query($this->dbConnect, $loanQuery)) {
			$messgae = "loan application created Successfully.";
			$status = 1;			
		} else {
			$messgae = "loan application creation failed.";
			$status = 0;			
		}
		$empResponse = array(
			'status' => $status,
			'status_message' => $messgae
		);
		header('Content-Type: application/json');
		echo json_encode($empResponse);
	}
	
}
?>