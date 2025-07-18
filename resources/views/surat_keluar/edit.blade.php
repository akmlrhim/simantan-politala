@extends('layouts.main')

@push('css-libs')
  <style>
    .ck-editor__editable ol {
      list-style: decimal;
      margin-left: 1.5rem;
    }

    .ck-editor__editable ul {
      list-style: disc;
      margin-left: 1.5rem;
    }

    .ck-editor__editable {
      white-space: pre-wrap;
      padding: 1rem;
      margin: 0;
      line-height: 1.5;
      font-size: 14px;
    }

    .ck-editor__editable_inline {
      min-height: 240px;
    }
  </style>
@endpush

@section('content')
  <div class="m-1.5 overflow-x-auto md:ml-5 md:mr-3">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div
        class="shadow-md rounded-lg overflow-visible bg-white p-6 dark:border-neutral-700">
        <form action="{{ route('surat-keluar.update', $suratKeluar->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="grid gap-6">
            <div>
              <label for="nomor_surat"
                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Nomor Surat
              </label>
              <input type="text" name="nomor_surat" id="nomor_surat"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full md:w-3/4 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="Masukkan nomor surat"
                value="{{ old('nomor_surat', $suratKeluar->nomor_surat) }}"
                autocomplete="off" />
              @error('nomor_surat')
                <small class="text-red-500 font-medium text-xs mt-1 capitalize">
                  {{ $message }}
                </small>
              @enderror
            </div>

            <div>
              <label for="hal"
                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Hal
              </label>
              <input type="text" name="hal" id="hal"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full md:w-3/4 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="Masukkan hal" value="{{ old('hal', $suratKeluar->hal) }}"
                autocomplete="off" />
              @error('hal')
                <small class="text-red-500 font-medium text-xs mt-1 capitalize">
                  {{ $message }}
                </small>
              @enderror
            </div>

            <div>
              <label for="tanggal_surat"
                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Tanggal Surat
              </label>
              <input type="date" name="tanggal_surat" id="tanggal_surat"
                onclick="this.showPicker()"
                class="block w-full md:w-3/4 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-600 focus:border-blue-600 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
                placeholder="Pilih tanggal surat"
                value="{{ old('tanggal_surat', \Carbon\Carbon::parse($suratKeluar->tanggal_surat)->format('Y-m-d')) }}"
                autocomplete="off" />

              @error('tanggal_surat')
                <small class="text-red-500 font-medium text-xs mt-1 capitalize">
                  {{ $message }}
                </small>
              @enderror
            </div>

            <div class="mb-6">
              <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white"
                for="isi_surat">
                Isi Surat
              </label>
              <textarea name="isi_surat" id="isi_surat" placeholder="Masukkan isi surat disini...">{{ old('isi_surat', $suratKeluar->isi_surat) }}</textarea>
              @error('isi_surat')
                <small class="text-red-500 font-medium text-xs mt-1 capitalize">
                  {{ $message }}
                </small>
              @enderror
            </div>
          </div>

          <div class="flex gap-3">
            <a href="{{ route('surat-keluar.index') }}"
              class="text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2">
              Kembali
            </a>
            <button type="submit"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700">
              Simpan Data
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @push('scripts')
    <script src="{{ asset('editor.js') }}"></script>
    <script>
      ClassicEditor
        .create(document.querySelector('#isi_surat'))
    </script>
  @endpush
@endsection
