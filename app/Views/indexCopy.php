<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Information System - Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e3f2fd;
        }
        .login-container {
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            width: 350px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #1565c0;
        }
        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .input-group input {
            width: 100%;
            padding: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-btn {
            width: 100%;
            padding: 10px;
            background: #1565c0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .login-btn:hover {
            background: #0d47a1;
        }
        .footer {
            margin-top: 15px;
            font-size: 14px;
            color: #555;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <h2>Barangay Information System</h2>
        <form id="loginForm">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
        <p class="footer">&copy; 2024 Barangay Information System</p>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            // Simulated authentication for barangay staff
            if (username === 'admin' && password === 'brgy123') {
                alert('Login successful! Redirecting...');
                window.location.href = 'dashboard.html';
            } else {
                alert('Invalid username or password');
            }
        });
    </script>
</body>
</html>
