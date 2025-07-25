@extends('layouts.main')

@section('content')
  <div class="sm:px-6">
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden flex flex-col lg:flex-row items-center">

      <div class="w-full lg:w-1/2">
        <img src="https://illustrations.popsy.co/gray/work-from-home.svg" alt="Welcome Illustration"
          class="w-full max-h-64 object-cover">
      </div>

      <div class="w-full lg:w-1/2 p-6 text-center lg:text-left">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Halo, {{ Auth::user()->nama }}!</h2>
        <p class="text-gray-600 mb-4">Selamat datang di Sistem Informasi Manajemen Persuratan.
        </p>
      </div>

    </div>
  </div>

  <div class="grid gap-4 lg:grid-cols-3 mt-8 sm:px-6">
    <div class="relative p-6 rounded-2xl bg-white shadow-lg dark:bg-blue-800">
      <div class="space-y-2">
        <div class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-400">
          <span>Barang</span>
        </div>
        <div class="text-xl text-black font-bold">19</div>
      </div>
    </div>
    <div class="relative p-6 rounded-2xl bg-white shadow-lg dark:bg-blue-800">
      <div class="space-y-2">
        <div class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-400">
          <span>Barang</span>
        </div>
        <div class="text-xl text-black font-bold">19</div>
      </div>
    </div>
  </div>
@endsection
