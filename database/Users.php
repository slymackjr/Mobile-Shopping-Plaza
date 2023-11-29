<?php
include_once 'Shopping.php';
class Users extends Shopping
{
    //insert into product reviews table
    public function getUserSessionDetails($userId = null,$table = "users"): bool|array|null
    {
        $user = null;
        if ($this->db->con != null){
            if ($userId != null){
                try{
                    $stmt = $this->db->con->prepare("SELECT * FROM $table WHERE id=?");
                    $stmt->bind_param('i',$userId);
                    $stmt->execute();
                    $results = $stmt->get_result();
                    $user = $results->fetch_assoc();
                }
                catch(PDOException $e){
                    echo "There is some problem in connection: " . $e->getMessage();
                }
            }
        }
        return $user;
    }

    public function getUserVerification($login,$email,$password,$table = "users"): bool
    {
        $success = false;
        // sanitize to void malicious script to be processed in the database.
        $email = $this->sanitizeString($email);
        if ($this->db->con != null)
        {
            if (isset($login)) {
                try {
                    $stmt = $this->db->con->prepare("SELECT *,COUNT(*) AS numrows FROM $table WHERE email = ?");
                    $stmt->bind_param('s', $email); // Bind the parameter
                    $stmt->execute();

                    // Fetch the result as an associative array
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    if ($row['numrows'] > 0) {
                        if ($row['status']) {
                            if (password_verify($password, $row['password'])) {
                                if ($row['type']) {
                                    $_SESSION['admin'] = $row['id'];
                                    $_SESSION['adminUsername'] = $row['username'];
                                    $_SESSION['adminEmail'] = $row['email'];
                                    $_SESSION['log'] = $row['email'];
                                } else {
                                    $_SESSION['user'] = $row['id'];
                                    $_SESSION['username'] = $row['username'];
                                    $_SESSION['userEmail'] = $row['email'];
                                    $_SESSION['log'] = $row['email'];
                                }
                                $success = true;
                            } else {
                                $_SESSION['error'] = 'Incorrect Password';
                            }
                        } else {
                            $_SESSION['error'] = 'Account not activated.'.$row['numrows'];
                        }
                    } else {
                        $_SESSION['error'] = 'Email not found';
                    }
                } catch (Exception $e) {
                    echo "There is some problem in connection: " . $e->getMessage();
                }

            } else {
                $_SESSION['error'] = 'Input login credentials first';
            }
        }
            return $success;

    }

