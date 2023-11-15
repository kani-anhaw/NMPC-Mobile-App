<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <title>Welcome</title>
</head>
<body>

   

    <div class="container">

        <div class="container-img">
            <img src="{{URL('img/logo1.png')}}" alt="logo1">
            <img src="{{URL('img/logo2.png')}}" alt="logo2">

        </div>
      
           
       
     
        <div class="container-buttons">
            <div class="primary-button" onclick="window.location.href='register'">
                <span>SIGN UP</span>
            </div>
           
            <div class="secondary-button" onclick="window.location.href='login'">
                <span>LOGIN</span>
            </div>
        </div>
        
    

       

    </div>

</body>
</html>