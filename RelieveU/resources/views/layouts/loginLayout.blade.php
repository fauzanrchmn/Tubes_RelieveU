<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CurhatDok Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin-top: 56px;
            background-color: #fce4ec; /* Soft red background */
        }
        .navbar {
            background-color: #e57373; /* Soft red navbar */
            color: #fff;
        }
        .navbar-brand {
            font-weight: bold;
            color: #fff;
        }
        .navbar a {
            color: #fff;
        }
        .navbar a:hover {
            color: #ffcdd2; /* Lighter soft red hover effect */
        }
        .sidebar {
            background-color: #ffcdd2; /* Light soft red sidebar */
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            width: 250px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar a {
            text-decoration: none;
            color: #880e4f;
            display: block;
            padding: 15px;
            font-weight: bold;
        }
        .sidebar a:hover {
            background-color: #f8bbd0; /* Hover effect */
            color: #fff;
        }
        .sidebar .active {
            background-color: #e57373;
            color: #fff;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .card {
            border: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            border-radius: 8px;
        }
        .card-header {
            background-color: #f8bbd0;
            color: #880e4f;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #e57373;
            border: none;
        }
        .btn-primary:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
