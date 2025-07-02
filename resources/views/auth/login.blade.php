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
            <div class="welcome">
                Assess your DISC Workstyle Profile.<br>
            </div>
            <form method="POST" action="{{ route('login') }}">
                 @csrf
                <div class="no-bg alert alert-danger text-center p-0 border border-0 @error('emp_code') d-block @else d-none @enderror" role="alert">
                @error('emp_code')
                <small class="invalid-feedback text-danger @error('emp_code') d-block @else d-none @enderror"
                    role="alert">{{ $message }}</small>
                @enderror
                </div>
                <div class="input-group">
                    <input type="text" name="emp_code" class="emp_code" placeholder="Employee Code" required>  
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="login-btn">LOG IN</button>
            </form>
        </div>  
    </div>
</body>
</html>