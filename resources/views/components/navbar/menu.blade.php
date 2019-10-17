<div class="navbar-nav mr-auto">

  {{-- dropdown catalogue --}}
  @component('components.dropdowns.container')
    @slot('id', 'dropdown-catalogue')
    @slot('accesskey', 'c')
    @slot('text', 'catálogo')
    @component('components.dropdowns.item')
      @slot('url', route('clients.index'))
      @slot('accesskey', 'l')
      {{ __('clientes') }}
    @endcomponent
    @component('components.dropdowns.item')
      @slot('url', route('works.index'))
      @slot('accesskey', 'o')
      {{ __('obras') }}
    @endcomponent
    @component('components.dropdowns.item')
      @slot('url', route('work_orders.index'))
      @slot('accesskey', 't')
      {{ __('órdenes de trabajo') }}
    @endcomponent
    @component('components.dropdowns.item')
      @slot('url', route('samples.index'))
      @slot('accesskey', 'y')
      {{ __('ensayes') }}
    @endcomponent
    @component('components.dropdowns.item')
      @slot('url', route('employees.index'))
      @slot('accesskey', 'p')
      {{ __('personal') }}
    @endcomponent
  @endcomponent

  {{-- dropdown new --}}
  @component('components.dropdowns.container')
    @slot('id', 'dropdown-new')
    @slot('accesskey', 'n')
    @slot('text', 'nuevo')
    @component('components.dropdowns.item')
      @slot('url', route('clients.create'))
      {{ __('cliente') }}
    @endcomponent
    @component('components.dropdowns.item')
      @slot('url', route('works.create'))
      {{ __('obra') }}
    @endcomponent
    @component('components.dropdowns.item')
      @slot('url', route('work_orders.create'))
      {{ __('orden de trabajo') }}
    @endcomponent
    @component('components.dropdowns.item')
      @slot('url', route('samples.create'))
      {{ __('ensaye') }}
    @endcomponent
  @endcomponent

  {{-- pendings --}}
  @component('components.navs.item')
    @slot('url', route('pendings'))
    @slot('accesskey', 'p')
    {{ __('pendientes') }}
  @endcomponent
</div>
