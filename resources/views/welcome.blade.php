<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Schoolsd Online</title>

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

            background:
                linear-gradient(
                    rgba(0,0,0,0.45),
                    rgba(0,0,0,0.45)
                ),
                url("{{ asset('welcome.png') }}");

            background-size:cover;
            background-position:center;
            background-repeat:no-repeat;

            display:flex;
            justify-content:center;
            align-items:center;
        }

        .hero{
            text-align:center;
            padding:20px;
            max-width:900px;
        }

        .hero h1{
            color:white;
            font-size:clamp(3rem, 8vw, 6rem);
            font-weight:800;
            letter-spacing:2px;
            margin-bottom:15px;

            text-shadow:
                0 4px 15px rgba(0,0,0,.5);
        }

        .hero p{
            color:white;
            font-size:clamp(1rem, 2vw, 1.4rem);
            margin-bottom:40px;
            opacity:.95;
        }

        .button-group{
            display:flex;
            justify-content:center;
            gap:20px;
            flex-wrap:wrap;
        }

        .btn{
            text-decoration:none;
            padding:14px 35px;
            border-radius:50px;
            font-size:18px;
            font-weight:700;
            transition:.3s ease;
            min-width:170px;
            text-align:center;
        }

        .btn-login{
            background:white;
            color:#1f2937;
        }

        .btn-login:hover{
            transform:translateY(-3px);
            box-shadow:0 10px 25px rgba(255,255,255,.3);
        }

        .btn-register{
            background:#2563eb;
            color:white;
        }

        .btn-register:hover{
            transform:translateY(-3px);
            box-shadow:0 10px 25px rgba(37,99,235,.4);
        }

        .btn-dashboard{
            background:#10b981;
            color:white;
        }

        .btn-dashboard:hover{
            transform:translateY(-3px);
            box-shadow:0 10px 25px rgba(16,185,129,.4);
        }

        @media(max-width:768px){

            .hero h1{
                margin-bottom:10px;
            }

            .hero p{
                margin-bottom:30px;
            }

            .btn{
                width:220px;
            }
        }
    </style>
</head>
<body>

<div class="hero">

    <h1>My School Online</h1>

    <p>
        Manage students, teachers, classes and school activities
        from anywhere, anytime.
    </p>

    <div class="button-group">

        @auth
            <a href="{{ url('dashboard') }}"
               class="btn btn-dashboard">
                Dashboard
            </a>
        @else

            @if(Route::has('loginpage'))
                <a href="{{ route('loginpage') }}"
                   class="btn btn-login">
                    Log In
                </a>
            @endif

            @if(Route::has('registerpage'))
                <a href="{{ route('registerpage') }}"
                   class="btn btn-register">
                    Register
                </a>
            @endif

        @endauth

    </div>

</div>

</body>
</html>