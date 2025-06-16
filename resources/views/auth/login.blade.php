<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- <link rel="stylesheet" href="{{ asset('css/login.css') }}"> -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
</head>
<body id="login-body">
  
    <div class="container">
        <div class="left">
            <img id="logo" src="{{ asset('/img/Magellan logo PNG A.png') }}" alt="Magellan Logo">
        </div>
        <div class="right">
            <h1 class="login-title">Log In</h1>
            <div class="login-underline">
                <div class="yellow"></div>
                <div class="black"></div>
            </div>
            <div class="welcome">
                Assess your DISC Workstyle Profile.<br>
                <!-- <span class="forgot">Did you <a href="#">forget your password ?</a></span> -->
            </div>
            <form method="POST" action="{{ route('login') }}">
    @csrf
                <div class="input-group">
                    <input type="text" name="employee_code" placeholder="Employee Code" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="login-btn">LOG IN</button>
                <div class="form-options">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                    <div class="forget-password">
                        <a href="#">Forget your password?</a>
                    </div>
                </div>
            </form>
            
    </div>

</body>
</html>