<?php
// api.php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'GET':
        getData();
        break;
    case 'POST':
        addData();
        break;
    default:
        http_response_code(405);
        echo json_encode(array("message" => "Method not allowed"));
}

function getData() {
    $type = $_GET['type'] ?? '';
    $db = new Database();
    $conn = $db->getConnection();
    
    switch($type) {
        case 'gunung_api':
            $query = "SELECT * FROM gunung_api ORDER BY status DESC, nama ASC";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            break;
            
        case 'pengumuman':
            $query = "SELECT * FROM pengumuman ORDER BY tanggal DESC LIMIT 10";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            break;
            
        case 'aktivitas':
            $gunung_id = $_GET['gunung_id'] ?? '';
            $query = "SELECT a.*, g.nama as gunung_name FROM aktivitas a 
                     LEFT JOIN gunung_api g ON a.gunung_api_id = g.id 
                     WHERE a.gunung_api_id = ? ORDER BY a.tanggal DESC LIMIT 10";
            $stmt = $conn->prepare($query);
            $stmt->execute([$gunung_id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            break;
            
        default:
            echo json_encode(array("message" => "Invalid type parameter"));
    }
}

function addData() {
    $data = json_decode(file_get_contents("php://input"));
    $type = $_GET['type'] ?? '';
    
    $db = new Database();
    $conn = $db->getConnection();
    
    switch($type) {
        case 'aktivitas':
            $query = "INSERT INTO aktivitas (gunung_api_id, tipe_aktivitas, deskripsi) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            if($stmt->execute([$data->gunung_api_id, $data->tipe_aktivitas, $data->deskripsi])) {
                echo json_encode(array("message" => "Aktivitas berhasil ditambahkan"));
            }
            break;
            
        default:
            echo json_encode(array("message" => "Invalid type parameter"));
    }
}
?>