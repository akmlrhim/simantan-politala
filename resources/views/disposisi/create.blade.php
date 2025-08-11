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
  </style>
@endpush

@section('content')
  <div class="overflow-x-auto sm:ml-6 shadow-md">
    <div class="min-w-full inline-block align-middle">
      <div class="shadow-md rounded-lg overflow-hidden dark:border-neutral-700 bg-white">
        <div class="container mx-auto p-4">
          <form action="{{ route('disposisi.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900">Pilih surat masuk untuk di disposisi</label>
              <div class="w-full md:w-3/4">
                <select name="surat_masuk_id" class="select2 w-full">
                  <option value="" selected>Pilih Surat Masuk</option>
                  @foreach ($suratMasuk as $surat)
                    <option value="{{ $surat->id }}">{{ $surat->nomor_surat }} - {{ $surat->perihal }}</option>
                  @endforeach
                </select>
                @error('surat_masuk_id')
                  <x-validation>{{ ucfirst($message) }}</x-validation>
                @enderror
              </div>
            </div>
            <div>
              <label for="nomor_agenda" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Nomor Agenda
              </label>
              <input type="text" name="nomor_agenda" id="nomor_agenda"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full md:w-3/4 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="Masukkan nomor agenda" value="{{ old('nomor_agenda') }}" autocomplete="off" />
              @error('nomor_agenda')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            {{-- tingkat surat  --}}
            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900">Tingkat Surat</label>
              <div class="flex flex-wrap gap-4">
                <label class="flex items-center space-x-2 cursor-pointer">
                  <input type="radio" name="tingkat_surat" value="biasa" class="text-blue-600 focus:ring-blue-500">
                  <span class="text-sm">Biasa</span>
                </label>

                <label class="flex items-center space-x-2 cursor-pointer">
                  <input type="radio" name="tingkat_surat" value="segera" class="text-blue-600 focus:ring-blue-500">
                  <span class="text-sm">Segera</span>
                </label>

                <label class="flex items-center space-x-2 cursor-pointer">
                  <input type="radio" name="tingkat_surat" value="rahasia" class="text-blue-600 focus:ring-blue-500">
                  <span class="text-sm">Rahasia</span>
                </label>

                @error('tingkat_surat')
                  <x-validation>{{ ucfirst($message) }}</x-validation>
                @enderror
              </div>
            </div>

            {{-- disposisi   --}}
            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900">Kepada /
                <span class="text-xs text-gray-600 italic">disposisi ini ditujukan kepada jabatan :</span>
              </label>
              <div
                class="border border-gray-300 rounded p-2 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">
                @foreach ($jabatan as $id => $item)
                  <label class="flex items-center space-x-1 cursor-pointer">
                    <input type="checkbox" name="kepada_jabatan_id[]" value="{{ $id }}"
                      class="text-blue-600 focus:ring-blue-500 rounded">
                    <span class="text-xs font-medium text-gray-600">{{ $item }}</span>
                  </label>
                @endforeach
              </div>
              @error('kepada_jabatan_id')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            {{-- instruksi_disposisi  --}}
            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900">
                Instruksi Disposisi
              </label>
              <div
                class="border border-gray-300 rounded p-2 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">
                @foreach ($instruksiList as $instruksi)
                  <label class="flex items-center space-x-1 cursor-pointer">
                    <input type="checkbox" name="instruksi_disposisi[]" value="{{ $instruksi }}"
                      class="text-blue-600 focus:ring-blue-500 rounded">
                    <span class="text-xs font-medium text-gray-600">{{ $instruksi }}</span>
                  </label>
                @endforeach

                <label class="flex items-center space-x-1 cursor-pointer">
                  <input type="checkbox" class="text-blue-600 focus:ring-blue-500 rounded"
                    onclick="this.nextElementSibling.disabled = !this.checked;">
                  <input type="text" name="instruksi_disposisi[]" placeholder="Instruksi lain..."
                    class="text-xs border-gray-300 rounded p-1 disabled:bg-gray-100" disabled>
                </label>

                <label class="flex items-center space-x-1 cursor-pointer">
                  <input type="checkbox" class="text-blue-600 focus:ring-blue-500 rounded"
                    onclick="this.nextElementSibling.disabled = !this.checked;">
                  <input type="text" name="instruksi_disposisi[]" placeholder="Instruksi lain..."
                    class="text-xs border-gray-300 rounded p-1 disabled:bg-gray-100" disabled>
                </label>

                <label class="flex items-center space-x-1 cursor-pointer">
                  <input type="checkbox" class="text-blue-600 focus:ring-blue-500 rounded"
                    onclick="this.nextElementSibling.disabled = !this.checked;">
                  <input type="text" name="instruksi_disposisi[]" placeholder="Instruksi lain..."
                    class="text-xs border-gray-300 rounded p-1 disabled:bg-gray-100" disabled>
                </label>
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
                class="w-full text-sm font-medium border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>




            {{-- submit  --}}
            <div class="flex justify-end space-x-2">
              <button type="submit"
                class="px-5 py-2 text-sm bg-gray-600 text-white font-medium rounded-lg shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                <a href="{{ route('disposisi.index') }}">Kembali</a>
              </button>
              <button type="submit"
                class="px-5 py-2 text-sm bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Kirim Disposisi
              </button>
            </div>

          </form>
        </div>
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
    </script>
  @endpush
@endsection
