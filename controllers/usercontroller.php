<?php

//User controller class
class Usercontroller
{
    public function handlerequest()
    {
        $action = $_GET['action'];
        switch ($action) {
            case 'login':
                $this->login();
                break;
            case 'register':
                $this->register();
                break;
            case 'logout':
                $this->logout();
                break;
            default:
                break;
        }
    }
    //login
    private function login()
    {
        session_start();
        $login = new User();
        $result = $login->login();
        if ($result == true) {
            header("location: index.php?action=dashboard");
        }
        include 'views/login.php';
    }
    //register
    private function register()
    {
        $user = new User();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usernameerr = $user->validuser();
            $passworderr = $user->validpassword();
            $emailerr = $user->validemail();
            if (!$emailerr && !$usernameerr && !$passworderr) {
                $user->register();
            } else {
                header('Location: index.php?action=register');
                exit;
            }
            header("location: index.php?action=login");
            exit;
        }
        include  'views/register.php';
    }
    //logout
    private function logout()
    {
        $logout = new User();
        $result = $logout->logout();
        if ($result == true) {
            header("location: index.php?action=login");
        }
    }
}
