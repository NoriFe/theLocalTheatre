 <?php
require_once 'db.class.php';
require_once 'BaseCRUD.php';

class UsersCRUD extends BaseCRUD {
    public function __construct($db) {
        parent::__construct($db, "users");
    }

    //create user with hashed password
    public function createUser($username, $email, $password, $role = 'member') {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        return $this->create(
            ["username", "email", "password_hash", "role"],
            [$username, $email, $hashed, $role],
            "ssss"
        );
    }

    //get user by email
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // promote/demote user
    public function setRole($id, $role) {
        return $this->update($id, ["role"], [$role], "s");
    }

    // Custom: ban user (requires status column)
    public function setStatus($id, $status) {
        return $this->update($id, ["status"], [$status], "s");
    }
}
?>
