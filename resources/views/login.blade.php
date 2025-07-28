<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $title }}</title>

  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif
</head>

<body class="antialiased bg-gray-50">

  <x-toast></x-toast>

  <div class="min-h-screen bg-gray-100 flex items-center justify-center px-4">
    <div class="bg-white shadow-lg rounded-xl overflow-hidden w-full max-w-5xl flex flex-col lg:flex-row">

      <div class="w-full lg:w-1/2 flex items-center justify-center">
        <div class="w-full p-6 sm:p-10 max-h-screen overflow-y-auto">
          <div class="flex flex-col items-center">
            <h1 class="text-3xl font-semibold text-gray-800 mb-2">Login</h1>
            <p class="text-sm font-medium text-gray-500 mb-6 text-center">
              Masukkan email dan password anda untuk masuk ke sistem
            </p>
          </div>

          <form class="space-y-5" action="{{ route('login.process') }}" method="POST">
            @csrf
            <div>
              <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email
                <span class="text-red-700">*</span></label>
              <input type="email" id="email" name="email" autocomplete="off"
                class="w-full font-medium border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan email" value="{{ old('email') }}" />
              @error('email')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            <div>
              <label for="password" class="block mb-1 text-sm font-medium text-gray-700">Password <span
                  class="text-red-700">*</span></label>
              <input type="password" id="password" name="password" autocomplete="off"
                class="w-full border font-medium border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan password" />
              @error('password')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            <button type="submit"
              class="w-full bg-blue-600 text-white rounded-lg py-2 font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition">
              Login
            </button>
          </form>
        </div>
      </div>

      <!-- Image Section -->
      <div class="hidden lg:flex w-full lg:w-1/2 items-center justify-center bg-indigo-100 p-6">
        <div class="w-full h-64 bg-no-repeat bg-contain bg-center">
          <img src="{{ asset('img/login_illustration.webp') }}" alt="Illustration" loading='lazy' />
        </div>
      </div>
    </div>
  </div>

</body>

</html>
