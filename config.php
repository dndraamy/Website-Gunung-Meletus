<?php
// config.php
class Database {
    private $host = "localhost";
    private $db_name = "sistem_gunung_api";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

function getStatusColor($status) {
    switch($status) {
        case 'Normal': return '#4CAF50';
        case 'Waspada': return '#FFC107';
        case 'Siaga': return '#FF9800';
        case 'Awas': return '#F44336';
        default: return '#9E9E9E';
    }
}
?>