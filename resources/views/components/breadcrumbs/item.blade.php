@if (isset($active) && $active)
  <li
    class="breadcrumb-item active"
    aria-current="page"
  >
    {{ $slot }}
  </li>
@else
  <li class="breadcrumb-item">
    <a href="{{ $url }}">
      {{ $slot }}
    </a>
  </li>
@endif
