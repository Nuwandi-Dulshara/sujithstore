<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --ks-blue: #1f2a63;
            --ks-red: #d71920;
            --ks-blue-soft: rgba(31, 42, 99, 0.05);
            --ks-red-soft: rgba(215, 25, 32, 0.05);
            --surface: #ffffff;
            --text-main: #2c3e50;
            --text-muted: #6c757d;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
        }

        /* Ambient Background blobs */
        body::before, body::after {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
            opacity: 0.6;
        }
        body::before {
            background: radial-gradient(circle, var(--ks-blue-soft), transparent 70%);
            top: -200px;
            left: -200px;
        }
        body::after {
            background: radial-gradient(circle, var(--ks-red-soft), transparent 70%);
            bottom: -200px;
            right: -200px;
        }

        /* Card Container */
        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            width: 100%;
            max-width: 450px;
            border-radius: 24px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 
                0 4px 6px -1px rgba(31, 42, 99, 0.05), 
                0 10px 15px -3px rgba(31, 42, 99, 0.05);
            animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
        }

        /* Top decorative line */
        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--ks-blue), var(--ks-red));
            border-top-left-radius: 24px;
            border-top-right-radius: 24px;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(40px) scale(0.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* --- NEW INPUT STYLES (MATCHING SCREENSHOT) --- */

        /* Light Blue Input Background */
        .form-control {
            background-color: #eef2ff; /* Light blue tint */
            border: 2px solid #e0e7ff;
            padding: 12px 15px;
            border-radius: 12px;
            font-size: 0.95rem;
            color: var(--ks-blue);
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            background-color: #eef2ff;
            border-color: var(--ks-blue);
            box-shadow: none; /* Remove default bootstrap shadow */
        }

        /* Floating Label "Chip" Style */
        .form-floating > label {
            padding: 0 8px;
            margin-left: 10px;
            background-color: transparent; 
            transition: all 0.2s ease;
            color: var(--text-muted);
        }

        /* When typing, turn label into a white chip */
        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label {
            background-color: #ffffff; /* White chip background */
            color: var(--ks-blue);
            font-weight: 700;
            height: auto;
            width: fit-content;
            opacity: 1;
            transform: scale(0.9) translateY(-0.7rem) translateX(0.15rem);
            border-radius: 4px;
            z-index: 5;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05); /* Subtle shadow for depth */
        }

        /* --- END NEW INPUT STYLES --- */

        .btn-main {
            background: linear-gradient(135deg, var(--ks-red), #b9151b);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(215, 25, 32, 0.2);
        }

        .btn-main:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(215, 25, 32, 0.3);
            color: white;
        }
        
        .brand-link {
            color: var(--ks-blue);
            text-decoration: none;
            font-weight: 700;
            transition: color 0.2s;
        }
        
        .brand-link:hover {
            color: var(--ks-red);
        }

        .form-check-input:checked {
            background-color: var(--ks-red);
            border-color: var(--ks-red);
        }
    </style>
</head>
<body>

    <div class="auth-card">
        <div class="text-center mb-4">
            <img src="{{ asset('assets/images/logo.png') }}" width="80" alt="Logo" class="mb-3">
            <div style="width: 40px; height: 3px; background: var(--ks-red); margin: 0 auto; border-radius: 2px;"></div>
        </div>
        
        @yield('content')
    </div>

</body>
</html>