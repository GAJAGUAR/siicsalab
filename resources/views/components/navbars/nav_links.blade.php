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

      {{ __('clientes') }}
    @endcomponent

    @component('components.dropdowns.dropdown_item')
      @slot('url')
        {{ route('works.create') }}
      @endslot

      {{ __('obras') }}
    @endcomponent
  @endcomponent
</div>
