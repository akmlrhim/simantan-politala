@extends('layouts.main')

@section('content')
  <div class="grid gap-4 lg:grid-cols-3 sm:px-6">
    <div class="relative p-6 rounded-2xl bg-white shadow-lg dark:bg-green-800">
      <div class="flex items-center justify-between">
        <div class="space-y-2 text-left">
          <div class="flex justify-start text-md font-medium text-gray-500 dark:text-gray-300">
            <span>Surat Masuk</span>
          </div>

          <div class="text-3xl font-bold text-green-800 dark:text-white">
            {{ $stats['surat_masuk'] }}
          </div>

          <details class="mt-1">
            <summary class="cursor-pointer text-sm text-gray-600 dark:text-gray-200 hover:underline">
              Lihat detail
            </summary>
            <div class="mt-2 flex flex-wrap gap-2 text-xs">
              <span
                class="bg-green-100 text-green-800 font-semibold px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-200">
                {{ $stats['telahan_staf'] }} sudah ditelah
              </span>
              <span
                class="bg-blue-100 text-blue-800 font-semibold px-2.5 py-0.5 rounded-sm dark:bg-blue-900 dark:text-blue-200">
                10 sudah didisposisi
              </span>
            </div>
          </details>
        </div>

        <div class="p-4 bg-green-100 rounded-full dark:bg-green-700">
          <i class="fa-solid fa-envelope-open-text text-green-600 dark:text-white text-4xl"></i>
        </div>
      </div>
    </div>


    <div class="relative p-6 rounded-2xl bg-white shadow-lg dark:bg-red-800">
      <div class="flex items-center justify-between">
        <div class="space-y-2 text-left">
          <div class="flex justify-start text-md font-medium text-gray-500 dark:text-gray-300">
            <span>Surat Keluar</span>
          </div>
          <div class="text-3xl font-bold text-red-800 dark:text-white">{{ $stats['surat_keluar'] }}</div>
        </div>

        <div class="p-4 bg-red-100 rounded-full dark:bg-red-700">
          <i class="fa-solid fa-envelope-open text-red-600 dark:text-white text-4xl"></i>
        </div>
      </div>
    </div>

    <div class="relative p-6 rounded-2xl bg-white shadow-lg dark:bg-blue-800">
      <div class="flex items-center justify-between">
        <div class="space-y-2 text-left">
          <div class="flex justify-start text-md font-medium text-gray-500 dark:text-gray-300">
            <span>Jenis Surat</span>
          </div>
          <div class="text-3xl font-bold text-blue-800 dark:text-white">{{ $stats['jenis_surat'] }}</div>
        </div>

        <div class="p-4 bg-blue-100 rounded-full dark:bg-red-700">
          <i class="fa-solid fa-envelopes-bulk text-blue-600 dark:text-white text-4xl"></i>
        </div>
      </div>
    </div>

    <div class="relative p-6 rounded-2xl bg-white shadow-lg dark:bg-emerald-800">
      <div class="flex items-center justify-between">
        <div class="space-y-2 text-left">
          <div class="flex justify-start text-md font-medium text-gray-500 dark:text-gray-300">
            <span>Jabatan</span>
          </div>
          <div class="text-3xl font-bold text-emerald-800 dark:text-white">{{ $stats['jabatan'] }}</div>
        </div>

        <div class="p-4 bg-emerald-100 rounded-full dark:bg-emerald-700">
          <i class="fa-solid fa-user-tie text-emerald-600 dark:text-white text-4xl"></i>
        </div>
      </div>
    </div>

    <div class="relative p-6 rounded-2xl bg-white shadow-lg dark:bg-cyan-800">
      <div class="flex items-center justify-between">
        <div class="space-y-2 text-left">
          <div class="flex justify-start text-md font-medium text-gray-500 dark:text-gray-300">
            <span>User</span>
          </div>
          <div class="text-3xl font-bold text-cyan-600  dark:text-white">{{ $stats['users'] }}</div>
        </div>

        <div class="p-4 bg-cyan-100 rounded-full dark:bg-cyan-700">
          <i class="fa-solid fa-user text-cyan-800 dark:text-white text-4xl"></i>
        </div>
      </div>
    </div>
  </div>
@endsection
