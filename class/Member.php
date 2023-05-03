<?php
class Member{   
    
    private $itemsTable = "akun";      
    public $id_akun;
    public $nama_lengkap_akun;
    public $nama_pengguna_akun;
    public $kata_sandi_akun;
    public $email_akun;
    public $telepon_akun;
    public $whatsapp_akun;   
    public $kode_referensi_akun; 
	public $level_akun; 
    private $status_akun;
	
    public function __construct($db){
        $this->conn = $db;
    }	
	
// 	function read(){	
// 		if($this->id) {
// 			$stmt = $this->conn->prepare("SELECT * FROM ".$this->itemsTable." WHERE id = ?");
// 			$stmt->bind_param("i", $this->id);					
// 		} else {
// 			$stmt = $this->conn->prepare("SELECT * FROM ".$this->itemsTable);		
// 		}		
// 		$stmt->execute();			
// 		$result = $stmt->get_result();		
// 		return $result;	
// 	}
	
	function create_anggota(){
		
		$stmt = $this->conn->prepare("
			INSERT INTO ".$this->itemsTable."(`nama_lengkap_akun`, `nama_pengguna_akun`, `kata_sandi_akun`, `email_akun`, `telepon_akun`, `whatsapp_akun`, `kode_referensi_akun`, `level_akun`, `status_akun`)
			VALUES(?,?,?,?,?,?,?,?,?)");
		
		$this->nama_lengkap_akun = $this->nama_lengkap_akun;
		$this->nama_pengguna_akun = $this->nama_pengguna_akun;
		$this->kata_sandi_akun = $this->kata_sandi_akun;
		$this->email_akun = $this->email_akun;
		$this->telepon_akun = $this->telepon_akun;
		$this->whatsapp_akun = $this->whatsapp_akun;
		$this->kode_referensi_akun = $this->kode_referensi_akun;
		$this->level_akun = $this->level_akun;
		$this->status_akun = $this->status_akun;
		
		
// 		$stmt->bind_param("ssiis", $this->name, $this->description, $this->price, $this->category_id, $this->created);
		
		if($stmt->execute()){
			return true;
		}
	 
		return false;		 
	}
}
?>