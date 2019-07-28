<div class="dropdown">
  <a class="{{ $type ?? 'nav-link' }} dropdown-toggle text-capitalize" href="#" role="button" id="{{ $id }}"
     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{ $category }}
  </a>

  <div class="dropdown-menu" aria-labelledby="{{ $id }}">
    {{ $slot }}
  </div>
</div>
