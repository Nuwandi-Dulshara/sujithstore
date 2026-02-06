<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .left-panel {
            background-color: #04062b;
            border-top-right-radius: 150px;
            border-bottom-right-radius: 150px;
        } 
        .btn-custome {
            background-color: #04062b;
            color: white;
            border: none;          
        }

        .btn-custome:hover {
            background-color: #1a1a4d;
            color: white;
        }
        .btn-custome:focus {
            background-color: #1a1a4d !important;
            color: white !important;
            box-shadow: none !important;
        }
        .form-control {
            background-color: #D9D9D9;  
            border: 1px solid #ccc;     
            box-shadow: none;           
        }
        .form-control:focus {
            background-color: #D9D9D9; 
            border-color: #ccc;          
            box-shadow: none;            
            outline: none;               
        }
        .password-wrapper {
            position: relative;
        }
        .password-wrapper .bi {
            position: absolute;
            top: 75%;
            right: 15px;
            transform: translateY(-50%);
            cursor: pointer;
        }
        
    </style>
</head>

<body>
<div class="container-fluid">
<div class="row min-vh-100">

<div class="col-md-6 left-panel d-flex flex-column justify-content-center text-center text-white">
    <h1 class="fw-bold">Hello Welcome</h1>
    <p class="lead">Back to home</p>
    <a href="/" class="btn btn-light fw-bold w-25 mx-auto">Home</a>
</div>

<div class="col-md-6 d-flex align-items-center">
<form method="POST" action="{{ route('user.login.submit') }}" class="w-75 mx-auto">
    @csrf

    <h2 class="text-center mb-4 fw-bold">Login</h2>

    <div class="mb-3">
        <label class="fw-bold">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3 password-wrapper">
        <label class="fw-bold">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
        <i class="bi bi-eye-fill" id="togglePassword"></i>
    </div>

    <button class="btn btn-custome w-100 fw-bold">Login</button>

    @error('email')
        <div class="text-danger mt-2 text-center">{{ $message }}</div>
    @enderror
</form>
</div>

</div>
</div>

<script>
const toggle = document.getElementById('togglePassword');
const password = document.getElementById('password');

toggle.addEventListener('click', () => {
    password.type = password.type === 'password' ? 'text' : 'password';
    toggle.classList.toggle('bi-eye');
    toggle.classList.toggle('bi-eye-fill');
});
</script>
</body>
</html>