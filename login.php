<?php
session_start();
require_once 'User.php';

// التحقق من إرسال بيانات النموذج
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // إنشاء كائن مستخدم جديد
    $user = new User($username, $password);

    // التحقق من صحة بيانات المستخدم
    if ($user->authenticate()) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user->getUsername();
        header('Location: dashboard.php');
        exit();
    } else {
        echo "<script>alert('اسم المستخدم أو كلمة المرور غير صحيحة'); window.location.href = 'login.php';</script>";
    }
} else {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furni - تسجيل الدخول</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo">Furni.</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
            <div class="icons">
                <a href="login.php"><i class="user-icon"></i></a>
                <a href="#"><i class="cart-icon"></i></a>
            </div>
        </nav>
    </header>

    <main>
        <section class="login-section">
            <div class="login-container">
                <h2>تسجيل الدخول</h2>
                <form action="authenticate.php" method="post">
                    <div class="input-group">
                        <label for="username">اسم المستخدم:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="input-group">
                        <label for="password">كلمة المرور:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">دخول</button>
                </form>
            </div>
        </section>
    </main>
</body>

</html>