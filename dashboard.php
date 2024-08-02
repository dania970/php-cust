<?php
session_start();

// التحقق من تسجيل الدخول
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furni - لوحة التحكم</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #1d3b37;
            color: #ffffff;
        }

        header {
            background-color: #1d3b37;
            padding: 10px 50px;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #f2c33a;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #c7d4d0;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #f2c33a;
        }

        .icons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-icon::before,
        .cart-icon::before {
            content: '';
            display: inline-block;
            width: 20px;
            height: 20px;
            background-size: cover;
        }

        .user-icon::before {
            background-image: url('https://via.placeholder.com/20x20?text=U');
        }

        .cart-icon::before {
            background-image: url('https://via.placeholder.com/20x20?text=C');
        }

        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px;
            background-color: #24443f;
            height: calc(100vh - 80px);
        }

        .hero-content {
            max-width: 500px;
        }

        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .hero-content p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-primary {
            background-color: #f2c33a;
            color: #1d3b37;
        }

        .btn-primary:hover {
            background-color: #e6b82e;
        }

        .btn-secondary {
            background-color: transparent;
            color: #f2c33a;
            border: 2px solid #f2c33a;
        }

        .btn-secondary:hover {
            background-color: #f2c33a;
            color: #1d3b37;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
        }

        .login-section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 100px);
        }

        .login-container {
            background-color: #2b4d45;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #ffffff;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #c7d4d0;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .dashboard {
            text-align: center;
            color: #ffffff;
            padding: 50px 0;
        }

        .dashboard h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .dashboard p {
            font-size: 18px;
        }

        .dashboard .btn {
            display: inline-block;
            margin-top: 20px;
        }
    </style>
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
                <a href="logout.php"><i class="user-icon"></i></a>
                <a href="#"><i class="cart-icon"></i></a>
            </div>
        </nav>
    </header>

    <main>
        <section class="dashboard">
            <h1>مرحبا بك،
                <?php echo $_SESSION['username']; ?>!
            </h1>
            <p>لقد سجلت الدخول بنجاح إلى لوحة التحكم الخاصة بك.</p>
            <a href="logout.php" class="btn btn-secondary">تسجيل الخروج</a>
        </section>
    </main>
</body>

</html>