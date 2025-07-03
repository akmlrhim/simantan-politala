@extends('layouts.main')

@section('content')
  <div class="flex ml-6 mb-3">
    <button data-modal-target="create-modal" data-modal-toggle="create-modal"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-xs px-3 py-2 tracking-wide focus:outline-none capitalize">
      Tambah Data
    </button>
  </div>

  <div class="relative overflow-x-auto shadow-lg rounded-md ml-6">
    <table class="w-full text-xs text-left rtl:text-right text-black dark:text-gray-400">
      <thead
        class="text-xs text-white uppercase bg-gray-800 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            No.
          </th>
          <th scope="col" class="px-6 py-3">
            Nama
          </th>
          <th scope="col" class="px-6 py-3">
            Aksi
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($jabatan as $j)
          <tr
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 font-medium">
            <td class="px-6 py-4" scope="row">
              {{ method_exists($jabatan, 'firstItem') ? $jabatan->firstItem() + $loop->index : $loop->iteration }}
            </td>
            <td class="px-6 py-4">{{ $j->nama }}</td>

            <td class="px-6 py-4">
              <button onclick="openEditModal({{ $j->id }}, '{{ $j->nama }}')"
                class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:text-blue-700">Edit</button>
              |
              <button
                onclick="showDeleteModal('{{ route('jabatan.destroy', $j->id) }}', 'Yakin ingin menghapus jabatan ?')"
                class="text-red-600 hover:text-red-900 dark:text-red-500 dark:hover:text-red-700">Hapus</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- modal konfirmasi hapus  --}}
  <x-confirm-delete />


  <div class="ml-6 mt-4 text-xs font-medium">
    {{ $jabatan->links() }}
  </div>

  {{-- create modal  --}}
  <div id="create-modal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black/30 backdrop-blur-sm backdrop-brightness-90">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
        <div
          class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
          <h3 class="text-md font-semibold text-gray-900 dark:text-white">
            Tambah Data Jabatan
          </h3>
          <button type="button" data-modal-hide="create-modal"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-toggle="create-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <form class="p-4 md:p-5" method="POST" action="{{ route('jabatan.store') }}">
          @csrf
          <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
              <label for="nama"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                jabatan </label>
              <input type="text" name="nama" id="nama"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-xs font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Masukkan nama jabatan" autocomplete="off" />
              @error('nama')
                <small class="text-red-500 font-medium text-xs mt-1">
                  {{ $message }}
                </small>
              @enderror
            </div>
          </div>
          <button data-modal-hide="create-modal" type="button"
            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Kembali</button>
          <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Simpan
          </button>
        </form>
      </div>
    </div>
  </div>
  {{-- end create modal  --}}


  {{-- edit modal  --}}
  <div id="edit-modal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black/30 backdrop-blur-sm backdrop-brightness-90">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
        <div
          class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
          <h3 class="text-md font-semibold text-gray-900 dark:text-white">
            Edit Data Jabatan
          </h3>
          <button type="button" onclick="closeEditModal()"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
              fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>

        <form class="p-4 md:p-5" method="POST" id="editForm" action="">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" id="edit_id" value="{{ old('id') }}">

          <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
              <label for="edit_nama"
                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                jabatan</label>
              <input type="text" name="nama" id="edit_nama"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-xs font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Masukkan nama jabatan" autocomplete="off"
                value="{{ old('nama') }}" />
              @error('nama')
                <small class="text-red-500 font-medium text-xs mt-1">
                  {{ $message }}
                </small>
              @enderror
            </div>
          </div>

          <button type="button" onclick="closeEditModal()"
            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
            Kembali
          </button>
          <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Simpan
          </button>
        </form>
      </div>
    </div>
  </div>
  {{-- end edit modal  --}}


  @push('scripts')
    <script>
      function openEditModal(id, nama) {
        const form = document.getElementById('editForm');
        const inputId = document.getElementById('edit_id');
        const inputNama = document.getElementById('edit_nama');
        const modal = document.getElementById('edit-modal');

        if (form && inputId && inputNama && modal) {
          form.action = `/jabatan/${id}`;
          inputId.value = id;
          inputNama.value = nama;

          modal.classList.remove('hidden');
          modal.classList.add('flex');
        }
      }

      function closeEditModal() {
        const modal = document.getElementById('edit-modal');
        if (modal) {
          modal.classList.add('hidden');
          modal.classList.remove('flex');
        }
      }

      // Tampilkan kembali modal jika terjadi error validasi saat update
      @if ($errors->any() && old('id'))
        document.addEventListener('DOMContentLoaded', function() {
          openEditModal({{ old('id') }}, @json(old('nama')));
        });
      @endif
    </script>
  @endpush
@endsection
