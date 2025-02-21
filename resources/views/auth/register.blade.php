<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-black to-gray-900 p-6">
      <div class="w-full max-w-md bg-black/40 backdrop-blur-sm p-8 rounded-2xl border border-gray-800">
        <!-- Logo y Mensaje de Bienvenida -->
        <div class="text-center mb-6">
          <div class="text-2xl font-bold bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">
            SearchBite
          </div>
          <h1 class="text-2xl font-bold mt-2">Crea tu cuenta</h1>
          <p class="text-gray-400">Regístrate para comenzar</p>
        </div>
  
        <!-- Formulario de Registro -->
        <form method="POST" action="{{ route('register') }}">
          @csrf
  
          <!-- Nombre -->
          <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" class="text-gray-300" />
            <x-text-input id="name" class="block mt-1 w-full bg-gray-900/50 border border-gray-800 rounded-lg py-3 px-4 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all" 
                          type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>
  
          <!-- Email -->
          <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
            <x-text-input id="email" class="block mt-1 w-full bg-gray-900/50 border border-gray-800 rounded-lg py-3 px-4 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all" 
                          type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>
  
          <!-- Password -->
          <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-300" />
            <x-text-input id="password" class="block mt-1 w-full bg-gray-900/50 border border-gray-800 rounded-lg py-3 px-4 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all" 
                          type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>
  
          <!-- Confirmar Password -->
          <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-300" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-gray-900/50 border border-gray-800 rounded-lg py-3 px-4 text-gray-100 placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-1 focus:ring-red-500 transition-all" 
                          type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
          </div>
  
          <!-- Enlaces y Botón de Registro -->
          <div class="flex items-center justify-between mt-4">
            <a class="underline text-sm text-gray-400 hover:text-gray-200 transition-colors" href="{{ route('login') }}">
              {{ __('Already registered?') }}
            </a>
  
            <x-primary-button class="ml-4">
              {{ __('Register') }}
            </x-primary-button>
          </div>
        </form>
      </div>
    </div>
  </x-guest-layout>
  