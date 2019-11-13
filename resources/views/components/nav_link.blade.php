@if ($slot != '')
  <a
    {{ isset($accesskey) ? 'accesskey='.$accesskey : '' }}
    class="nav-link text-capitalize"
    href="{{ $url ?? '#' }}"
    {{ isset($target) ? 'target='.$target : '' }}
  >
    {{ $slot }}
  </a>
@endif
