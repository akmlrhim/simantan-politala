@extends('layouts.main')

@section('content')
  <div class="overflow-x-auto sm:ml-6 shadow-md ">
    <div class="min-w-full inline-block align-middle">
      <div class="rounded-lg overflow-visible bg-white p-6 dark:border-neutral-700">
        <form action="{{ route('surat-masuk.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="grid gap-3">
            <div>
              <label for="perihal" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Perihal
              </label>
              <input type="text" name="perihal" id="perihal"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full md:w-3/4 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="Masukkan perihal" value="{{ old('perihal') }}" autocomplete="off" />
              @error('perihal')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            <div>
              <label for="asal_surat" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Asal Surat
              </label>
              <input type="text" name="asal_surat" id="asal_surat"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full md:w-3/4 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="Masukkan asal surat" value="{{ old('asal_surat') }}" autocomplete="off" />
              @error('asal_surat')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            <div>
              <label for="nomor_surat" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Nomor Surat
              </label>
              <input type="text" name="nomor_surat" id="nomor_surat"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full md:w-3/4 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="Masukkan nomor surat" value="{{ old('nomor_surat') }}" autocomplete="off" />
              @error('nomor_surat')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            <div>
              <label for="tanggal_diterima" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Tanggal Diterima
              </label>
              <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" type="text" id="tanggal_diterima"
                name="tanggal_diterima"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full md:w-3/4 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="Pilih tanggal surat diterima" value="{{ old('tanggal_diterima') }}">
              @error('tanggal_diterima')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            <div>
              <label for="tanggal_surat" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Tanggal Surat
              </label>
              <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" type="text" id="tanggal_surat"
                name="tanggal_surat"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full md:w-3/4 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="Pilih tanggal surat" value="{{ old('tanggal_surat') }}">
              @error('tanggal_surat')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Upload file surat
              </label>

              <label for="dropzone-file"
                class="flex flex-col items-center justify-center md:w-3/4 w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                id="dropzone-label">

                <div class="flex flex-col items-center justify-center pt-5 pb-6" id="dropzone-preview">
                  <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                  </svg>
                  <p class="mb-2 text-sm text-gray-500 dark:text-gray-400" id="file-label-text">
                    <span class="font-semibold">Click to upload</span> or drag and drop
                  </p>
                  <p class="text-xs text-gray-500 dark:text-gray-400">PDF (Max. 5 MB)</p>
                </div>

                <input id="dropzone-file" type="file" name="file_surat" class="hidden" accept="application/pdf" />
              </label>
            </div>


            <div class="flex gap-3">
              <a href="{{ route('surat-masuk.index') }}"
                class="text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2">
                Kembali
              </a>
              <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700">
                Simpan Data
              </button>
            </div>

          </div>
        </form>
      </div>
    </div>
  </div>

  @push('scripts')
    <script>
      document.getElementById('dropzone-file').addEventListener('change', function(e) {
        const labelText = document.getElementById('file-label-text');
        if (this.files.length > 0) {
          labelText.innerHTML = `<span class="font-semibold">File terpilih:</span> ${this.files[0].name}`;
        } else {
          labelText.innerHTML = `<span class="font-semibold">Click to upload</span> or drag and drop`;
        }
      });
    </script>
  @endpush
@endsection
