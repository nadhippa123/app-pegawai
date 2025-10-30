<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Pegawai</title>

    <!-- ✅ BOOTSTRAP CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --light-bg: #f5f7fa;
            --radius: 8px;
        }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--light-bg);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ===== HEADER ===== */
        header {
            background-color: var(--secondary-color);
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.6rem;
        }

        .nav-link {
            color: #ecf0f1 !important;
            font-weight: 500;
            transition: 0.3s;
            border-radius: var(--radius);
            padding: 0.6rem 1rem !important;
        }

        .nav-link:hover {
            background-color: var(--primary-color);
            color: white !important;
        }

        .nav-link.active {
            background-color: var(--primary-color);
            color: white !important;
        }

        /* ===== MAIN CONTENT ===== */
        main {
            flex: 1;
            max-width: 1200px;
            width: 100%;
            margin: 2rem auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: var(--radius);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        /* ===== FOOTER ===== */
        footer {
            background-color: var(--secondary-color);
            color: white;
            text-align: center;
            padding: 1rem 0;
            font-size: 0.9rem;
            margin-top: auto;
        }

        /* Responsif tambahan */
        @media (max-width: 768px) {
            main {
                margin: 1rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- ===== HEADER NAVBAR ===== -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark container">
            <a class="navbar-brand" href="#">App Pegawai</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/employees') }}">Employee</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/departments') }}">Department</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/positions') }}">Position</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/attendances') }}">Attendance</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/salaries') }}">Salary</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="container">
        @yield('content')
    </main>

    <!-- ===== FOOTER ===== -->
    <footer>
        <p>&copy; {{ date('Y') }} App Pegawai. All rights reserved.</p>
    </footer>

    <!-- ✅ BOOTSTRAP JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
