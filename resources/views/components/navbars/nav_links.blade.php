<div class="navbar-nav mr-auto">
  @component('components.dropdowns.dropdown')
    @slot('id')
      {{ __('dropdown-catalogue') }}
    @endslot

    @slot('category')
      {{ __('catálogo') }}
    @endslot

    @component('components.dropdowns.dropdown_item')
      @slot('url')
        {{ route('clients.index') }}
      @endslot

      {{ __('clientes') }}
    @endcomponent

    @component('components.dropdowns.dropdown_item')
      @slot('url')
        {{ route('works.index') }}
      @endslot

      {{ __('obras') }}
    @endcomponent

    @component('components.dropdowns.dropdown_item')
      @slot('url')
        {{ route('work_orders.index') }}
      @endslot

      {{ __('órdenes de trabajo') }}
    @endcomponent

    @component('components.dropdowns.dropdown_item')
      @slot('url')
        {{ route('samples.index') }}
      @endslot

      {{ __('ensayes') }}
    @endcomponent
  @endcomponent

  @component('components.dropdowns.dropdown')
    @slot('id')
      {{ __('dropdown-new') }}
    @endslot

    @slot('category')
      {{ __('nuevo') }}
    @endslot

    @component('components.dropdowns.dropdown_item')
      @slot('url')
        {{ route('clients.create') }}
      @endslot

      {{ __('cliente') }}
    @endcomponent

    @component('components.dropdowns.dropdown_item')
      @slot('url')
        {{ route('works.create') }}
      @endslot

      {{ __('obra') }}
    @endcomponent

    @component('components.dropdowns.dropdown_item')
      @slot('url')
        {{ route('work_orders.create') }}
      @endslot

      {{ __('orden de trabajo') }}
    @endcomponent

    @component('components.dropdowns.dropdown_item')
      @slot('url')
        {{ route('samples.create') }}
      @endslot

      {{ __('ensaye') }}
    @endcomponent
  @endcomponent
</div>
