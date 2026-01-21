<?php

//user class
class User extends Database
{
    //register
    public function register()
    {
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $user = new Database();
            $user->insertquery('user', ['userid', 'password', 'email'], [$username, $password, $email]);
        }
    }
    //valid email
    public function validemail()
    {
        $emailerr = "";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['email'])) {
                $emailerr .= "Email is required";
            } else {
                $email = $_POST['email'];
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailerr .= "Invalid email format";
                }
            }
        }
        return $emailerr;
    }
    //valid user
    public function validuser()
    {
        $usernameerr = "";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['username'])) {
                $usernameerr .= "User name is required";
            } else {
                $username = $this->checkinput($_POST['username']);
                if (!preg_match('/^[0-9]*$/', $username)) {
                    $usernameerr .= "Only numbers are allowed";
                }
                $userexit = new Database();
                $userexits = $userexit->selectquery('user', '*', "userid = '$username' ");
                if (mysqli_num_rows($userexits)) {
                    $usernameerr .=  "User id is already exit!";
                }
            }
        }
        return $usernameerr;
    }
    //valid password
    public function validpassword()
    {
        $passworderr = "";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['password'])) {
                $passworderr .= "Password is required";
            } else {
                $password = $this->checkinput($_POST['password']);
                if (!preg_match('/^[0-9]*$/', $password)) {
                    $passworderr .= "Only numbers are allowed";
                }
            }
        }
        return $passworderr;
    }
    //check input
    public function checkinput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);                            
        return $data;
    }
    //login
    public function login()
    {
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $database = new Database();
            $runquery = $database->selectquery('user', '*', "userid = '$username' AND password = '$password'");
            if (mysqli_num_rows($runquery) === 0) {
            } else {
                $row = mysqli_fetch_array($runquery);
                $_SESSION['id'] = $row['id'];
                $_SESSION['userid'] = $row['userid'];
                return true;
            }
        }
    }
    // log out
    public function logout()
    {
        session_start();
        $value = session_destroy();
        return $value;
    }
}
