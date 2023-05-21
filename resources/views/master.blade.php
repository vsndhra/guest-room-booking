<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
    <script src="{{ asset('js/scripts.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>Guest room booking</title>

    
</head>
<body>
    <div class="outer-container">
        <div class="title">
            <h1>Guest Room Booking</h1>  
               
        </div>
        
        @if(Session::has('Error'))
            <div class="alert alert-danger" style="margin:20px;">{{ Session::get('Error') }}</div>
        @endif

        <div class="user-type">
            <a href="{{ url('owner-login') }}"> <button class="button house-owner" >House Owner</button></a>
            <a href="{{ url('guest-login') }}"> <button class="button guest" >Guest</button></a>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>