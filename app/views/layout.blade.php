<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Student Result Management</title>
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/foundation/css/normalize.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/foundation/css/foundation.min.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/foundation-icons/foundation-icons.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('zurb-responsive-tables/responsive-tables.css') }}" media="screen" />
   <link rel="stylesheet" type="text/css" href="{{ asset('chosen_v1.1.0/chosen.min.css') }}" media="screen" />
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/stylesheets/app.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/stylesheets/custom.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('foundation-datepicker/foundation-datepicker.css') }}" />
   <link rel="stylesheet" type="text/css" href="{{ asset('jquery.fileapi/statics/main-custom.css') }}" />
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
         <div class="large-12 columns"><hr />
            <p>&copy; Copyright. Mualnuam Solutions.</p>
         </div>
      </footer>

   </div>
</div>

<script type="text/javascript" src="{{ asset('assets/bower_components/modernizr/modernizr.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/bower_components/foundation/js/foundation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('zurb-responsive-tables/responsive-tables.js') }}"></script>
<script type="text/javascript" src="{{ asset('chosen_v1.1.0/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('foundation-datepicker/foundation-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
@yield('scripts')
</body>
</html>
