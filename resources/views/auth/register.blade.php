<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


<title>MySchoolOnline - Register</title>

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

        display:flex;
        justify-content:center;
        align-items:center;

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

    .register-card{
        width:100%;
        max-width:550px;

        background:rgba(255,255,255,.15);
        backdrop-filter:blur(12px);
        -webkit-backdrop-filter:blur(12px);

        border:1px solid rgba(255,255,255,.2);
        border-radius:20px;

        padding:35px;
        color:white;

        box-shadow:0 10px 30px rgba(0,0,0,.25);
    }

    .title{
        text-align:center;
        margin-bottom:25px;
    }

    .title h1{
        font-size:2.5rem;
        margin-bottom:10px;
    }

    .title p{
        opacity:.9;
    }

    .field{
        margin-bottom:18px;
    }

    .field label{
        display:block;
        margin-bottom:8px;
        font-weight:600;
    }

    .field input{
        width:100%;
        padding:12px;
        border:none;
        border-radius:10px;
        outline:none;
        font-size:15px;
    }

    .btn-register{
        width:100%;
        border:none;
        padding:14px;
        border-radius:10px;
        cursor:pointer;

        background:#2563eb;
        color:white;

        font-size:16px;
        font-weight:700;

        margin-top:10px;
    }

    .btn-register:hover{
        background:#1d4ed8;
    }

    .login-link{
        text-align:center;
        margin-top:20px;
    }

    .login-link a{
        color:white;
        text-decoration:none;
        font-weight:600;
    }

    .login-link a:hover{
        text-decoration:underline;
    }

    @media(max-width:768px){

        .register-card{
            padding:25px;
        }

        .title h1{
            font-size:2rem;
        }
    }
</style>


</head>
<body>

<div class="register-card">

<div class="title">
    <h1>MySchoolOnline</h1>
    <p>Create your account</p>
</div>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="field">
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input
            id="name"
            class="block mt-1 w-full"
            type="text"
            name="name"
            :value="old('name')"
            required
            autofocus
            autocomplete="name"
        />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="field">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input
            id="email"
            class="block mt-1 w-full"
            type="email"
            name="email"
            :value="old('email')"
            required
            autocomplete="username"
        />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="field">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input
            id="password"
            class="block mt-1 w-full"
            type="password"
            name="password"
            required
            autocomplete="new-password"
        />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="field">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-text-input
            id="password_confirmation"
            class="block mt-1 w-full"
            type="password"
            name="password_confirmation"
            required
            autocomplete="new-password"
        />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <button type="submit" class="btn-register">
        Register
    </button>
</form>

<div class="login-link">
    <a href="{{ route('loginpage') }}">
        Already registered? Login here
    </a>
</div>


</div>

</body>
</html>
