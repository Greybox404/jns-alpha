<?php
// Get query parameters (sent via redirect)
$type = isset($_GET['type']) ? $_GET['type'] : 'error';
$message = isset($_GET['message']) ? $_GET['message'] : 'Unknown error occurred';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .status-box {
            text-align: center;
            background: #fff;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            max-width: 500px;
        }
        .status-box h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color: <?= $type === 'success' ? '#28a745' : '#dc3545'; ?>;
        }
        .status-box p {
            font-size: 18px;
            margin-bottom: 30px;
        }
        .status-box a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 12px 25px;
            border-radius: 6px;
            transition: background 0.3s;
        }
        .status-box a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="status-box">
        <h1><?= $type === 'success' ? '✅ Success' : '❌ Failed' ?></h1>
        <p><?= htmlspecialchars($message) ?></p>
        <a href="index.html">Go Back</a>
    </div>
</body>
</html>
