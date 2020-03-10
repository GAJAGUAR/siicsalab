<div class="navbar-nav mr-auto">

  {{-- panel --}}
  @component('components.nav_link')
    @slot('url', route('panel'))
    @slot('accesskey', 'i')
    {{ __('inicio') }}
  @endcomponent

  {{-- catalogue --}}
  @component('components.nav_link')
    @slot('url', route('catalogue'))
    @slot('accesskey', 'c')
    {{ __('catálogo') }}
  @endcomponent

  {{-- dropdown add --}}
  @component('components.dropdown')
    @slot('id', 'dropdown-add')
    @slot('accesskey', 'a')
    @slot('text', 'agregar')
    @component('components.dropdown_item')
      @slot('url', route('clients.create'))
      {{ __('cliente') }}
    @endcomponent
    @component('components.dropdown_item')
      @slot('url', route('works.create'))
      {{ __('obra') }}
    @endcomponent
    @component('components.dropdown_item')
      @slot('url', route('work-orders.create'))
      {{ __('orden de trabajo') }}
    @endcomponent
    @component('components.dropdown_item')
      @slot('url', route('samples.create'))
      {{ __('ensaye') }}
    @endcomponent
    @component('components.dropdown_item')
      @slot('url', route('employees.create'))
      {{ __('personal') }}
    @endcomponent
  @endcomponent
</div>
