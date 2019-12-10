<div class="dropdown">
  <a
    {{ isset($accesskey) ? 'accesskey='.$accesskey : '' }}
    class="{{ $type ?? 'nav-link' }} dropdown-toggle text-capitalize"
    id="{{ $id }}"
    href="#" role="button"
    aria-expanded="false"
    aria-haspopup="true"
    data-toggle="dropdown"
  >
    {{ $text }}
  </a>
  <div
    class="dropdown-menu"
    aria-labelledby="{{ $id }}"
  >
    {{ $slot }}
  </div>
</div>
