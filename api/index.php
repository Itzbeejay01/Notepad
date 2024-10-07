<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to BeeTechHub Notepad</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
</head>
<body class="flex flex-col h-screen bg-gray-200">

    <main class="flex-grow flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl p-8 w-full max-w-md text-center transform transition-all duration-300 hover:scale-105">
            <h2 class="text-3xl font-bold mb-4 text-blue-600">BeeTechHub Notepad!</h2>
            <p class="text-gray-800 mb-6">What do you want to do today?</p>
            <div class="flex flex-col space-y-4">
                <a href="save.php" class="bg-blue-500 text-white py-3 rounded-full shadow-md hover:bg-blue-600 transition duration-300">Save Entry</a>
                <a href="fetch.php" class="bg-green-500 text-white py-3 rounded-full shadow-md hover:bg-green-600 transition duration-300">Fetch Entry</a>
            </div>
        </div>
    </main>

    <footer class="bg-gray-200 text-center p-4">
        <p class="text-sm text-gray-600">&copy; <span id="current-year"></span> BeeTechHub. All Rights Reserved.</p>
    </footer>
    
    <script>
        document.getElementById('current-year').textContent = new Date().getFullYear();
    </script>
    
</body>
</html>
