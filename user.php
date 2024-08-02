<?php
class User
{
    private $conn;
    private $table = 'users';

    public $name;
    public $email;
    public $password;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . ' (user_name, email, password) VALUES (?, ?, ?)';

        $stmt = $this->conn->prepare($query);

        if (!$stmt) {
            printf("Error: %s.\n", $this->conn->error);
            return false;
        }

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt->bind_param('sss', $this->name, $this->email, $this->password);

        if ($stmt->execute()) {
            return true;
        }

        printf("Error: %s.\n", $stmt->error);

        return false;
    }
}
