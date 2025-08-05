@extends('layouts.main')

@section('content')
  <div class="flex sm:px-6 mb-3">
    <button data-modal-target="create-modal" data-modal-toggle="create-modal"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-3 py-2 tracking-wide focus:outline-none capitalize">
      Tambah Data
    </button>
  </div>

  <div class="relative overflow-x-auto shadow-lg rounded-md sm:ml-6">
    <table class="w-full text-xs md:text-sm text-left rtl:text-right text-black dark:text-gray-400">
      <thead class="text-black uppercase bg-white md:text-sm text-xs">
        <tr>
          <th scope="col" class="px-6 py-2">No.</th>
          <th scope="col" class="px-6 py-2">Nama</th>
          <th scope="col" class="px-6 py-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($jenisSurat as $j)
          <tr class="bg-white border-b border-gray-200 md:text-sm text-xs">
            <td class="px-6 py-2" scope="row">
              {{ method_exists($jenisSurat, 'firstItem') ? $jenisSurat->firstItem() + $loop->index : $loop->iteration }}
            </td>
            <td class="px-6 py-2">{{ $j->nama }}</td>
            <td class="px-6 py-2 flex gap-2">
              <button onclick="openEditModal({{ $j->id }}, '{{ $j->nama }}')" title="Edit"
                class="px-2 py-1 font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600">
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
              <button title="Hapus"
                onclick="showDeleteModal('{{ route('jenis-surat.destroy', $j->id) }}', 'Yakin ingin menghapus jenis surat ?')"
                class="px-2 py-1 font-medium text-white bg-red-600 rounded hover:bg-red-700">
                <i class="fa-solid fa-trash"></i>
              </button>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="text-center px-6 py-4 text-gray-500">
              Tidak ada data dalam tabel.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>


  {{-- modal konfirmasi hapus  --}}
  <x-confirm-delete />


  <div class="ml-6 mt-4 text-sm font-medium">
    {{ $jenisSurat->links() }}
  </div>

  {{-- create modal  --}}
  <div id="create-modal" tabindex="-1" aria-hidden="true"
    class="hidden fixed inset-0 z-50 flex justify-center items-center bg-black/30 backdrop-blur-sm backdrop-brightness-90">
    <div class="relative p-4 w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
          <h3 class="text-md font-semibold text-gray-900 dark:text-white">
            Tambah Data Jenis Surat
          </h3>
          <button type="button" data-modal-hide="create-modal"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-toggle="create-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <form class="p-4 md:p-5" method="POST" action="{{ route('jenis-surat.store') }}">
          @csrf
          <input type="hidden" name="form_type" value="create">
          <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
              <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                Surat </label>
              <input type="text" name="nama" id="nama"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Masukkan jenis surat" autocomplete="off" value="{{ old('nama') }}" />
              @error('nama')
                <x-validation> {{ ucfirst($message) }}</x-validation>
              @enderror
            </div>
          </div>
          <button data-modal-hide="create-modal" type="button"
            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Kembali</button>
          <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
          <h3 class="text-md font-semibold text-gray-900 dark:text-white">
            Edit Data Jenis Surat
          </h3>
          <button type="button" onclick="closeEditModal()"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>

        <form class="p-4 md:p-5" method="POST" id="editForm" action="">
          @csrf
          @method('PUT')
          <input type="hidden" name="form_type" value="edit">
          <input type="hidden" name="id" id="edit_id" value="{{ old('id') }}">

          <div class="grid gap-4 mb-4 grid-cols-2">
            <div class="col-span-2">
              <label for="edit_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                Surat</label>
              <input type="text" name="nama" id="edit_nama"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                placeholder="Masukkan jenis surat" autocomplete="off" value="{{ old('nama') }}" />
              @error('nama')
                <small class="text-red-500 font-medium text-sm mt-1 capitalize">
                  {{ $message }}
                </small>
              @enderror
            </div>
          </div>

          <button type="button" onclick="closeEditModal()"
            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
            Kembali
          </button>
          <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
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
          form.action = `/jenis-surat/${id}`;
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

      function openCreateModal() {
        const modal = document.getElementById("create-modal");
        if (modal) {
          modal.classList.remove("hidden");
          modal.classList.add("flex");
        }
      }

      // Buka modal sesuai error validasi
      document.addEventListener('DOMContentLoaded', function() {
        @if ($errors->any())
          @if (old('form_type') === 'edit')
            openEditModal({{ old('id') }},
              @json(old('nama'))); // buka modal edit
          @elseif (old('form_type') === 'create')
            openCreateModal(); // buka modal create
          @endif
        @endif
      });
    </script>
  @endpush
@endsection
