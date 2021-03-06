<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>{{ config('app.name') }}</title>
      <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
      <link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <!--     Fonts and icons     -->
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
      <!-- CSS Files -->
      <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
      <!-- CSS Just for demo purpose, don't include it in your project -->
      <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
          <div class="loader"></div>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          @include('layouts.page_templates.auth')
      
          <div class="fixed-plugin">
            <div class="dropdown show-dropdown">
              <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
              </a>
              <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Filters</li>
                <li class="adjustments-line">
                  <a href="javascript:void(0)" class="switch-trigger active-color">
                    <div class="badge-colors ml-auto mr-auto">
                      <span class="badge filter badge-purple " data-color="purple"></span>
                      <span class="badge filter badge-azure" data-color="azure"></span>
                      <span class="badge filter badge-green" data-color="green"></span>
                      <span class="badge filter badge-warning active" data-color="orange"></span>
                      <span class="badge filter badge-danger" data-color="danger"></span>
                      <span class="badge filter badge-rose" data-color="rose"></span>
                    </div>
                    <div class="clearfix"></div>
                  </a>
                </li>
                <li class="header-title">Images</li>
                <li class="active">
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{ asset('material') }}/img/sidebar-1.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{ asset('material') }}/img/sidebar-2.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{ asset('material') }}/img/sidebar-3.jpg" alt="">
                  </a>
                </li>
                <li>
                  <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="{{ asset('material') }}/img/sidebar-4.jpg" alt="">
                  </a>
                </li>
              </ul>
            </div>
          </div>
        @endauth
        @guest()
            @include('layouts.page_templates.guest')
        @endguest

        <!--   Core JS Files   -->
        <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('material') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Spinner (Loading) -->
        <!-- Mesajes para JQuery Validate -->
        <script>
          $(document).ready(function() {
            $(".loader").hide();
            jQuery.extend(jQuery.validator.messages, {
              required: "Este campo es obligatorio.",
              remote: "Por favor, rellena este campo.",
              email: "Por favor, escribe una dirección de correo válida",
              url: "Por favor, escribe una URL válida.",
              date: "Por favor, escribe una fecha válida.",
              dateISO: "Por favor, escribe una fecha (ISO) válida.",
              number: "Por favor, escribe un número entero válido.",
              digits: "Por favor, escribe sólo dígitos.",
              creditcard: "Por favor, escribe un número de tarjeta válido.",
              equalTo: "Por favor, escribe el mismo valor de nuevo.",
              accept: "Por favor, escribe un valor con una extensión aceptada.",
              maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
              minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
              rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
              range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
              max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
              min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
            });

            //Validaciones extras
            $.validator.addMethod("alfanumOespacio", function(value, element) {
                return /^[ a-z0-9áéíóúüñ]*$/i.test(value);
            }, "Ingrese sólo letras, números o espacios.");

            $.validator.addMethod("alfaOespacio", function(value, element) {
                return /^[a-záéíóúüñ]*$/i.test(value);
            }, "Ingrese sólo letras o espacios.");

            $.validator.addMethod("valueNotEquals", function(value, element, arg){
              return arg != value;
            }, "Debe seleccionar la menos uno");    

            //Pasar a mayusculas todo
            $(document).ready( function () {
                $("input").on("keypress", function () {
                $input=$(this);
                setTimeout(function () {
                  $input.val($input.val().toUpperCase());
                },50);
                })
              })             
            });         
        </script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>     
        <!-- Plugin for the momentJs  -->
        <script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
        <!-- Forms Validations Plugin -->
        <script src="{{ asset('material') }}/js/plugins/jquery.validate.min.js"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="{{ asset('material') }}/js/plugins/jquery.bootstrap-wizard.js"></script>
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-selectpicker.js"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-tagsinput.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="{{ asset('material') }}/js/plugins/jasny-bootstrap.min.js"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="{{ asset('material') }}/js/plugins/fullcalendar.min.js"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="{{ asset('material') }}/js/plugins/jquery-jvectormap.js"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{ asset('material') }}/js/plugins/nouislider.min.js"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="{{ asset('material') }}/js/plugins/arrive.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE'"></script>
        <!-- Chartist JS -->
        <script src="{{ asset('material') }}/js/plugins/chartist.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('material') }}/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="{{ asset('material') }}/demo/demo.js"></script>
        <script src="{{ asset('material') }}/js/settings.js"></script>
        @stack('js')
    </body>
</html>