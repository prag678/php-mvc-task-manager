<!-- Register Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'views/head.php';?>
    <title>Task Manager-Register</title>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4">Register</h2>
        <form action="" method="post">
            <div class="mb-4">
                <label for="username" class="block font-medium text-gray-600">Username</label>
                <input type="text" id="username" name="username" required class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="password" class="block font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" required class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="email" class="block font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" required class="w-full p-2 border rounded-md focus:outline-none focus:border-blue-500">
            </div>
            <button type="submit" name="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300">Register</button>
        </form>
    </div>
</body>         
</html>