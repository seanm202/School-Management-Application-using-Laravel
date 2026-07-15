<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


<title>MySchoolOnline - Login</title>

<link href="https://fonts.bunny.net/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

<style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    body{
        font-family:'Nunito',sans-serif;
        min-height:100vh;
        padding:20px;

        background:
            linear-gradient(
                rgba(0,0,0,.45),
                rgba(0,0,0,.45)
            ),
            url("{{ asset('welcome.png') }}");

        background-size:cover;
        background-position:center center;
        background-repeat:no-repeat;
        background-attachment:fixed;
    }

    .container{
        max-width:1400px;
        margin:auto;
    }

    .header{
        text-align:center;
        margin-bottom:30px;
    }

    .header h1{
        color:#fff;
        font-size:clamp(2.5rem,6vw,5rem);
        font-weight:800;
        text-shadow:0 4px 15px rgba(0,0,0,.4);
    }

    .header p{
        color:#fff;
        margin-top:10px;
        font-size:1.1rem;
    }

    .register-link{
        text-align:center;
        margin-bottom:30px;
    }

    .register-link a{
        display:inline-block;
        text-decoration:none;
        color:#fff;
        background:#2563eb;
        padding:12px 25px;
        border-radius:50px;
        font-weight:700;
    }

    .cards{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
        gap:25px;
    }

    .card{
        width:100%;
        max-width:450px;
        margin:auto;

        background:rgba(255,255,255,.15);
        backdrop-filter:blur(12px);
        -webkit-backdrop-filter:blur(12px);

        border:1px solid rgba(255,255,255,.2);
        border-radius:20px;

        padding:25px;
        color:white;

        box-shadow:0 10px 30px rgba(0,0,0,.25);
    }

    .card h2{
        text-align:center;
        margin-bottom:20px;
    }

    .field{
        margin-bottom:15px;
    }

    .field label{
        display:block;
        margin-bottom:6px;
        font-weight:600;
    }

    .field input[type="email"],
    .field input[type="password"]{
        width:100%;
        padding:12px;
        border:none;
        border-radius:10px;
        outline:none;
    }

    .remember{
        margin-bottom:15px;
    }

    .forgot{
        display:block;
        color:#fff;
        margin-bottom:15px;
        text-decoration:none;
    }

    .login-btn{
        width:100%;
        padding:12px;
        border:none;
        border-radius:10px;
        cursor:pointer;
        background:#2563eb;
        color:white;
        font-size:16px;
        font-weight:700;
    }

    .login-btn:hover{
        background:#1d4ed8;
    }

    .unset-section{
        text-align:center;
        margin-top:30px;
    }

    .unset-btn{
        background:#dc2626;
        color:white;
        border:none;
        padding:12px 25px;
        border-radius:10px;
        cursor:pointer;
    }

    @media(max-width:768px){

        body{
            padding:15px;
        }

        .cards{
            grid-template-columns:1fr;
        }

        .card{
            max-width:100%;
        }
    }
</style>


</head>
<body>

<div class="container">


<div class="header">
    <h1>MySchoolOnline</h1>
</div>

<div class="register-link">
    <a href="{{ route('registerpage') }}">
        Register New Account
    </a>
</div>

<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="cards">

    <!-- ADMIN LOGIN -->
    <div class="card">

        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="field">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="field">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="remember">
                <input type="checkbox" name="remember">
                Remember Me
            </div>

            @if (Route::has('password.request'))
                <a class="forgot" href="{{ route('password.request') }}">
                    Forgot Password?
                </a>
            @endif

            <button type="submit" class="login-btn">
                Login
            </button>
        </form>
            <h2>For Demo <a href="{{route('loginpage')}}">Click Here</a></h2>
    </div>

</div>

<div class="unset-section">
    <form method="POST" action="{{ route('unsetAllSessions') }}">
        @csrf
        <button type="submit" class="unset-btn">
            Clear All Sessions
        </button>
    </form>
</div>

</div>

</body>
</html>
