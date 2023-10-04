<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>Haakkeo School WebSite</title>
    
    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!">
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/logo.gif">


    <!-- Page CSS -->
    @vite('resources/css/app.css')
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css">

    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css">

    <link rel="stylesheet" href="../../assets/css/demo.css">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
 
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css">
   
    <link rel="stylesheet" href="../../assets/vendor/libs/apex-charts/apex-charts.css">
    
    <!-- Page CSS -->
    
    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/js/config.js"></script>
    <style>
        body{
            font-family: phetsarath OT;
        }
    </style>
</head>

<body class="">

  @if(Auth::check())
        @php
            $user_auth_data = [
                'isLoggin'=>true,
                'user'=>Auth::user(),
            ];
        @endphp
    @else
        @php
            $user_auth_data = [
                'isLoggin'=>false,
                'user'=>Auth::user(),
            ];
        @endphp
    @endif
    
    <script>
      window.Laravel = JSON.parse(atob('{{ base64_encode(json_encode($user_auth_data)) }}'));
    </script>
  
<div id="app-vue"></div>

@vite('resources/js/app.js')

   <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../../assets/vendor/libs/jquery/jquery.js"></script>

  <script src="../../assets/vendor/libs/popper/popper.js"></script>
  
  <script src="../../assets/vendor/js/bootstrap.js"></script>
 
  <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  
  <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
 
  <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
  
  <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
  
  <script src="../../assets/vendor/js/menu.js"></script>
  
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>
  
  <!-- Main JS -->
  <script src="../../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../../assets/js/dashboards-analytics.js"></script>


  <script>
    
  </script>

</body>

</html>

<!-- beautify ignore:end -->