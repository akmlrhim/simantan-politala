@extends('layouts.main')
@section('content')
  @if (!$logs->isEmpty())
    <div class="mb-4 sm:ml-6">
      <button type="button" title="Hapus"
        onclick="showDeleteModal('{{ route('profil.delete-log-aktivitas') }}', 'Yakin ingin menghapus semua log ?')"
        class="px-3 py-2 tracking-wide text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg shadow-md transition-all duration-200">
        Hapus Log Aktivitas
      </button>
    </div>
  @endif

  <x-confirm-delete />

  <div class="relative overflow-x-auto sm:px-6">
    @if ($logs->isEmpty())
      <div
        class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 p-12 shadow-md transition-shadow duration-300">
        <div class="text-center">
          <div
            class="w-16 h-16 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm">
            <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
              </path>
            </svg>
          </div>
          <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">
            Belum Ada Aktivitas
          </h3>
          <p class="text-gray-500 dark:text-gray-400 text-sm max-w-md mx-auto">
            Aktivitas akan muncul di sini setelah ada perubahan data dalam sistem. Semua tindakan anda akan tercatat
            secara otomatis.
          </p>
        </div>
      </div>
    @else
      @foreach ($logs as $log)
        <div
          class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 p-4 shadow-md transition-shadow duration-300 mb-4">
          <div class="flex items-start gap-3">
            <div class="flex-1 min-w-0">
              <div class="mb-4">
                <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                  @if ($log->action === 'created' && $log->new_data)
                    <span class="font-medium text-green-700 dark:text-green-400">Menambahkan</span> data baru pada
                    <span
                      class="font-semibold text-gray-900 dark:text-white bg-green-50 dark:bg-green-900/50 px-2 py-1 rounded-md text-xs shadow-sm border border-green-200 dark:border-green-800">
                      {{ ucfirst(str_replace('_', ' ', $log->table_name)) }}
                    </span>
                  @elseif ($log->action === 'updated' && $log->old_data && $log->new_data)
                    <span class="font-medium text-blue-700 dark:text-blue-400">Mengubah</span> data pada
                    <span
                      class="font-semibold text-gray-900 dark:text-white bg-blue-50 dark:bg-blue-900/50 px-2 py-1 rounded-md text-xs shadow-sm border border-blue-200 dark:border-blue-800">
                      {{ ucfirst(str_replace('_', ' ', $log->table_name)) }}
                    </span>
                  @elseif ($log->action === 'deleted' && $log->old_data)
                    <span class="font-medium text-red-700 dark:text-red-400">Menghapus</span> data pada
                    <span
                      class="font-semibold text-gray-900 dark:text-white bg-red-50 dark:bg-red-900/50 px-2 py-1 rounded-md text-xs shadow-sm border border-red-200 dark:border-red-800">
                      {{ ucfirst(str_replace('_', ' ', $log->table_name)) }}
                    </span>
                  @endif
                </p>
              </div>

              <div class="flex items-center gap-2 text-xs">
                <div
                  class="flex items-center gap-1.5 text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-700/50 px-2 py-1 rounded-md shadow-sm">
                  <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  <span>{{ $log->created_at->format('d M Y, H:i') }}</span>
                </div>
                <span class="text-gray-300 dark:text-gray-600">•</span>
                <span class="text-gray-500 dark:text-gray-400 text-xs">
                  {{ $log->created_at->diffForHumans() }}
                </span>
              </div>
            </div>

            <div class="flex-shrink-0">
              @if ($log->action === 'created')
                <span
                  class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300 border border-green-200 dark:border-green-800 shadow-sm">
                  Dibuat
                </span>
              @elseif ($log->action === 'updated')
                <span
                  class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300 border border-blue-200 dark:border-blue-800 shadow-sm">
                  Diperbarui
                </span>
              @elseif ($log->action === 'deleted')
                <span
                  class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-300 border border-red-200 dark:border-red-800 shadow-sm">
                  Dihapus
                </span>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    @endif
  </div>
@endsection
