<div class="navbar-nav mr-auto">

  {{-- dropdown catalogue --}}
  @component('components.dropdowns.dropdown')
    @slot('id', 'dropdown-catalogue')
    @slot('accesskey', 'c')
    @slot('text', 'catálogo')
    @component('components.dropdowns.dropdown_item')
      @slot('url', route('clients.index'))
      @slot('accesskey', 'l')
      {{ __('clientes') }}
    @endcomponent
    @component('components.dropdowns.dropdown_item')
      @slot('url', route('works.index'))
      @slot('accesskey', 'o')
      {{ __('obras') }}
    @endcomponent
    @component('components.dropdowns.dropdown_item')
      @slot('url', route('work_orders.index'))
      @slot('accesskey', 't')
      {{ __('órdenes de trabajo') }}
    @endcomponent
    @component('components.dropdowns.dropdown_item')
      @slot('url', route('samples.index'))
      @slot('accesskey', 'y')
      {{ __('ensayes') }}
    @endcomponent
  @endcomponent

  {{-- dropdown new --}}
  @component('components.dropdowns.dropdown')
    @slot('id', 'dropdown-new')
    @slot('accesskey', 'n')
    @slot('text', 'nuevo')
    @component('components.dropdowns.dropdown_item')
      @slot('url', route('clients.create'))
      {{ __('cliente') }}
    @endcomponent
    @component('components.dropdowns.dropdown_item')
      @slot('url', route('works.create'))
      {{ __('obra') }}
    @endcomponent
    @component('components.dropdowns.dropdown_item')
      @slot('url', route('work_orders.create'))
      {{ __('orden de trabajo') }}
    @endcomponent
    @component('components.dropdowns.dropdown_item')
      @slot('url', route('samples.create'))
      {{ __('ensaye') }}
    @endcomponent
  @endcomponent
</div>
