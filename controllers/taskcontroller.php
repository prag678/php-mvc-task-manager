<?php

//task controller
class Taskcontroller
{
    //handler request
    public function handlerequest()
    {
        $action = $_GET['action'];
        switch ($action) {
            case 'create':
                    $this->createtask();
                break;
            case 'dashboard':
                    $this->dashboard();
                break;
            case 'view':
                    $this->viewtask();
                break;
            case 'delete':
                    $this->deletetask();
                break;
            case 'update':
                    $this->updatetask();
                break;    
            case 'fetchdata':
                    $this->fetchdata();
                break;    
            default:
                break;
        }
    }
    /* create task function */
    private function createtask()
    {
        $create = new Task();
        session_start();
        if ($_SESSION['userid'] == false) {
            header("location: index.php?action=login");
            exit;
        }
        $create->createtask();
        if (isset($_POST['submit'])) {
            header("location: index.php?action=dashboard");
        }
        include 'views/create.php';
    }
    /* dashboard function */
    private function dashboard()
    {
        $task = new Task();
        session_start();
        if ($_SESSION['userid'] == false) {
            header("location: index.php?action=login");
            exit;
        }
        $tasks = $task->gettask();
        include "views/dashboard.php";
    }
    /* viewtask function */
    private function viewtask()
    {
        $rows = new Task();
        session_start();
        if ($_SESSION['userid'] == false) {
            header("location: index.php?action=login");
            exit;
        }
        $runquery = $rows->viewtask();
        include 'views/viewtask.php';
    }
    /* delete task function */
    private function deletetask()
    {
        $delete = new Task();
        session_start();
        if ($_SESSION['userid'] == false) {
            header("location: index.php?action=login");
            exit;
        }
        $delete->deletetask();
        header("location: index.php?action=view");
    }
    // update task function
    private function updatetask()
    {
        $update = new Task();
        session_start();
        if ($_SESSION['userid'] == false) {
            header("location: index.php?action=login");
            exit;
        }
        $array = $update->updatetask();
        $result = $update->checkid();
        if ($result == true) {
            header("location: index.php?action=view");
            exit;
        }
        if (isset($_POST['submit'])) {
            header("location: index.php?action=dashboard");
            exit;
        }
        include 'views/update.php';
    }
    /* fetchdata function */
    private function fetchdata()
    {
        //jkhhh
    }
}
