<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>VESTA ERP</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet">

  <!-- Styles -->
  <style>
  html, body {
    background-color: #fff;
    color: #FFF;
    font-family: 'Roboto', sans-serif;
    font-weight: 100;
    height: 100vh;
    margin: 0;
  }

  .full-height {
    height: 100vh;
  }

  .flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
  }

  .position-ref {
    position: relative;
  }

  .top-right {
    position: absolute;
    right: 10px;
    top: 18px;
  }

  .content {
    text-align: center;
  }

  .title {
    font-size: 4em;
  }

  .links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
  }

  .m-b-md {
    margin-bottom: 250px;
  }
  .bg-erp {
    background-image: url({{ asset('img/background.jpg') }});
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>
</head>
<body>
  <div class="flex-center position-ref full-height bg-erp">
    @if (Route::has('login'))
    <div class="top-right links">
      @auth
      <a href="{{ url('/home') }}">Home</a>
      @else
      <a href="{{ route('login') }}">Login</a>
      <a href="{{ route('register') }}">Register</a>
      @endauth
    </div>
    @endif

    <div class="content">
      <div class="title m-b-md font-weight-bold">
        VESTA <small>ERP</small>
      </div>
    </div>
  </div>
</body>
</html>
