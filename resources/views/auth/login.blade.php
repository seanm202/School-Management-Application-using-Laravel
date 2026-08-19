<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://jquery.com"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
    /* 
    
    For login select dropdown

    */

    /* Container to help position a custom arrow indicator */
.select-wrapper {
  position: relative;
  width: 100%;
  max-width: 300px;
}

/* Base style for the native select element */
.custom-select {
  appearance: none; /* Removes default browser styles and arrow */
  -webkit-appearance: none;
  -moz-appearance: none;
  
  width: 100%;
  padding: 12px 40px 12px 16px; /* Extra right padding avoids text overlapping the arrow */
  font-size: 16px;
  font-family: sans-serif;
  color: #333333;
  background-color: #ffffff;
  border: 2px solid #cccccc;
  border-radius: 8px;
  cursor: pointer;
  outline: none;
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

/* Focus state styling */
.custom-select:focus {
  border-color: #0066cc;
  box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.2);
}

/* Create a custom arrow indicator using a pseudo-element */
.select-wrapper::after {
  content: "";
  position: absolute;
  right: 16px;
  top: 50%;
  transform: translateY(-50%);
  
  /* Creates a clean, CSS-only downward chevron arrow */
  width: 0;
  height: 0;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-top: 6px solid #666666;
  
  pointer-events: none; /* Allows clicks to pass through to the select element */
}

/* Change arrow color on hover/focus */
.select-wrapper:hover::after {
  border-top-color: #333333;
}


/*

For showing error

*/

.my-close {
    border: none;
    background: transparent;
    color: inherit;
    font-size: 22px;
    font-weight: bold;
    cursor: pointer;
    margin-left: 10px;
    line-height: 1;
    padding: 0;
}

.my-close:hover {
    color: red;
}

.errorshow-box {
    position: fixed;
    top: 20px;
    right: 20px;
    width: 420px;
    max-width: 90vw;
    max-height: 80vh;

    background: #fff;
    color: #000;
    border-radius: 8px;
    box-shadow: 0 4px 15px rgba(0,0,0,.25);

    display: none;
    flex-direction: column;

    z-index: 9999;
    animation: slideIn .4s ease;
}

/* Flex layout */
.errorshow-box.show {
    display: flex;
}

/* Close button */
.close-btn {
    margin-left: 15px;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
}

/* Hover effect */
.close-btn:hover {
    opacity: 0.7;
}

/* Animation */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}
    /*

    For Success

    */
    .success-box {
    position: fixed;
    top: 20px;
    right: 20px;
    background-color: #28a745;
    color: #fff;
    padding: 15px 20px;
    border-radius: 6px;
    font-family: Arial, sans-serif;
    display: none;
    align-items: center;
    justify-content: space-between;
    min-width: 250px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    animation: slideIn 0.4s ease;
}

/* Flex layout */
.success-box.show {
    display: flex;
}
#contentOfErrorShowBox {
    overflow-y: auto;
    max-height: 65vh;
    padding: 15px;
}
.errorshow-box .close-btn {
    align-self: flex-end;
    padding: 10px 15px;
    cursor: pointer;
    font-size: 22px;
    font-weight: bold;
}
#contentOfErrorShowBox .alert {
    margin-bottom: 10px;
    word-break: break-word;
    white-space: normal;
}
/* Close button */
.close-btn {
    margin-left: 15px;
    cursor: pointer;
    font-size: 18px;
    font-weight: bold;
}

/* Hover effect */
.close-btn:hover {
    opacity: 0.7;
}

/* Animation */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}
</style>

<script type="text/javascript">
   

function showSuccess(message){
    const box = document.getElementById("successBox");
    const messageBox = document.getElementById("successMessage");

    // Set the custom message
    messageBox.textContent = message;

    box.classList.add("show");

    // Auto hide after 3 seconds
    setTimeout(() => {
        box.classList.remove("show");
    }, 3000);
}

function closeSuccess() {
    document.getElementById("successBox").classList.remove("show");
}


let errorTimer;

function showError(errorMessages) {

    const box = document.getElementById("errorShowBox");
    const content = document.getElementById("contentOfErrorShowBox");

    // Cancel previous timer
    clearTimeout(errorTimer);

    // Remove previous errors
    content.innerHTML = "";

    // Convert a single error into an array
    if (!Array.isArray(errorMessages)) {
        errorMessages = [errorMessages];
    }

    errorMessages.forEach(function(message) {

        const errorDiv = document.createElement("div");
        errorDiv.className = "alert alert-danger mt-2";

        errorDiv.innerHTML = `
            <div class="d-flex justify-content-between align-items-start">
                <span>${message}</span>
                <button type="button" class="my-close">&times;</button>
            </div>
        `;

        // Close button
        const btn = errorDiv.querySelector(".my-close");

        btn.onclick = function () {
            errorDiv.remove();

            // Hide the container if no messages remain
            if (content.children.length === 0) {
                box.classList.remove("show");
            }
        };

        content.appendChild(errorDiv);
    });

    // Show the error container
    box.classList.add("show");

    // Auto-hide after 5 seconds
    errorTimer = setTimeout(function () {
        content.innerHTML = "";
        box.classList.remove("show");
    }, 5000);
}

function closeError() {
    document.getElementById("errorShowBox").classList.remove("show");
}
 
$(document).ready(function () {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $('#loginForm').on('submit', function (e) {

        e.preventDefault();
 
        $.ajax({
            url: this.action,
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',

           
        success: function (response) {
            showSuccess(response.message);
            setTimeout(function () {
                window.location.href = response.redirect_url;
            }, 800); // allow user to see the message
        },
        error: function (xhr) {
    let message = "Login failed.";

            if (xhr.responseJSON && xhr.responseJSON.message) {
                message = xhr.responseJSON.message;
            }

            showError(message);

            setTimeout(function () {
                console.log(message);
            }, 800);
            console.log(xhr);
}

        });
    });

});

// Clear all sessions

$(document).ready(function () {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $('#clearAllSessions').on('submit', function (e) {

        console.log("Submit intercepted");

        e.preventDefault();

        $.ajax({
            url: this.action,
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',

           
       success: function(response) {
   window.location.href = response.redirect_url;
},
        error: function (xhr) {
   
            console.log(xhr);
}

        });
    });

});

</script>
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
       
<div id="successBox" class="success-box">
    <span id="successMessage" class="message"></span>
    <span class="close-btn" onclick="closeSuccess()">&times;</span>
</div>
<div id="errorShowBox" class="errorshow-box">
    <div id="contentOfErrorShowBox"></div>
</div>
        <h2>Login</h2>
         @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('login') }}" id="loginForm" >
            @csrf

            <div class="field">
                <label>Choose user</label>
                <select name="email" class="custom-select">
                    <option value="admin@admin.com">Admin</option>
                    <option value="teacher@teacher.com">Teacher</option>
                    <option value="student@student.com">Student</option>
                </select>
            </div>

            <div class="field">
                <label>Password</label>
                <input type="password" name="password" value="abcd1234" readonly/>
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
            <h2>For Live <a href="{{route('loginforReal')}}">Click Here</a></h2>
    </div>

</div>

<div class="unset-section">
    <form method="POST" action="{{ route('unsetAllSessions') }}" id="clearAllSessions">
        @csrf
        <button type="submit" class="unset-btn">
            Clear All Sessions
        </button>
    </form>
</div>

</div>

</body>
</html>