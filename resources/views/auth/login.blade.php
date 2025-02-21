<x-guest-layout >
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-black to-gray-900 p-6">
      <div class="w-full max-w-md bg-black/40 backdrop-blur-sm p-8 rounded-2xl border border-gray-800">
        <!-- Logo y Mensaje de Bienvenida -->
        <div class="text-center mb-6">
          <div class="text-2xl font-bold bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">
            SearchBite
          </div>
          <h1 class="text-2xl font-bold mt-2">Bienvenido de nuevo</h1>
          <p class="text-gray-400">Inicia sesión en tu cuenta</p>
        </div>
        
        <!-- Estado de la Sesión -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
  
        <!-- Formulario de Login -->
        <form method="POST" action="{{ route('login') }}">
          @csrf
  
          <!-- Email -->
          <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
            <x-text-input id="email" class="block mt-1 w-full bg-gray-900/50 border border-gray-800 rounded-lg py-3 px-4 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all" 
                          type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
  
          <!-- Password -->
          <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-300" />
            <x-text-input id="password" class="block mt-1 w-full bg-gray-900/50 border border-gray-800 rounded-lg py-3 px-4 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all" 
                          type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
  
          <!-- Recordarme -->
          <div class="flex items-center mb-4">
            <label for="remember_me" class="inline-flex items-center text-gray-300">
              <input id="remember_me" type="checkbox" class="rounded bg-gray-900 border-gray-700 text-red-500 focus:ring-red-500" name="remember">
              <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
            </label>
          </div>
  
          <!-- Enlaces y Botón de Login -->
          <div class="flex items-center justify-between">
            @if (Route::has('password.request'))
              <a class="underline text-sm text-gray-400 hover:text-gray-200 transition-colors" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
              </a>
            @endif
  
            <x-primary-button class="ml-3">
              {{ __('Log in') }}
            </x-primary-button>
          </div>
        </form>
      </div>
    </div>
  </x-guest-layout>
  