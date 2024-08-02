<?php
class User
{
    private $username;
    private $password;

    // بيانات تسجيل الدخول الافتراضية
    private $validUsername = "admin";
    private $validPassword = "adminpass";

    // الدالة البانية لإنشاء كائن مستخدم جديد
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    // التحقق من صحة بيانات المستخدم
    public function authenticate()
    {
        return $this->username === $this->validUsername && $this->password === $this->validPassword;
    }

    // جلب اسم المستخدم
    public function getUsername()
    {
        return $this->username;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furni - الصفحة الرئيسية</title>
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
        <section class="hero">
            <div class="hero-content">
                <h1>Modern Interior<br>Design Studio</h1>
                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
                <div class="buttons">
                    <a href="#" class="btn btn-primary">Shop Now</a>
                    <a href="#" class="btn btn-secondary">Explore</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="https://via.placeholder.com/800x400" alt="Sofa">
            </div>
        </section>
    </main>
</body>

</html>