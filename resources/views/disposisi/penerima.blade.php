@extends('layouts.main')

@section('content')
  <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-3 gap-2">
    <a href="{{ route('disposisi.index') }}"
      class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-md text-xs px-3 py-2 tracking-wide focus:outline-none capitalize w-fit">
      <i class="fa-solid fa-angle-left mr-2"></i> Kembali ke daftar disposisi
    </a>
  </div>

  <div class="relative rounded-lg shadow-lg overflow-hidden bg-white">
    <div class="overflow-x-auto">
      <table class="w-full text-xs sm:text-sm font-medium text-left rtl:text-right text-black dark:text-gray-400">
        <thead class="uppercase text-xs bg-gradient-to-r from-blue-600 to-blue-800 text-white">
          <tr class="whitespace-nowrap">
            <th class="px-6 py-3">Data surat masuk</th>
            <th class="px-6 py-3">No Agenda</th>
            <th class="px-6 py-3">Tingkat Surat</th>
            <th class="px-6 py-3">Status</th>
            <th class="px-6 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($disposisiPenerima as $row)
            <tr class="bg-white border-b-2 border-gray-200 whitespace-nowrap">
              <td class="px-6 py-3">
                {{ $row->disposisi->suratMasuk->perihal }} <br />
                <span class="text-xs text-gray-600">Asal Surat : {{ $row->disposisi->suratMasuk->asal_surat }}</span>
              </td>
              <td class="px-6 py-3">{{ $row->disposisi->nomor_agenda }}</td>
              <td class="px-6 py-3 capitalize">
                <x-badge type="tingkat_surat" value="{{ $row->disposisi->tingkat_surat }}" />
              </td>
              <td class="px-6 py-3 wrap">
                @if ($row->status == 'Diterima')
                  <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">
                    <i class="fa-solid fa-circle-check"></i>
                    Diterima
                  </span>
                @else
                  <button type="button" title="Confirm"
                    onclick="showConfirmModal('{{ route('disposisi.update-status', $row->id) }}', 'Tandai disposisi ini sebagai Diterima ?')"
                    class="px-2 py-1 font-medium text-xs text-white bg-green-900 hover:bg-green-800 rounded-lg">
                    <i class="fa-solid fa-circle-check"></i> Tandai sebagai diterima
                  </button>
                @endif
              </td>

              @if ($row->disposisi && $row->disposisi->id)
                <td class="px-6 py-3">
                  <a href="{{ route('disposisi.detail', $row->disposisi->id) }}">
                    <button type="button" title="Detail"
                      class="px-2 py-1 font-medium text-xs text-white bg-blue-900 hover:bg-blue-800 rounded-lg">
                      <i class="fa-solid fa-circle-info"></i> Detail
                    </button>
                  </a>
                </td>
              @endif
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center px-6 py-4 text-gray-500">
                Tidak ada data dalam tabel.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>


  {{-- confirm modal  --}}
  <div id="confirmModal"
    class="hidden fixed inset-0 z-50 justify-center items-center bg-black/30 backdrop-blur-sm backdrop-brightness-90">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
        <button type="button" onclick="closeConfirmModal()"
          class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
          <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
          </svg>
        </button>

        <div class="p-4 md:p-5 text-center">
          <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          <h3 class="mb-5 text-sm font-medium text-gray-500 dark:text-gray-400" id="confirmMessage">
            Tandai dispisisi sebagai "Diterima" ?
          </h3>

          <form id="confirmForm" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit"
              class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
              Ya, Terima
            </button>
            <button type="button" onclick="closeConfirmModal()"
              class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
              Batal
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
