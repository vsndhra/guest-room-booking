<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
    <script src="{{ asset('js/scripts.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Guest Rgistration</title>
</head>
<body>

    <div class="register-form" id="guest-register-form">
        <h2>Guest Registration</h2>
            <form method="POST" action="{{ route('register-guest') }}">
                @if(Session::has('Success'))
                    <div class="alert alert-success">{{ Session::get('Success') }}</div>

                @endif
                @if(Session::has('Error'))
                    <div class="alert alert-danger">{{ Session::get('Error') }}</div>

                @endif
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Full Name" name="name" value="{{ old('name') }}">
                </div>
                <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Email" name="email" value="{{ old('email') }}">
                </div>
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" value="{{ old('phone') }}">
                </div>
                <span class="text-danger">@error('phone') {{ $message }} @enderror</span>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Enter Password" name="password" value="">
                </div>
                <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                <div class="form-group">
                    <input type="submit" value="Register">
                </div>
                <p>Already registered? <a href="{{ url('guest-login') }}">Login as Guest</a></p>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</html>