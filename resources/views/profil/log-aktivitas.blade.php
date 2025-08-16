@extends('layouts.main')
@section('content')
  @if (!$logs->isEmpty())
    <div class="mb-4 sm:ml-6">
      <button type="button" title="Hapus"
        onclick="showDeleteModal('{{ route('profil.delete-log-aktivitas') }}', 'Yakin ingin menghapus semua log ?')"
        class="px-3 py-2 tracking-wide text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg">
        Hapus Log Aktivitas
      </button>
    </div>
  @endif

  <x-confirm-delete />

  <div class="relative overflow-x-auto sm:ml-6 sm:mr-6">
    @if ($logs->isEmpty())
      <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 p-12">
        <div class="text-center">
          <div
            class="w-16 h-16 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 rounded-full flex items-center justify-center mx-auto mb-4">
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
      <div class="space-y-3">
        @foreach ($logs as $log)
          <div class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 rounded-xl p-3 shadow-sm">
            <div class="flex items-start gap-2">
              <div class="flex-1 min-w-0">
                <div class="flex items-center gap-3 mb-2">

                  <span
                    class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-xs font-medium bg-gradient-to-r from-indigo-50 to-blue-50 dark:from-indigo-900 dark:to-blue-900 text-indigo-700 dark:text-indigo-300 border border-indigo-200 dark:border-indigo-800">
                    {{ ucfirst(str_replace('_', ' ', $log->table_name)) }}
                  </span>
                </div>

                <div class="mb-3">
                  <p class="text-gray-700 dark:text-gray-300 text-sm leading-relaxed">
                    @if ($log->action === 'created' && $log->new_data)
                      <span class="font-medium text-green-700 dark:text-green-400">Menambahkan</span> data baru
                      <span
                        class="font-semibold text-gray-900 dark:text-white bg-green-50 dark:bg-green-900 px-1.5 py-0.5 rounded text-xs">
                        {{ $log->new_data['nama'] ?? 'Item Baru' }}
                      </span>
                    @elseif ($log->action === 'updated' && $log->old_data && $log->new_data)
                      <span class="font-medium text-blue-700 dark:text-blue-400">Mengubah</span> data dari
                      <span
                        class="font-semibold text-gray-600 dark:text-gray-400 bg-gray-100 dark:bg-gray-700 px-1.5 py-0.5 rounded line-through text-xs">
                        {{ $log->old_data['nama'] ?? 'Data Lama' }}
                      </span>
                      menjadi
                      <span
                        class="font-semibold text-gray-900 dark:text-white bg-blue-50 dark:bg-blue-900 px-1.5 py-0.5 rounded text-xs">
                        {{ $log->new_data['nama'] ?? 'Data Baru' }}
                      </span>
                    @elseif ($log->action === 'deleted' && $log->old_data)
                      <span class="font-medium text-red-700 dark:text-red-400">Menghapus</span> data
                      <span
                        class="font-semibold text-gray-900 dark:text-white bg-red-50 dark:bg-red-900 px-1.5 py-0.5 rounded text-xs">
                        {{ $log->old_data['nama'] ?? 'Item Dihapus' }}
                      </span>
                    @endif
                  </p>
                </div>

                <div class="flex items-center gap-2 text-xs">
                  <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                  </svg>
                  <span class="text-gray-500 dark:text-gray-400">
                    {{ $log->created_at->format('d M Y, H:i') }}
                  </span>
                  <span class="text-gray-400 dark:text-gray-500">•</span>
                  <span class="text-gray-500 dark:text-gray-400">
                    {{ $log->created_at->diffForHumans() }}
                  </span>
                </div>
              </div>

              <div class="flex-shrink-0">
                @if ($log->action === 'created')
                  <span
                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 border border-green-200 dark:border-green-800">
                    Dibuat
                  </span>
                @elseif ($log->action === 'updated')
                  <span
                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 border border-blue-200 dark:border-blue-800">
                    Diperbarui
                  </span>
                @elseif ($log->action === 'deleted')
                  <span
                    class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300 border border-red-200 dark:border-red-800">
                    Dihapus
                  </span>
                @endif
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>
@endsection
