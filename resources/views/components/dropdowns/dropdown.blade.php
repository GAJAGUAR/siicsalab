<div class="dropdown">
  <a id="{{ $id }}"
     class="{{ $type ?? 'nav-link' }} dropdown-toggle text-capitalize"
     href="#" role="button"
     data-toggle="dropdown"
     aria-expanded="false"
     aria-haspopup="true" >
    {{ $category }}
  </a>
  <div class="dropdown-menu"
       aria-labelledby="{{ $id }}">
    {{ $slot }}
  </div>
</div>
