<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CI4 Skeleton Loader</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        /* Skeleton Loader */
        .skeleton {
            background: #ddd;
            border-radius: 5px;
            animation: loading 1.5s infinite alternate;
        }
        .skeleton.text {
            width: 80%;
            height: 20px;
            margin: 10px auto;
        }
        .skeleton.image {
            width: 300px;
            height: 200px;
        }

        @keyframes loading {
            0% { opacity: 0.6; }
            100% { opacity: 1; }
        }

        /* Spinner Loader */
        .loader {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            margin: 20px auto;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Content */
        .content {
            display: none;
        }
    </style>
</head>
<body>

    <!-- Spinner while loading -->
    <div id="loader" class="loader"></div>

    <!-- Skeleton Loading Effect -->
    <div id="skeleton">
        <div class="skeleton text"></div>
        <div class="skeleton text" style="width: 60%"></div>
        <div class="skeleton text" style="width: 90%"></div>
        <br>
        <div class="skeleton image"></div>
    </div>

    <!-- Main Content -->
    <div id="content" class="content">
        <h1>Barangay Information System</h1>
        <p>Welcome to our system. This is where we manage barangay data efficiently.</p>
        <img id="lazy-img" src="real-image.jpg" width="300" height="200" alt="Barangay Information">
    </div>

    <script>
        // Simulate delay for demo (remove in production)
        setTimeout(() => {
            document.getElementById('loader').style.display = 'none'; // Hide spinner
            document.getElementById('skeleton').style.display = 'none'; // Hide skeleton
            document.getElementById('content').style.display = 'block'; // Show content
        }, 2000); // 2 seconds delay
    </script>

</body>
</html>
