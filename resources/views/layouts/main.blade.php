<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  {{-- logo web --}}
  <link rel="icon" href="{{ asset('img/logo_politala.webp') }}" type="image/x-icon">
  <link rel="shortcut icon" href="{{ asset('img/logo_politala.webp') }}" type="image/x-icon">

  {{-- font embed  --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
    rel="stylesheet">


  <title>{{ $title }}</title>

  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif

  @stack('css-libs')
</head>

<body class="antialiased bg-gray-100">

  @include('layouts.navbar')

  @include('layouts.sidebar')
  <div class="p-4 md:ml-60 font-sans min-h-screen overflow-auto">
    @include('layouts.breadcrumb')

    @yield('content')

  </div>

  <x-toast></x-toast>

  @stack('scripts')

</body>

</html>
