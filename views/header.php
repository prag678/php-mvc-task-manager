<!-- Header -->
<header>
    <div>
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-xl font-semibold">Task Manager</a>
            <ul class="flex space-x-6">
                <li><a href="index.php?action=dashboard" class="hover:text-blue-300">Dashboard</a></li>
                <li><a href="index.php?action=create" class="hover:text-blue-300">Create Task</a></li>
                <li><a href="index.php?action=view" class="hover:text-blue-300">View Tasks</a></li>
            </ul>
            <button href class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300">
                <a href="index.php?action=logout" onclick="return logout()">Log Out</a>
             </button>
        </div>
    </nav>
    </div>
</header>