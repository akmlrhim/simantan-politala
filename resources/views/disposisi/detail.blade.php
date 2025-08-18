@extends('layouts.main')

@section('content')
  <div class="relative overflow-x-auto shadow-lg rounded-md sm:ml-6 bg-white p-6 space-y-3">
    <div>
      <h3 class="text-lg font-semibold text-gray-700 mb-2">Informasi Surat Masuk</h3>
      <table class="w-full text-sm text-gray-700">
        <tr>
          <td class="py-1 font-medium">Nomor Surat</td>
          <td>: {{ $disposisi->suratMasuk->nomor_surat ?? '-' }}</td>
        </tr>
        <tr>
          <td class="py-1 font-medium">Perihal</td>
          <td>: {{ $disposisi->suratMasuk->perihal ?? '-' }}</td>
        </tr>
        <tr>
          <td class="py-1 font-medium">Asal Surat</td>
          <td>: {{ $disposisi->suratMasuk->asal_surat ?? '-' }}</td>
        </tr>
        <tr>
          <td class="py-1 font-medium">Tanggal Surat</td>
          <td>:
            {{ \Carbon\Carbon::parse($disposisi->suratMasuk->tanggal_surat)->translatedFormat('l, d F Y') ?? '-' }}
          </td>
        </tr>
        <tr>
          <td class="py-1 font-medium">Tanggal Diterima</td>
          <td>:
            {{ \Carbon\Carbon::parse($disposisi->suratMasuk->tanggal_diterima)->translatedFormat('l, d F Y') ?? '-' }}
          </td>
        </tr>
        <tr>
          <td class="py-1 font-medium">File Surat</td>
          <td>
            @if ($disposisi->suratMasuk->file_surat)
              <button onclick="showFileModal('{{ asset('storage/surat_masuk/' . $disposisi->suratMasuk->file_surat) }}')"
                data-modal-target="fileModal" data-modal-toggle="fileModal"
                class="w-1/4 px-2 py-1 text-xs font-medium text-blue-600 bg-white hover:text-blue-900 rounded-lg flex items-center gap-1">
                <i class="fa-solid fa-eye"></i> Lihat File
              </button>
            @else
              <span class="text-gray-500">Tidak ada</span>
            @endif
          </td>
        </tr>
      </table>
    </div>

    <div>
      <h3 class="text-lg font-semibold text-gray-700 mb-2">Informasi Disposisi</h3>
      <table class="w-full text-sm text-gray-700">
        <tr>
          <td class="py-1 font-medium">Nomor Agenda</td>
          <td>: {{ $disposisi->nomor_agenda }}</td>
        </tr>
        <tr>
          <td class="py-1 font-medium">Tingkat Surat</td>
          <td class="capitalize">:
            <x-badge type="tingkat_surat" value="{{ $disposisi->tingkat_surat }}" />
          </td>
        </tr>

        <tr>
          <td class="py-1 font-medium">Instruksi Disposisi</td>
          <td>:
            @php
              $instruksiList = is_array($disposisi->instruksi_disposisi)
                  ? $disposisi->instruksi_disposisi
                  : json_decode($disposisi->instruksi_disposisi, true);

              $instruksiString = !empty($instruksiList) ? implode(', ', $instruksiList) : 'Tidak ada instruksi';
            @endphp

            {{ $instruksiString }}
          </td>
        </tr>

        <tr>
          <td class="py-1 font-medium">Catatan</td>
          <td>: {{ $disposisi->catatan ?? '-' }}</td>
        </tr>
        <tr>
          <td class="py-1 font-medium">Dibuat Oleh</td>
          <td>: {{ $disposisi->user->nama ?? '-' }} / {{ $disposisi->user->jabatan->nama }}</td>
        </tr>
      </table>
    </div>

    @if (Auth::user()->role == 'Sespim/Direktur')
      <div>
        <h3 class="text-lg font-semibold text-gray-700 mb-2">Penerima Disposisi</h3>
        <div class="relative overflow-x-auto rounded-sm">
          <table class="w-full text-sm text-left rtl:text-right text-black dark:text-gray-400">
            <thead class="text-white text-xs font-semibold uppercase bg-gradient-to-r from-blue-600 to-blue-800">
              <tr>
                <th scope="col" class="px-6 py-2">No.</th>
                <th scope="col" class="px-6 py-2">Kepada</th>
                <th scope="col" class="px-6 py-2">Tanggal diterima</th>
                <th scope="col" class="px-6 py-2">status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($disposisi->disposisiPenerima as $index => $row)
                <tr class="bg-white border-b border-gray-200">
                  <td class="px-6 py-2">{{ $index + 1 }}</td>
                  <td class="px-6 py-2">{{ $row->jabatan->nama }}</td>
                  <td class="px-6 py-2">
                    {{ $row->diterima_tanggal ? \Carbon\Carbon::parse($row->diterima_tanggal)->translatedFormat('d F Y') : '-' }}
                  </td>
                  <td class="px-6 py-2">
                    @if ($row->status == 'Diterima')
                      <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">
                        <i class="fa-solid fa-circle-check"></i>
                        Diterima
                      </span>
                    @else
                      <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">
                        <i class="fa-solid fa-paper-plane"></i>
                        Dikirim
                      </span>
                    @endif
                  </td>
                </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    @endif

    <div class="flex justify-start mt-4">
      @if (Auth::user()->role == 'Sespim/Direktur')
        <a href="{{ route('disposisi.index') }}"
          class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm rounded-md">
          Kembali
        </a>
      @else
        <a href="{{ route('disposisi.penerima') }}"
          class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm rounded-md">
          Kembali
        </a>
      @endif

    </div>


    {{-- modal file surat  --}}
    <div id="fileModal" tabindex="-1" aria-hidden="true"
      class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-full max-w-6xl max-h-full">
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
          <div
            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
              File Surat Masuk
            </h3>
            <button type="button"
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
              data-modal-hide="fileModal">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <div class="p-4 md:p-5 space-y-4">
            <div id="fileViewer" class="w-full h-[500px]">
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- / --}}


  </div>

  @push('scripts')
    <script src="{{ asset('jquery.js') }}"></script>
    <script src="{{ asset('select2.js') }}"></script>
    <script src="{{ asset('editor.js') }}"></script>

    <script>
      $(document).ready(function() {
        $('.select2').select2({
          width: '100%'
        });
      });

      function showFileModal(fileUrl) {
        const modal = document.getElementById('fileModal');
        const viewer = document.getElementById('fileViewer');

        const extension = fileUrl.split('.').pop().toLowerCase();

        if (['pdf', 'jpg', 'jpeg', 'png', 'gif'].includes(extension)) {
          viewer.innerHTML = `<iframe src="${fileUrl}" class="w-full h-full" frameborder="0"></iframe>`;
        } else {
          viewer.innerHTML =
            `<p class="text-gray-700">File tidak dapat ditampilkan, <a href="${fileUrl}" target="_blank" class="text-blue-600 underline">klik di sini untuk mengunduh</a>.</p>`;
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
      }
    </script>
  @endpush
@endsection
