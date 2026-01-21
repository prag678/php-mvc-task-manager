<?php

//task extends database
class Task extends Database
{
    //get task
    public function gettask()
    {
        $taskdata = [];
        $database = new Database();
        $tasks = $database->selectQuery('task', '*', "userid ='" . $_SESSION['userid'] . "'");
        if (mysqli_num_rows($tasks) > 0) {
            while ($row = mysqli_fetch_assoc($tasks)) {
                $taskdata[] = $row;
            }
        }
        return $taskdata;
    }
    //create task
    public function createtask()
    {
        $id = $_SESSION['userid'];
        $database = new Database();
        $rec = $database->getquery('task', '*', "id ='" . $id . "'");
        $array = mysqli_fetch_array($rec);
        if (isset($_POST['submit'])) {
            $userid = $_SESSION['userid'];
            $title = $_POST['title'];
            $descr = $_POST['descr'];
            $user = new Database();
            $user->insertquery('task', ['userid','title', 'descr'], [$userid, $title, $descr]);
        }
        return $array;
    }
    //view task
    public function viewtask()
    {
        $taskdata = [];
        $database = new Database();
        $runquery = $database->selectquery('task', '*', "userid ='" . $_SESSION['userid'] . "'");
        if (mysqli_num_rows($runquery) > 0) {
            while ($rows = mysqli_fetch_assoc($runquery)) {
                $taskdata[] = $rows;
            }
        }
        return $taskdata;
    }
    //delete task
    public function deletetask()
    {
        $id = $_GET['id'];
        $database = new Database();
        return $database->deletequery('task', "id ='" . $id . "'");
    }
    //update task
    public function updatetask()
    {
        $id = $_GET['id'];
        $database = new Database();
        $rec = $database->getquery('task', '*', "id ='" . $id . "'");
        $array = mysqli_fetch_array($rec);
        if (isset($_POST['submit'])) {
            $idd = $_GET['id'];
            $title = $_POST['title'];
            $descr = $_POST['descr'];
            $database->updatequery('task', ["title = '$title'", "descr = '$descr'"], "id = '" . $idd . "'");
        }
        return $array;
    }
    //check id
    public function checkid()
    {
        $id = $_GET['id'];
        $id2 = $_SESSION['userid'];
        $database = new Database();
        $run = $database->countquery('task', '*', "id='" . $id . "' AND " . "userid ='" . $id2 . "'");
        $value = false;
        if (mysqli_num_rows($run) == 0) {
             $value = true;
        }
        return $value;
    }
}
