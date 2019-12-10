<a
  {{ isset($accesskey) ? 'accesskey='.$accesskey : '' }}
  class="dropdown-item text-capitalize"
  href="{{ $url ?? '#' }}"
>
  {{ $slot }}
</a>
