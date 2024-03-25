<?php 
require_once("./config/db.class.php");

class User {
    public $id;
    public $username;
    public $fullname;
    public $email;
    public $role;

    public function __construct($id, $username, $fullname, $email, $role) {
        $this->id = $id;
        $this->username = $username;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->role = $role;
    }
}

// Sample login functionality
// Sample login functionality
function login($username, $password) {
    // Connect to your database
    $db = new DB();
    $conn = $db->connect();

    // Perform query to get user data based on username and password
    $query = "SELECT id, username, fullname, email, role FROM user WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password); // Assuming the password is stored in plain text in the database
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Create a new User object
        $user = new User($row['id'], $row['username'], $row['fullname'], $row['email'], $row['role']);
        
        // Start a session and store user information
        session_start();
        $_SESSION['user'] = $user;

        return true; // Login successful
    }

    return false; // Login failed
}


?>
