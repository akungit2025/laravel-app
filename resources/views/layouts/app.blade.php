<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>@yield('title', 'Dashboard') | Codefox</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

  <!-- Plugins CSS -->
  <link href="{{ asset('assets/libs/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/libs/c3/c3.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- App CSS -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

  @stack('styles') {{-- Tambahan custom style per halaman --}}
</head>
<body>

  <div id="wrapper">
    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Topbar --}}
    @include('layouts.header')

    <div class="content-page">
      <div class="content">

        <!-- Start Content -->
        <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
            <div class="col-12">
              <div class="page-title-box">
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Codefox</a></li>
                    <li class="breadcrumb-item active">@yield('title', 'Dashboard')</li>
                  </ol>
                </div>
                <h4 class="page-title">@yield('title', 'Dashboard')</h4>
              </div>
            </div>
          </div>
          <!-- end page title -->

          {{-- Main Page Content --}}
          @yield('content')

        </div>
      </div>

      {{-- Footer --}}
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">2025 © Codefox Theme by Coderthemes</div>
            <div class="col-md-6 text-md-right">
              <a href="#">About</a> · <a href="#">Help</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div> <!-- END wrapper -->

  <!-- JS Codefox -->
  <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.min.js') }}"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Flash Toast -->
  @if (session('success'))
    <script>
      Swal.fire({
        toast: true,
        icon: 'success',
        title: "{{ session('success') }}",
        position: 'top-end',
        timer: 2000,
        showConfirmButton: false
      });
    </script>
  @endif

  @if (session('error'))
    <script>
      Swal.fire({
        toast: true,
        icon: 'error',
        title: "{{ session('error') }}",
        position: 'top-end',
        timer: 2500,
        showConfirmButton: false
      });
    </script>
  @endif

  @stack('scripts') {{-- Tambahan custom script per halaman --}}
</body>
</html>
