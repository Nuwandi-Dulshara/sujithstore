<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root{
            --ks-blue:#1f2a63;
            --ks-red:#d71920;
            --ks-white:#ffffff;
        }

        body{background:#f5f7fb;font-family:Segoe UI}

        .sidebar{
            width:250px;
            position:fixed;
            height:100vh;
            background:var(--ks-blue);
            animation:slideIn .4s ease;
        }

        @keyframes slideIn{
            from{transform:translateX(-100%)}
            to{transform:none}
        }

        .sidebar a{
            color:white;
            display:block;
            padding:12px 20px;
            text-decoration:none;
            transition:.3s;
        }

        .sidebar a:hover{
            background:var(--ks-red);
        }

        .main{
            margin-left:250px;
        }

        .topbar{
            background:white;
            padding:12px 20px;
            box-shadow:0 4px 12px rgba(0,0,0,.08);
        }

        .content{padding:25px}
    </style>
</head>
<body>

@include('admin.layouts.partials.sidebar')

<div class="main">
    @include('admin.layouts.partials.navbar')
    <div class="content">
        @yield('content')
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

