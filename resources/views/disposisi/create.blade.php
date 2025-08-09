@extends('layouts.main')
@section('content')
  <div class="overflow-x-auto sm:ml-6 shadow-md">
    <div class="min-w-full inline-block align-middle">
      <div class="shadow-md rounded-lg overflow-hidden dark:border-neutral-700 bg-white">
        <div class="container mx-auto p-4">
          <form action="{{ route('disposisi.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
              <label class="block mb-1 text-sm font-medium text-gray-700">Surat Masuk</label>
              <select name="surat_masuk_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full md:w-3/4 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @foreach ($suratMasuk as $surat)
                  <option value="{{ $surat->id }}">{{ $surat->nomor_surat }} - {{ $surat->perihal }}</option>
                @endforeach
              </select>
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

            <div>
              <label class="block mb-1 text-sm font-medium text-gray-700" for="tingkat_surat">Tingkat Surat</label>
              <select name="tingkat_surat"
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full md:w-3/4 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="biasa">Biasa</option>
                <option value="segera">Segera</option>
                <option value="rahasia">Rahasia</option>
              </select>
            </div>

            {{-- Catatan --}}
            <div>
              <label class="block mb-1 text-sm font-medium text-gray-700">Catatan</label>
              <textarea name="catatan" rows="3"
                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            <div>
              <label class="block mb-1 text-sm font-medium text-gray-700">Kepada</label>
              <div class="max-h-32 overflow-y-auto border rounded p-2 space-y-1">
                @foreach ($jabatan as $id => $item)
                  <label class="flex items-center space-x-1 cursor-pointer">
                    <input type="checkbox" name="kepada[]" value="{{ $id }}"
                      class="text-blue-600 focus:ring-blue-500 rounded">
                    <span class="text-sm">{{ $user->name }}
                      <span class="text-gray-500 text-xs">({{ $user->jabatan->nama }})</span>
                    </span>
                  </label>
                @endforeach
              </div>
            </div>


            {{-- Tombol Submit --}}
            <div class="flex justify-end space-x-2">
              <button type="submit"
                class="px-5 py-2 text-sm bg-gray-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
@endsection
