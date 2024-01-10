<?php
class Users
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "registration";
    public $con;

    // Database Connection 
    public function __construct()
    {
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($this->con->connect_error) {
            trigger_error("Failed to connect to MySQL: " . $this->con->connect_error);
        }
    }

    // Insert customer data into users table
    public function insertData($post)
    {
        $userName = $this->con->real_escape_string($_POST['userName']);
        $address = $this->con->real_escape_string($_POST['address']);
        $nic = $this->con->real_escape_string($_POST['nic']);
        $email = $this->con->real_escape_string($_POST['email']);
        $password = $this->con->real_escape_string(md5($_POST['password']));

        $query = "INSERT INTO users (userName, address, nic, email, password) VALUES ('$userName', '$address', '$nic', '$email', '$password')";
        $sql = $this->con->query($query);

        if ($sql == true) {
            header("Location: index.php?msg1=insert");
        } else {
            echo "Registration failed, try again!";
        }
    }

    // Fetch users records for show listing
public function displayData()
{
    $query = "SELECT * FROM users";
    $result = $this->con->query($query);

    if ($result === false) {
        die("Error executing the query: " . $this->con->error);
    }

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}


    // Fetch single data for edit from users table
    public function displayRecordById($id)
    {
        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = $this->con->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "Record not found";
        }
    }

    // Update user data in the users table
    public function updateRecord($postData)
    {
        $userName = $this->con->real_escape_string($_POST['userName']);
        $address = $this->con->real_escape_string($_POST['address']);
        $nic = $this->con->real_escape_string($_POST['nic']);
        $email = $this->con->real_escape_string($_POST['email']);
        $password = $this->con->real_escape_string(md5($_POST['password']));
        $id = $this->con->real_escape_string($_POST['id']);

        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE users SET userName = '$userName', address = '$address', nic = '$nic', email = '$email', password = '$password' WHERE id = '$id'";
            $sql = $this->con->query($query);

            if ($sql == true) {
                header("Location: index.php?msg2=update");
            } else {
                echo "Update failed, try again!";
            }
        }
    }

    // Delete user data from users table
    public function deleteRecord($id)
    {
        $query = "DELETE FROM users WHERE id = '$id'";
        $sql = $this->con->query($query);

        if ($sql == true) {
            header("Location: index.php?msg3=delete");
        } else {
            echo "Record does not delete, try again";
        }
    }
}
?>
