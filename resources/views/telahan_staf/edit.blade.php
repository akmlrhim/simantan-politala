@extends('layouts.main')

@push('css-libs')
  <link rel="stylesheet" href="{{ asset('select2.css') }}">
  <style>
    /* Select2 container styling using Tailwind via regular CSS */
    .select2-container--default .select2-selection--single {
      background-color: #f9fafb;
      border: 1px solid #d1d5db;
      border-radius: 0.5rem;
      height: 2.5rem !important;
      padding-left: 0.75rem;
      padding-right: 2.5rem;
      display: flex;
      align-items: center;
      font-size: 0.875rem;
      color: #111827;
    }

    .select2-selection__rendered {
      color: #111827;
      font-size: 0.875rem;
      line-height: 1.25rem;
    }

    .select2-selection__arrow {
      height: 100% !important;
      top: 0 !important;
      right: 0.75rem !important;
      width: 2rem !important;
      color: #6b7280;
    }

    .select2-dropdown {
      background-color: white;
      border: 1px solid #d1d5db;
      border-radius: 0.5rem;
      font-size: 0.875rem;
      z-index: 9999;
    }

    .select2-results__option {
      padding: 0.5rem 0.75rem;
      cursor: pointer;
    }

    .select2-results__option--selected {
      background-color: #dbeafe;
      color: #1e40af;
      font-weight: 600;
    }

    .select2-results__option--highlighted {
      background-color: #bfdbfe;
    }

    .select2-search--dropdown .select2-search__field {
      border: 1px solid #d1d5db;
      border-radius: 0.375rem;
      padding: 0.5rem 0.75rem;
      width: 100%;
    }

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
      min-height: 120px;
    }
  </style>
@endpush

@section('content')
  <div class="overflow-x-auto md:ml-6 shadow-md">
    <div class="min-w-full inline-block align-middle">
      <div class="rounded-lg overflow-visible bg-white p-6 dark:border-neutral-700">
        <form action="{{ route('telahan-staf.surat-masuk.update', $telahanStaf->id) }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" name="surat_masuk_id" value="{{ $suratMasuk->id }}">

          <div class="grid gap-3">
            <div class="flex flex-col md:flex-row md:items-center gap-2 md:gap-4 md:w-3/4">
              <label for="dari" class="text-sm font-bold text-gray-900 dark:text-white md:w-32">
                Dari
              </label>
              <div class="w-full md:w-3/4">
                <select class="select2 w-full" name="dari" id="dari">
                  @foreach ($jabatan as $id => $item)
                    <option value="{{ $id }}" {{ old('dari', $telahanStaf->dari) == $id ? 'selected' : '' }}>
                      {{ $item }}
                    </option>
                  @endforeach
                </select>

                @error('dari')
                  <x-validation class="mt-1 block text-sm text-red-600">{{ ucfirst($message) }}</x-validation>
                @enderror
              </div>
            </div>

            <div
              class="flex flex-col md:flex-row md:items-center gap-2 md:gap-4 md:w-3/4 border-b-2 border-gray-300 pb-4">
              <label for="perihal" class="text-sm font-bold text-gray-900 dark:text-white md:w-32">
                Perihal
              </label>
              <div class="w-full md:w-3/4">
                <select class="select2 w-full" name="perihal" id="perihal">
                  @foreach ($jenisSurat as $id => $item)
                    <option value="{{ $id }}"
                      {{ old('perihal', $telahanStaf->perihal) == $id ? 'selected' : '' }}>
                      {{ $item }}
                    </option>
                  @endforeach

                </select>

                @error('perihal')
                  <x-validation class="mt-1 block text-sm text-red-600">{{ ucfirst($message) }}</x-validation>
                @enderror
              </div>
            </div>

            {{-- DASAR   --}}
            <span class="font-bold text-black uppercase">I. Dasar</span>

            <div class="flex flex-col md:flex-row md:items-center gap-2 md:gap-4 md:w-3/4">
              <label class="text-sm font-bold text-gray-900 dark:text-white md:w-32">
                Asal Surat
              </label>
              <div class="w-full md:w-3/4">
                <input type="text" id="disabled-input" aria-label="disabled input"
                  class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  value="{{ $suratMasuk->asal_surat }}" disabled>
              </div>
            </div>

            <div class="flex flex-col md:flex-row md:items-center gap-2 md:gap-4 md:w-3/4">
              <label class="text-sm font-bold text-gray-900 dark:text-white md:w-32">
                Nomor Surat
              </label>
              <div class="w-full md:w-3/4">
                <input type="text" id="disabled-input" aria-label="disabled input"
                  class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  value="{{ $suratMasuk->nomor_surat }}" disabled>
              </div>
            </div>

            <div class="flex flex-col md:flex-row md:items-center gap-2 md:gap-4 md:w-3/4">
              <label class="text-sm font-bold text-gray-900 dark:text-white md:w-32">
                Tanggal Surat
              </label>
              <div class="w-full md:w-3/4">
                <input type="text" id="disabled-input" aria-label="disabled input"
                  class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  value="{{ \Carbon\Carbon::parse($suratMasuk->tanggal_surat)->format('d-m-Y') }}" disabled>
              </div>
            </div>

            <div
              class="flex flex-col md:flex-row md:items-center gap-2 md:gap-4 md:w-3/4 border-b-2 border-gray-300 pb-4">
              <label class="text-sm font-bold text-gray-900 dark:text-white md:w-32">
                Perihal
              </label>
              <div class="w-full md:w-3/4">
                <input type="text" id="disabled-input" aria-label="disabled input"
                  class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  value="{{ $suratMasuk->perihal }}" disabled>
              </div>
            </div>
            {{-- END DASAR  --}}

            <div>
              <label class="block mb-1 text-md uppercase font-bold text-gray-900 dark:text-white" for="isi">
                II. Isi
              </label>
              <textarea name="isi" id="isi_surat" class="editor" placeholder="Masukkan isi disini...">{{ old('isi', $telahanStaf->isi) }}</textarea>
              @error('isi')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            <div>
              <label class="block mb-1 text-md uppercase font-bold text-gray-900 dark:text-white" for="fakta_data">
                II. FAKTA DAN DATA
              </label>
              <textarea name="fakta_data" id="fakta_data" class="editor" placeholder="Masukkan fakta dan data disini...">{{ old('fakta_data', $telahanStaf->fakta_data) }}</textarea>
              @error('fakta_data')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            <div class="border-b-2 border-gray-300 pb-4">
              <label class="block mb-1 text-md uppercase font-bold text-gray-900 dark:text-white" for="saran_tindak">
                II. SARAN TINDAK
              </label>
              <textarea name="saran_tindak" class="editor" id="saran_tindak" placeholder="Masukkan saran tindak disini...">{{ old('saran_tindak', $telahanStaf->saran_tindak) }}</textarea>
              @error('saran_tindak')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            <div class="flex gap-3">
              <a href="{{ route('telahan-staf.index') }}"
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
    <script src="{{ asset('jquery.js') }}"></script>
    <script src="{{ asset('select2.js') }}"></script>
    <script src="{{ asset('editor.js') }}"></script>

    <script>
      $(document).ready(function() {
        $('.select2').select2({
          width: '100%'
        });
      });

      document.querySelectorAll('.editor').forEach((el) => {
        ClassicEditor
          .create(el, {
            toolbar: [
              'heading', 'justify', '|',
              'bold', 'italic', 'link', '|',
              'bulletedList', 'numberedList', '|',
              'insertTable', '|',
              'undo', 'redo'
            ],
            table: {
              contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
            }
          })
      });
    </script>
  @endpush
@endsection