    // method for fetching all contact data in an array object
    private function getUserData($email) : array
    {
        // sanitize to void malicious script to be processed.
        $email = $this->sanitizeString($email);
        $result = $this->db->con->query("SELECT * FROM users WHERE email = $email");

        $resultArray = array();

        //fetch product data one by one
        while ($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    // return the inserted user id from the users table.
    public function getUserId($email) : int
    {
        // sanitize to void malicious script to be processed.
        $email = $this->sanitizeString($email);
        $userId = null;
        $userData = $this->getUserData($email);
        foreach ($userData as $userDatum):
            $userId = $userDatum['id'];
        endforeach;
        return $userId;
    }


// Include your DBController class or establish a database connection here

// Function to log user actions
function logUserAction($userId, $action, $actionType, $ipAddress): bool
{

    // Sanitize user input
    $userId = $this->db->con->real_escape_string($userId);
    $action = $this->db->con-> real_escape_string($action);
    $actionType = $this->db->con-> real_escape_string($actionType);
    $ipAddress =$this->db->con-> real_escape_string($ipAddress);

    // Get the current timestamp
    $timestamp = date('Y-m-d H:i:s');

    // Insert the log entry into the database
    $sql = "INSERT INTO user_logs (user_id, action, action_type, ip_address, timestamp) VALUES ('$userId', '$action', '$actionType', '$ipAddress', '$timestamp')";

    if ($this->db->con-> query($sql) === TRUE) {
        // Log entry successfully inserted
        return true;
    } else {
        // Log entry insertion failed, handle the error
        error_log("Error inserting user log: " . $this->db->con->error);
        return false;
    }
}

    public function registerUsers($register,$name,$username,$email,$terms,$password,$confirmPassword): bool
    {
        $message = false;
        if (isset($register)) {

            if ($password != $confirmPassword) {
                $_SESSION['error'] = 'Passwords did not match';
                header('location: ../register.php');
            } else {
                $stmt = $this->db->con->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
                $stmt->execute(['email' => $email]);

                // Fetch the result as an associative array
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                if ($row['numrows'] > 0) {
                    $_SESSION['error'] = 'Email already taken';
                    header('location: ../register.php');
                } else {
                    $now = date('Y-m-d');
                    $password = password_hash($password, PASSWORD_DEFAULT);

                    //generate code
                    $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $code = substr(str_shuffle($set), 0, 12);

                    $type = 0;

                        $stmt = $this->db->con->prepare("INSERT INTO users (email, password, name, username, activate_code, created_on,type) VALUES (?,?,?,?,?,?,?)");
                        $stmt->bind_param('ssssssi', $email, $password, $name, $username, $code, $now,$type);
                        if ($stmt->execute()) {
                            $message = true;
                            $_SESSION['error'] = "Registered Successfully!";
                            header('location: ../register.php');
                        }else{
                            $_SESSION['error'] = "Failed to Register! Please try again.";
                            header('location: ../register.php');
                        }
                }

            }

        } else {
            $_SESSION['error'] = 'Fill up signup form first';
            header('location: ../register.php');
        }
        return $message;
    }

    public function countAllProducts($table = "product")
    {
        $stmt = $this->db->con->prepare("SELECT *, COUNT(*) AS numrows FROM $table");
        $stmt->execute();
        // Fetch the result as an associative array
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row['numrows'];
    }

    public function countRegisteredUsers($table = 'users')
    {
        $stmt = $this->db->con->prepare("SELECT *, COUNT(*) AS numrows FROM $table WHERE type = 0");
        $stmt->execute();
        // Fetch the result as an associative array
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        return $row['numrows'];
    }

    public function getAllUsersData($table = 'users',$type = 0): array
    {
        //fetch product data using getData method
        $result = $this->db->con->prepare("SELECT * FROM $table WHERE type = ?");
        $result->bind_param('i', $type);
        $result->execute();
        $stmt = $result->get_result();

        $resultArray = array();

        //fetch product data one by one
        while ($item = $stmt->fetch_assoc()){
            $resultArray[] = $item;
        }
        return $resultArray;

    }

    public function getRegisteredUserData($email,$table = 'users'): bool|array|null
    {

        $stmt = $this->db->con->prepare("SELECT *, COUNT(*) AS numrows FROM $table WHERE email = ?");
        $stmt->bind_param('s',$email);
        $stmt->execute();
        // Fetch the result as an associative array
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function getUserCartData($userId,$table1 = 'cart',$table2 = 'product'): array
    {
        $stmt = $this->db->con->prepare("SELECT *, cart.cart_id AS cartid FROM $table1 LEFT JOIN $table2 ON product.item_id=cart.item_id WHERE user_id= ?");
        $stmt->bind_param('i',$userId);
        $stmt->execute();
        $result = $stmt->get_result();

        $resultArray = array();

        //fetch product data one by one
        while ($item = $result->fetch_assoc()){
            $resultArray[] = $item;
        }
        return $resultArray;


    }

    public function updateAdminProfile($id,$name,$username,$address,$contactInfo,$email): bool
    {

        $query = $this->db->con->prepare("update users set email=?,name=?,username=?,address=?,contact_info=? where id=?");
        $query->bind_param('s',$email);
        $query->bind_param('s',$name);
        $query->bind_param('s',$username);
        $query->bind_param('s',$address);
        $query->bind_param('s',$contactInfo);
        $query->bind_param('i',$id);
        return $query->execute();
    }

    public function changeAdminPassword($adminId,$currentPassword,$newPassword)
    {
        $stats = false;
        $adminid=$adminId;
        $cpassword=md5($currentPassword);
        $newpassword=md5($newPassword);
        $query= $this->db->con-> prepare("SELECT *,COUNT(*) AS numrows FROM users WHERE id=? and password=?");
        $query-> bind_param('s', $adminid);
        $query-> bind_param('s', $cpassword);
        $query-> execute();
        $results = $query -> get_result();
        $row = $results->fetch_assoc();

        if($row['numrows'] > 0)
        {
            $chngpwd1 = $this->db->con->prepare("update users set password=? where id=?");
            $chngpwd1-> bind_param('s', $adminid);
            $chngpwd1-> bind_param('s', $newpassword);
            if ($chngpwd1->execute()) {
                $_SESSION['success'] = "Your password successfully changed";
            }else{
                $_SESSION['success'] = "There is a Problem Please try Again";
            }
        } else {
            $_SESSION['error']="Your current password is wrong";
        }
    }
}