@extends('layouts.main')

@section('content')
  <div class="overflow-x-auto shadow-md">
    <div class="min-w-full inline-block align-middle">
      <div class="rounded-lg overflow-visible bg-white p-6 dark:border-neutral-700">
        <form action="{{ route('surat-masuk.update', $suratMasuk->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="grid gap-3">
            <div>
              <label for="perihal" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Perihal
              </label>
              <input type="text" name="perihal" id="perihal"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full md:w-3/4 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                placeholder="Masukkan perihal" value="{{ old('perihal', $suratMasuk->perihal) }}" autocomplete="off" />
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
                placeholder="Masukkan asal surat" value="{{ old('asal_surat', $suratMasuk->asal_surat) }}"
                autocomplete="off" />
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
                placeholder="Masukkan nomor surat" value="{{ old('nomor_surat', $suratMasuk->nomor_surat) }}"
                autocomplete="off" />
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
                placeholder="Pilih tanggal surat diterima"
                value="{{ old('tanggal_diterima', \Carbon\Carbon::parse($suratMasuk->tanggal_diterima)->format('Y-m-d')) }}"
                autocomplete="off">
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
                placeholder="Pilih tanggal surat"
                value="{{ old('tanggal_surat', \Carbon\Carbon::parse($suratMasuk->tanggal_surat)->format('Y-m-d')) }}"
                autocomplete="off">
              @error('tanggal_surat')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
            </div>

            <div>
              <label class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                Upload file surat
              </label>

              @if ($suratMasuk->file_surat)
                <div class="mt-3 text-sm text-gray-700 dark:text-gray-300">
                  <p class="mb-1">File sebelumnya:</p>
                  <div class="rounded-lg overflow-hidden mb-3">
                    <iframe src="{{ asset('storage/surat_masuk/' . $suratMasuk->file_surat) }}"
                      class="w-full sm:w-3/4 h-[500px]" frameborder="0">
                    </iframe>
                  </div>
                </div>
              @endif

              <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none sm:w-3/4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="file_input" type="file" name="file_surat" accept="application/pdf">
              @error('file_surat')
                <x-validation>{{ ucfirst($message) }}</x-validation>
              @enderror
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
@endsection
