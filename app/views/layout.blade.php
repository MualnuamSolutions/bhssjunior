<!DOCTYPE html>
<html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Student Result Management</title>
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/foundation/css/normalize.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/bower_components/foundation/css/foundation.min.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/foundation-icons/foundation-icons.css') }}">
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/stylesheets/app.css') }}">
   @yield('styles')
</head>
<body>
<div class="row">
   <div class="large-12 columns">

      <div class="row">
         <div class="large-12 columns">
            <nav class="top-bar" data-topbar>
               <ul class="title-area">
                  <li class="name">
                     <h1><a href="{{ route('home') }}"><i class="fi-shield"></i> Results Software</a></h1>
                  </li>
                  <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
               </ul>

               @include('partials.menu')
            </nav>
         </div>
      </div>

      <div class="content-area">
         <div class="row">
            <div class="large-12 columns">
               @yield('alert')
            </div>
         </div>
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
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>

</body>
</html>
