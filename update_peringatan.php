<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pesan = trim($_POST['pesan']);
    if ($pesan !== '') {
        $conn->query("UPDATE peringatan SET isi_pesan='$pesan' WHERE id=1");
    }
}

header("Location: dashboard_admin.php?page=peringatan");
exit;
?>
