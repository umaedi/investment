<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Dashboard Lender' }}</title>
    <meta name="description" content="Dashboard Investor Duluin" />
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Dashboard">
    <meta property="og:description" content="Lender Financial Reporting Dashboard!">
    <meta property="og:image" content="{{ asset('img') }}/financial_report.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img') }}/favicon/favicon.png">
    <link rel="icon" type="image/x-icon" href="{{ asset('img') }}/favicon/favicon.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('vendor') }}/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('vendor') }}/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('css') }}/demo.css" />
    <link rel="stylesheet" href="{{ asset('css') }}/responsive.css" />
     <!-- Icons. Uncomment required icon fonts -->
     <link rel="stylesheet" href="{{ asset('vendor') }}/fonts/boxicons.css" />
     @stack('css')
    <!-- PWA  -->
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        {{-- @include('layouts.sidebar') --}}
        <div class="layout-page">
          {{-- @include('layouts.navbar') --}}
          <div class="content-wrapper">
            @yield('content')
            @include('layouts.footer')
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <script src="https://unpkg.com/swup@4"></script>
    <script src="{{ asset('vendor') }}/libs/jquery/jquery.js"></script>
    <script src="{{ asset('vendor') }}/js/bootstrap.js"></script>
    <script src="{{ asset('vendor') }}/libs/apex-charts/apexcharts.js"></script>
    <script src="{{ asset('js') }}/main.js"></script>
    {{-- <script src="{{ asset('js') }}/dashboards-analytics.js"></script> --}}
    {{-- <script src="{{ asset('vendor') }}/libs/popper/popper.js"></script> --}}
    {{-- <script src="{{ asset('vendor') }}/libs/perfect-scrollbar/perfect-scrollbar.js"></script> --}}
    {{-- <script src="{{ asset('vendor') }}/js/menu.js"></script> --}}
    {{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
    <script type="text/javascript">
    $(document).ready(function sw() {
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    })

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
    </script>
    @stack('js')
  </body>
</html>
