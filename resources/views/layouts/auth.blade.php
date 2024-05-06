<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>{{ $title }}</title>
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img') }}/favicon/favicon.png" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor') }}/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor') }}/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('vendor') }}/fonts/boxicons.css" />
    <link rel="stylesheet" href="{{ asset('vendor') }}/css/pages/page-auth.css" />
  </head>

  <body>
    <!-- Content -->
    @yield('content')
    <!-- / Content -->
    <script src="{{ asset('vendor') }}/libs/jquery/jquery.js"></script>
    <script src="{{ asset('vendor') }}/js/bootstrap.js"></script>
    <!-- Main JS -->
    {{-- <script src="{{ asset('js') }}/main.js"></script> --}}
    <script type="text/javascript">
    async function transAjax(data) {
      html = null;
      data.headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      await $.ajax(data).done(function(res) {
        html = res;
      })
      .fail(function() {
        return false;
      })
      return html
    }
    function loading(btn_submit, btn_loading) {
        $('#'+btn_submit).hide();
        $('#'+btn_loading).removeClass('d-none');
    }
    </script>
    @stack('js')
  </body>
</html>