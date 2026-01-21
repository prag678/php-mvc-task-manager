<!-- Task View Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'views/head.php'; ?>
    <title>View-Task</title>
</head>
<body class="bg-gray-100">

    <?php require 'header.php'; ?>
    
    <div class="container mx-auto p-8">
        <!-- <h2 class="text-xl font-semibold mb-4">User Data Table</h2> -->
        <table class="w-full bg-white shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Title</th>
                    <th class="py-3 px-6 text-left">Description</th>
                    <th class="py-3 px-6 text-left">Date</th>
                    <th class="py-3 px-6 text-left">Update</th>
                    <th class="py-3 px-6 text-left">Delete</th>
                </tr>
                <?php
                if (count($runquery) === 0) {
                        echo "Task Not Found Please Create a Task";
                } else {
                    foreach ($runquery as $rows) {
                        ?>
                            <tr class="bg-orange-100">
                                <td><?php echo $rows['id']?></td>
                                <td><?php echo $rows['title']?></td>
                                <td><?php echo $rows['descr']?></td><?php $date = date_create ($rows['date']);?>
                                <td><?php echo date_format($date,"d-F-Y");?></td>
                                <td><a href="index.php?action=update&id=<?php echo $rows['id']?>" class="bg-blue-500 text-white px-4 rounded hover:bg-blue-600 transition duration-300">Update</a>
                                </td>
                                <td><a class="bg-red-500 text-white px-4 rounded hover:bg-red-600 transition duration-300 cursor-pointer" onclick="return confirmDeleteTask()" href="index.php?action=delete&id=<?php echo $rows['id']?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                    }
                }
                ?>
        </table>
    </div>
    <script>
        function confirmDeleteTask() {
            if (confirm("Are you sure you want to delete this task?") == true){
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>
</html>