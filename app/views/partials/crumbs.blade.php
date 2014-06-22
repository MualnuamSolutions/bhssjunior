<ul class="breadcrumbs">
   <li><a href="{{ route('home') }}">Home</a></li>

   @if (isset($crumbs))
   @foreach($crumbs as $crumb => $url)
   <li><a href="{{ $url }}">{{ $crumb }}</a></li>
   @endforeach
   @endif

   <li class="current">{{ $current }}</li>
</ul>
