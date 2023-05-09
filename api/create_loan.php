<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../Database.php';
include_once '../class/Loan.php';
include('../class/Rest.php');
 
$database = new Database();
$db = $database->getConnection();
 
$items = new Loan($db);
 
// $data = json_decode(file_get_contents("php://input"));

// if(!empty($data->nama_lengkap_akun)){    
    
//     $items->nama_lengkap_akun = $data->nama_lengkap_akun;
// 		$items->nama_pengguna_akun = $data->nama_pengguna_akun;
// 		$items->kata_sandi_akun = $data->kata_sandi_akun;
// 		$items->email_akun = $data->email_akun;
// 		$items->telepon_akun = $data->telepon_akun;
// 		$items->whatsapp_akun = $data->whatsapp_akun;
// 		$items->kode_referensi_akun = $data->kode_referensi_akun;
// 		$items->level_akun = $data->level_akun;
// 		$items->status_akun = $data->status_akun;
    
//     if($items->create_anggota()){         
//         http_response_code(201);         
//         echo json_encode(array("message" => "Item was created."));
//     } else{         
//         http_response_code(503);        
//         echo json_encode(array("message" => "Unable to create item."));
//     }
// }else{    
//     http_response_code(400);    
//     echo json_encode(array("message" => "Unable to create item. Data is incomplete."));
// }

$requestMethod = $_SERVER["REQUEST_METHOD"];
$api = new Rest();
switch($requestMethod) {
	case 'POST':	
		$api->create_loan($_POST);
		break;
	default:
	header("HTTP/1.0 405 Method Not Allowed");
	break;
}

?>
