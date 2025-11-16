<?php
include 'koneksi.php'; 
session_start();

if (isset($_SESSION['is_admin_login']) && $_SESSION['is_admin_login'] === true) {
    header('Location: dashboard_admin.php'); 
    exit;
}

$error = '';

if (isset($_POST['login_submit'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    if (empty($email) || empty($password)) {
        $error = "Email dan password harus diisi.";
    } else {
        $stmt = $conn->prepare("SELECT id, email, password, nama FROM admin_users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if ($password === $user['password']) {
                $_SESSION['is_admin_login'] = true;
                $_SESSION['admin_id'] = $user['id'];
                $_SESSION['admin_email'] = $user['email'];
                $_SESSION['admin_nama'] = $user['nama'];
                header('Location: dashboard_admin.php'); 
                exit;
            } else {
                $error = "Password salah.";
            }
        } else {
            $error = "Tidak terdaftar sebagai Admin.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles_css/login.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Login Admin LavaLink</title>
</head>

<body>
    <div class="container">
        <div class="login">
            <h1 style="font-size: 21px;"><b>ᨒ Login Admin LavaLink</b></h1>
            
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form action="" method="POST">
                <div class="input-box">
                    <input type="email" placeholder="Email" name="email" required>
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="password" required>
                    <i class="fa fa-lock"></i>
                </div>
                <button type="submit" name="login_submit" style="padding-right: 50px">LOGIN</button>
                <div class="links">
                    <a href="index.php">Kembali ke Halaman Utama</a> </div>
            </form>
        </div>
    </div>
</body>
</html>