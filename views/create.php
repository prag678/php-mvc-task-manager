<!-- create task -->
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'views/head.php'; ?>
    <title>Create-Task</title>
</head>
<body class="bg-gray-100">
    <?php require 'header.php'; ?>
    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-semibold mb-4">Enter Task Details</h2>
        <form action="" method="post" class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-1">Title</label>
                <input type="text" id="title" name="title" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-1">Description</label>
                <textarea id="descr" name="descr" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-500 resize-none" rows="4"></textarea>
            </div>
            <button type="submit" name="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition duration-300">Save</button>
        </form>
    </div>
</body>
</html>