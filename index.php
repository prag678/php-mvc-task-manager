<?php

//index file in all require sub-file
require_once 'config.php';
require_once 'models/database.php';
require_once 'models/task.php';
require_once 'models/user.php';
require_once 'controllers/taskcontroller.php';
require_once 'controllers/usercontroller.php';

$controller = new Usercontroller();
$controller-> handlerequest();
$controller = new Taskcontroller();
$controller-> handlerequest();
