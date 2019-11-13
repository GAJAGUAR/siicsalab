@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header">
          <h5 class="text-center">
            {{ __('Ingrese a su cuenta') }}
          </h5>
        </div>

        <div class="card-body">
          <form
            method="POST"
            action="{{ route('login') }}"
          >
            @csrf

            {{-- email field --}}
            <div class="form-row">
              <div class="form-group col-md-10 mx-auto">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-user"></i>
                    </span>
                  </div>
                  <input
                    autocomplete="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                    placeholder="Correo electrónico"
                    required
                    type="email"
                    data-autofocus="true"
                  >
                  @error('email')
                    <span
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>

            {{-- password field --}}
            <div class="form-row">
              <div class="form-group col-md-10 mx-auto">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fas fa-key"></i>
                    </span>
                  </div>
                  <input
                    autocomplete="current-password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    name="password"
                    placeholder="Contraseña"
                    required
                    type="password"
                  >
                  @error('password')
                    <span
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>

            {{-- remember field --}}
            <div class="form-row">
              <div class="form-group col-md-10 mx-auto text-center">
                <div class="form-check">
                  <input
                    type="checkbox"
                    id="remember"
                    class="form-check-input"
                    name="remember" {{ old('remember') ? 'checked' : '' }}
                  >
                  <label
                    class="form-check-label"
                    for="remember"
                  >
                    {{ __('Recordar usuario') }}
                  </label>
                </div>
              </div>
            </div>

            {{-- submit --}}
            <div class="form-row">
              <div class="col-md-10 mx-auto">
                <button
                  type="submit"
                  class="btn btn-primary btn-block"
                >
                  {{ __('Ingresar') }}
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="card-footer text-muted text-center">
          @if (Route::has('password.request'))
            <a
              class="btn btn-link"
              href="{{ route('password.request') }}"
            >
              {{ __('¿Olvidó su contraseña?') }}
            </a>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
