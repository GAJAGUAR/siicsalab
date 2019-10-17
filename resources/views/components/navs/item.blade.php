@if ($slot != '')
  <a class="nav-link text-capitalize"
     {{ isset($accesskey) ? 'accesskey='.$accesskey : '' }}
     href="{{ $url ?? '#' }}"
     {{ isset($target) ? 'target='.$target : '' }}>
    {{ $slot }}
  </a>
@endif
