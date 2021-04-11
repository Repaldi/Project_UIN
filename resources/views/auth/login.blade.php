<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Media Pembelajaran Fisika - Login</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('Front_Form/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('Front_Form/css/style.css')}}">
</head>
<body>
    @if(session('alert'))
      <script>
        alert('Anda tidak boleh memasuki halaman tersebut');
      </script>
    @endif
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{asset('Front_Form/images/login1.jpg')}}" alt="sing up image"></figure>
                        Belum Punya Akun? <a href="{{ route('register') }}">Klik Disini</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Masuk</h2>
                        <form method="POST" class="register-form" action="{{ route('login') }}" id="login-form">
                        @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email"  placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password"  placeholder="Kata Sandi"/>
                            </div>
                            @if (Route::has('password.request'))
                            <div class="form-group">
                            Lupa Kata Sandi?<a href="{{ route('password.request') }}"> Klik Disini</a>
                            </div>
                            @endif
                            <div class="form-group form-button">
                                <input type="submit" class="form-submit" value="Masuk"/>
                            </div>
                        </form>
                        <!-- <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('Front_Form/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('Front_Form/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
