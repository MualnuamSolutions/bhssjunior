<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <title>Student Result Management</title>
   <!--   <link rel="stylesheet" type="text/css" href="{{ asset('foundation-5.2.2/css/normalize.css') }}">-->
   <!--   <link rel="stylesheet" type="text/css" href="{{ asset('foundation-5.2.2/css/foundation.min.css') }}">-->
   <link rel="stylesheet" type="text/css" href="{{ asset('foundation-icons/foundation-icons.css') }}">
   <!--   <link rel="stylesheet" type="text/css" href="{{ asset('zurb-responsive-tables/responsive-tables.css') }}" media="screen" />-->
   <link rel="stylesheet" type="text/css" href="{{ asset('jquery-ui-1.11.1.custom/jquery-ui.min.css') }}" media="screen"/>
   <link rel="stylesheet" type="text/css" href="{{ asset('jquery-ui-1.11.1.custom/jquery-ui.structure.min.css') }}" media="screen"/>
   <link rel="stylesheet" type="text/css" href="{{ asset('jquery-ui-1.11.1.custom/jquery-ui.theme.min.css') }}" media="screen"/>
   <link rel="stylesheet" type="text/css" href="{{ asset('chosen_v1.1.0/chosen.min.css') }}" media="screen"/>
   <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('foundation-datepicker/foundation-datepicker.css') }}"/>
   <link rel="stylesheet" type="text/css" href="{{ asset('jquery.fileapi/statics/main-custom.css') }}"/>
   @yield('styles')
</head>
<body>

<nav class="top-bar" data-topbar>
   <ul class="title-area">
      <li class="name">
         <h1><a href="{{ route('home') }}"><i class="fi-shield"></i> Results Software</a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
   </ul>

   <section class="top-bar-section">
      @include('partials.menu')
   </section>
</nav>

<div class="row">
   <div class="large-12 columns">
      <div class="content-area">

         @include('partials.alert')

         <div class="row">
            <div class="large-12 columns">
               @yield('title')
            </div>
         </div>
         <div class="row">
            <div class="large-12 columns">
               @yield('content')
            </div>
         </div>
      </div>

      <footer class="row">
         <div class="large-12 columns">
            <hr/>
            <p>&copy; Copyright. Mualnuam Solutions.</p>
         </div>
      </footer>

   </div>
</div>

<script type="text/javascript" src="{{ asset('modernizr/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('jquery-ui-1.11.1.custom/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('foundation-5.2.2/js/foundation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('chosen_v1.1.0/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('chosen_v1.1.0/chosen-order/chosen.order.jquery.min.js') }}"></script>
{{--<script type="text/javascript" src="{{ asset('chosen_v1.1.0/jquery-chosen-sortable.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('foundation-datepicker/foundation-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
