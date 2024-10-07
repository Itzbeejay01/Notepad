<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <script>
        function fetchEntry() {
            const date = document.getElementById('entry-date').value;

            if (date) {
                showLoadingModal(); // Show loading modal

                setTimeout(() => {
                    fetch('fetch_entry.php?date=' + date)
                        .then(response => response.json()) // Parse JSON response
                        .then(data => {
                            // Check if entries are found
                            const entriesContainer = document.getElementById('entriesContainer');
                            entriesContainer.innerHTML = ''; // Clear previous entries

                            if (Array.isArray(data) && data.length > 0) {
                                // Display all entries
                                data.forEach(entry => {
                                    const entryDiv = document.createElement('div');
                                    entryDiv.className = "border rounded-lg p-4 mb-2 bg-white shadow";
                                    entryDiv.innerHTML = `
                                    <strong>Account Name:</strong> ${entry.accountName}<br>
                                    <strong>Survey Name:</strong> ${entry.surveyName}<br>
                                    <strong>Full Name:</strong> ${entry.fullName}<br>
                                    <strong>Survey ID:</strong> ${entry.surveyID}<br>
                                `;
                                    entriesContainer.appendChild(entryDiv);
                                });
                            } else {
                                // Show a message if no entries found
                                showNoEntriesModal();
                            }
                            closeLoadingModal(); // Close loading modal after fetching
                        });
                }, 3000); // Wait for 3 seconds before fetching
            } else {
                alert('Please select a date.'); // Show error message
            }
        }

        function showLoadingModal() {
            const loadingModal = document.getElementById('loadingModal');
            loadingModal.style.display = 'flex'; // Show loading modal
        }

        function closeLoadingModal() {
            const loadingModal = document.getElementById('loadingModal');
            loadingModal.style.display = 'none'; // Hide loading modal
        }

        function showNoEntriesModal() {
            const noEntriesModal = document.getElementById('noEntriesModal');
            noEntriesModal.style.display = 'flex'; // Show no entries modal
        }

        function closeNoEntriesModal() {
            const noEntriesModal = document.getElementById('noEntriesModal');
            noEntriesModal.style.display = 'none'; // Hide no entries modal
        }
    </script>
</head>

<body class="bg-gray-100 p-6">
    <header class="bg-green-600 text-white p-4 rounded shadow-md mb-4">
        <h1 class="text-2xl font-bold text-center">BeeTechHub Notepad</h1>
    </header>

    <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-center mb-4">Fetch Entry</h1>

        <label for="entry-date" class="block mb-2 text-sm font-semibold">Select Date:</label>
        <input type="date" id="entry-date" class="border rounded-lg p-2 w-full mb-4">

        <button onclick="fetchEntry()" class="bg-green-600 text-white py-2 rounded-lg w-full font-bold">Fetch
            Entry</button>

        <div class="mt-4 text-center">
            <a href="save.php" class="text-green-600 underline font-bold">Do you want to save? Lets go</a>
        </div>
        <div id="entriesContainer" class="mt-4"></div>



        <!-- Loading Modal -->
        <div id="loadingModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
            style="display:none;">
            <div class="bg-white p-5 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold">Loading...</h2>
                <p>Please wait while we fetch your entries.</p>
            </div>
        </div>

        <!-- No Entries Modal -->
        <div id="noEntriesModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
            style="display:none;">
            <div class="bg-white p-5 rounded-lg shadow-md text-red-500">
                <h2 class="text-lg font-semibold">No Entries Found</h2>
                <p>No entries were found for this date.</p>
                <button onclick="closeNoEntriesModal()"
                    class="bg-red-600 text-white py-1 px-3 rounded-lg mt-2">OK</button>
            </div>
        </div>
    </div>
</body>

</html>