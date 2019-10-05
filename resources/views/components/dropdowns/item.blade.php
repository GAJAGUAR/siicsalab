<a class="dropdown-item text-capitalize"
   {{ isset($accesskey) ? 'accesskey='.$accesskey : '' }}
   href="{{ $url ?? '#' }}">
  {{ $slot }}
</a>
