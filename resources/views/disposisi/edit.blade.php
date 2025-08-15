@extends('layouts.main')

@section('content')
  <div class="overflow-x-auto sm:ml-6 shadow-md">
    <div class="min-w-full inline-block align-middle">
      <div class="shadow-md rounded-lg overflow-hidden dark:border-neutral-700 bg-white">
        <div class="container mx-auto p-4">

          {{-- Rincian Surat Masuk --}}
          <div class="space-y-4">
            <h2
              class="text-lg font-semibold text-gray-800 dark:text-gray-200 capitalize border-b border-gray-200 dark:border-gray-700">
              Rincian Surat Masuk
            </h2>

            <div class="flex flex-col md:flex-row md:items-center gap-2">
              <label class="text-sm font-medium text-gray-700 dark:text-gray-300 md:w-32">Asal Surat</label>
              <input type="text"
                class="flex-1 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg p-2 text-sm text-gray-900 dark:text-gray-300 cursor-not-allowed"
                value="{{ $disposisi->suratMasuk->asal_surat }}" disabled>
            </div>

            <div class="flex flex-col md:flex-row md:items-center gap-2">
              <label class="text-sm font-medium text-gray-700 dark:text-gray-300 md:w-32">Nomor Surat</label>
              <input type="text"
                class="flex-1 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg p-2 text-sm text-gray-900 dark:text-gray-300 cursor-not-allowed"
                value="{{ $disposisi->suratMasuk->nomor_surat }}" disabled>
            </div>

            <div class="flex flex-col md:flex-row md:items-center gap-2">
              <label class="text-sm font-medium text-gray-700 dark:text-gray-300 md:w-32">Tanggal Surat</label>
              <input type="text"
                class="flex-1 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg p-2 text-sm text-gray-900 dark:text-gray-300 cursor-not-allowed"
                value="{{ \Carbon\Carbon::parse($disposisi->suratMasuk->tanggal_surat)->format('d-m-Y') }}" disabled>
            </div>

            <div class="flex flex-col md:flex-row md:items-center gap-2">
              <label class="text-sm font-medium text-gray-700 dark:text-gray-300 md:w-32">Perihal</label>
              <input type="text"
                class="flex-1 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg p-2 text-sm text-gray-900 dark:text-gray-300 cursor-not-allowed"
                value="{{ $disposisi->suratMasuk->perihal }}" disabled>
            </div>

            <div class="flex flex-col md:flex-row md:items-center gap-2">
              <label class="text-sm font-medium text-gray-700 dark:text-gray-300 md:w-32">File</label>
              <button onclick="showFileModal('{{ asset('storage/surat_masuk/' . $disposisi->suratMasuk->file_surat) }}')"
                data-modal-target="fileModal" data-modal-toggle="fileModal"
                class="w-1/4 px-2 py-1 text-xs font-medium text-blue-600 bg-white hover:text-blue-900 rounded-lg flex items-center gap-1">
                <i class="fa-solid fa-eye"></i> Lihat File
              </button>
            </div>
          </div>
          {{--  --}}

          <form action="{{ route('disposisi.update', $disposisi->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <h2
              class="text-lg font-semibold text-gray-800 dark:text-gray-200 capitalize border-b border-gray-200 dark:border-gray-700 mt-6">
              Form Disposisi
            </h2>

            <div>
              <label for="nomor_agenda" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Nomor Agenda
              </label>
              <input type="text" name="nomor_agenda" id="nomor_agenda"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full md:w-3/4 p-2 text-sm  dark:text-white"
                placeholder="Masukkan nomor agenda" value="{{ old('nomor_agenda', $disposisi->nomor_agenda) }}"
                autocomplete="off" />
              @error('nomor_agenda')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>


            {{-- tingkat surat  --}}
            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900">Tingkat Surat</label>
              <div class="flex flex-wrap gap-4">
                <label class="flex items-center space-x-2 cursor-pointer">
                  <input type="radio" name="tingkat_surat" value="biasa"
                    {{ old('tingkat_surat', $disposisi->tingkat_surat) == 'biasa' ? 'checked' : '' }}
                    class="text-blue-600 focus:ring-blue-500">
                  <span class="text-sm">Biasa</span>
                </label>

                <label class="flex items-center space-x-2 cursor-pointer">
                  <input type="radio" name="tingkat_surat" value="terbatas"
                    {{ old('tingkat_surat', $disposisi->tingkat_surat) == 'terbatas' ? 'checked' : '' }}
                    class="text-blue-600 focus:ring-blue-500">
                  <span class="text-sm">Terbatas</span>
                </label>

                <label class="flex items-center space-x-2 cursor-pointer">
                  <input type="radio" name="tingkat_surat" value="rahasia"
                    {{ old('tingkat_surat', $disposisi->tingkat_surat) == 'rahasia' ? 'checked' : '' }}
                    class="text-blue-600 focus:ring-blue-500">
                  <span class="text-sm">Rahasia</span>
                </label>
              </div>
              @error('tingkat_surat')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>
            {{--  --}}


            {{-- disposisi ke siapa   --}}
            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900">
                Kepada /
                <span class="text-xs text-gray-600 italic">disposisi ini ditujukan kepada jabatan :</span>
              </label>

              @php
                $selectedJabatan =
                    old('kepada_jabatan_id') ?? $disposisi->disposisiPenerima->pluck('kepada_jabatan_id')->toArray();
              @endphp

              <div
                class="border border-gray-300 rounded p-2 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">
                @foreach ($jabatan as $id => $item)
                  <label class="flex items-center space-x-1 cursor-pointer">
                    <input type="checkbox" name="kepada_jabatan_id[]" value="{{ $id }}"
                      {{ in_array($id, $selectedJabatan) ? 'checked' : '' }}
                      class="text-blue-600 focus:ring-blue-500 rounded">
                    <span class="text-xs font-medium text-gray-600">{{ $item }}</span>
                  </label>
                @endforeach
              </div>

              @error('kepada_jabatan_id')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>
            {{--  --}}


            {{-- instruksi_disposisi  --}}
            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900">
                Instruksi Disposisi
              </label>

              <div
                class="border border-gray-300 rounded p-2 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">

                @php
                  $selectedInstruksi = old('instruksi_disposisi', $disposisi->instruksi_disposisi ?? []);

                  if (!is_array($selectedInstruksi)) {
                      $selectedInstruksi = [];
                  }

                  $manualInstruksi = array_values(array_diff($selectedInstruksi, $instruksiList));
                @endphp

                @foreach ($instruksiList as $instruksi)
                  <label class="flex items-center space-x-1 cursor-pointer">
                    <input type="checkbox" name="instruksi_disposisi[]" value="{{ $instruksi }}"
                      {{ in_array($instruksi, $selectedInstruksi) ? 'checked' : '' }}
                      class="text-blue-600 focus:ring-blue-500 rounded">
                    <span class="text-xs font-medium text-gray-600">{{ $instruksi }}</span>
                  </label>
                @endforeach

                @for ($i = 0; $i < 3; $i++)
                  @php
                    $manualVal = $manualInstruksi[$i] ?? '';
                  @endphp
                  <label class="flex items-center space-x-1 cursor-pointer">
                    <input type="checkbox" class="text-blue-600 focus:ring-blue-500 rounded"
                      onclick="this.nextElementSibling.disabled = !this.checked;" {{ $manualVal ? 'checked' : '' }}>
                    <input type="text" name="instruksi_disposisi[]" placeholder="Instruksi lain..."
                      value="{{ $manualVal }}" class="text-xs w-full border-gray-300 rounded p-1 disabled:bg-gray-100"
                      {{ $manualVal ? '' : 'disabled' }}>
                  </label>
                @endfor

              </div>

              @error('instruksi_disposisi')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>
            {{-- end instruksi disposisi  --}}

            {{-- catatan  --}}
            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900">Catatan</label>
              <textarea name="catatan" rows="5" placeholder="Masukkan catatan (opsional..)"
                class="w-full text-sm font-medium border-gray-300 rounded-l">{{ old('catatan', $disposisi->catatan) }}</textarea>
            </div>


            {{-- submit  --}}
            <div class="flex justify-start space-x-2">
              <a href="{{ route('disposisi.index') }}"
                class="px-5 py-2 text-sm bg-gray-600 text-white font-medium rounded-lg shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Kembali
              </a>

              <button type="submit"
                class="px-5 py-2 text-sm bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Simpan
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
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

  @push('scripts')
    <script>
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
