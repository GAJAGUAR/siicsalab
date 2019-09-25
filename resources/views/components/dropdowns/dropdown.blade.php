<div class="dropdown">
  <a id="{{ $id }}"
     class="{{ $type ?? 'nav-link' }} dropdown-toggle text-capitalize"
     accesskey="{{ $accesskey ?? '' }}"
     href="#" role="button"
     data-toggle="dropdown"
     aria-expanded="false"
     aria-haspopup="true" >
    {{ $text }}
  </a>
  <div class="dropdown-menu"
       aria-labelledby="{{ $id }}">
    {{ $slot }}
  </div>
</div>
