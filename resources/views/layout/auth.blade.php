<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>@yield('title') | Codefox</title>
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
</head>
<body class="bg-white">
  <div class="account-pages my-5 pt-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div>
            @yield('content')
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>
</html>
