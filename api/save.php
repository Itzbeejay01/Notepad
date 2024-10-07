<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <script>
        function saveEntry() {
            const accountName = document.getElementById('accountName').value;
            const surveyName = document.getElementById('surveyName').value;
            const fullName = document.getElementById('fullName').value;
            const surveyID = document.getElementById('surveyID').value;
            const date = document.getElementById('entry-date').value;

            const entryData = {
                accountName,
                surveyName,
                fullName,
                surveyID,
                date
            };

            fetch('save_entry.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(entryData)
            })
                .then(response => response.json())
                .then(data => {
                    // Show success modal
                    document.getElementById('successModal').classList.remove('hidden');
                    // Clear the form
                    document.getElementById('accountName').value = '';
                    document.getElementById('surveyName').value = '';
                    document.getElementById('fullName').value = '';
                    document.getElementById('surveyID').value = '';
                })
                .catch(error => console.error('Error:', error));
        }

        function closeModal() {
            document.getElementById('successModal').classList.add('hidden');
        }
    </script>
</head>

<body class="bg-gray-100 p-6">
    <header class="bg-green-600 text-white p-4 rounded shadow-md mb-4">
        <h1 class="text-2xl font-bold text-center">BeeTechHub Notepad</h1>
    </header>

    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-center mb-4">Save Entry</h1>

        <label for="entry-date" class="block mb-2 text-sm font-semibold">Select Date:</label>
        <input type="date" id="entry-date" class="border rounded-lg p-2 w-full mb-4">

        <div class="mb-4">
            <label for="accountName" class="block mb-2 text-sm font-semibold">Account Name:</label>
            <input type="text" id="accountName" class="border rounded-lg p-2 w-full" placeholder="Enter Account Name"
                required>
        </div>
        <div class="mb-4">
            <label for="surveyName" class="block mb-2 text-sm font-semibold">Survey Name:</label>
            <input type="text" id="surveyName" class="border rounded-lg p-2 w-full" placeholder="Enter Survey Name"
                required>
        </div>
        <div class="mb-4">
            <label for="fullName" class="block mb-2 text-sm font-semibold">Full Name:</label>
            <input type="text" id="fullName" class="border rounded-lg p-2 w-full" placeholder="Enter Full Name"
                required>
        </div>
        <div class="mb-4">
            <label for="surveyID" class="block mb-2 text-sm font-semibold">Survey ID:</label>
            <input type="text" id="surveyID" class="border rounded-lg p-2 w-full" placeholder="Enter Survey ID"
                required>
        </div>

        <button onclick="saveEntry()" class="bg-green-600 text-white py-2 rounded-lg w-full font-bold">Save
            Entry</button>

        <div class="mt-4 text-center">
            <a href="fetch.php" class="text-green-600 underline font-bold">Already have data, Fetch</a>
        </div>

        <!-- Success Modal -->
        <div id="successModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white p-5 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Success!</h2>
                <p>Entry saved successfully!</p>
                <button onclick="closeModal()" class="bg-green-600 text-white py-1 px-3 rounded-lg mt-2">OK</button>
            </div>
        </div>
    </div>
</body>

</html>