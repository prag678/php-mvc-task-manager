<table class="w-full bg-white shadow-md rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-6 text-left">User ID</th>
                    <th class="py-3 px-6 text-left">Title</th>
                    <th class="py-3 px-6 text-left">Description</th>
                    <th class="py-3 px-6 text-left">Date</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
            <?php
            if (count($tasks) == 0) {
                    echo "Task Not Found Please Create a Task";
            } else {
                foreach ($tasks as $task) {
                    ?>
                        <tr>
                            <td><?php echo $task['userid'];?></td>
                            <td><?php echo $task['title'];?></td>
                            <td><?php echo $task['descr'];?></td><?php $date = date_create ($task['date']);?>
                            <td><?php echo date_format($date,"d-F-Y");?></td>
                            </tr>
                        <?php
                }
            }
            ?>
            </tbody>
</table>