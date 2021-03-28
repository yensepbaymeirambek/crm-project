<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
        <link href="{{asset('https://fonts.googleapis.com/css?family=Poppins:600&display=swap')}}" rel="stylesheet">
        <script src="{{asset('https://kit.fontawesome.com/a81368914c.js')}}"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div class="hero">
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                    <button type="button" class="toggle-btn" onclick="register()">Register</button>
                </div>
                <form id="login" class="input-group" method="post" action="{{route('signin')}}">
                    {{ csrf_field() }}
                    <input type="text" class="input-field" placeholder="User Name" required value="{{old('username')}}" name="username">
                    <input type="password" class="input-field" placeholder="Enter Password" required value="{{old('password')}}" name="password">
                    @if($errors->any())
                        <p class="text-danger">{{$errors->first('error')}}</p>
                    @endif
                    <input type="checkbox" name="remember" class="check-box"><span>Remember Password</span>
                    <button type="submit" class="submit-btn">Log in</button>
                </form>
                <form id="register" class="input-group" method="post" action="{{route('signup')}}">
                    {{ csrf_field() }}
                    <input type="text" class="input-field" placeholder="User Name"  name="username">
                    <input type="email" class="input-field" placeholder="e-mail"  name="email">
                    <input type="password" class="input-field" placeholder="Enter Password"  name="password">
                    <input type="checkbox" class="check-box" ><span>Agree</span>
                    <button type="submit" class="submit-btn">Register</button>
                </form>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px"
        }
        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }
    </script>
</html>
