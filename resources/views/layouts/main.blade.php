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

  @include('layouts.navbar')

  @include('layouts.sidebar')

  <div class="p-4 sm:ml-64 font-sans">
    @include('layouts.breadcrumb')

    @yield('content')

  </div>

  <x-toast></x-toast>

  {{-- custom js  --}}
  @if ($errors->any())
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        showCreateModalIfErrors();
      });
    </script>
  @endif

  @stack('scripts')
</body>

</html>
