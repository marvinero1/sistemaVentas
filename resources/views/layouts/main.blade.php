<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
  <title>AdminLTE 3 | Dashboard</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  {{-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> --}}
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="images/favicon.png" rel="icon">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap- 
  datepicker/1.4.1/css/bootstrap-datepicker3.css"/> --}}
 
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
</head>
</html>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    <main class="py-4">
    @include('layouts.header')
          @yield('content')
      @include('layouts.footer')
    </main>
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>   --}}
          {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap- 
                datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script> --}}
          <script src="{{ asset("css/fullcalendar/moment.main.js") }}"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
          <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>  
          <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> --}}

    </div>
    
    {{-- 
</body>