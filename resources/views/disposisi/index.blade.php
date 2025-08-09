@extends('layouts.main')
@section('content')
  <div class="flex flex-col md:flex-row md:items-center md:justify-between sm:ml-6 mb-3 gap-2">
    <a href="{{ route('disposisi.create') }}"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-3 py-2 tracking-wide focus:outline-none capitalize w-fit">
      Tambah Data
    </a>

    <form action="{{ route('disposisi.index') }}" method="GET" class="flex items-center gap-2 w-full md:w-auto">
      <input type="text" name="search" placeholder="Cari perihal, asal surat, atau nomor surat (Enter)"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full md:w-80 p-2 text-xs dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 font-medium"
        value="{{ request('search') }}" autocomplete="off">
    </form>
  </div>

  <div class="relative rounded-md shadow-md overflow-hidden sm:ml-6">
    <div class="overflow-x-auto">
      <table class="w-full text-xs md:text-sm text-left rtl:text-right text-black dark:text-gray-400">
        <thead class="text-white uppercase bg-gradient-to-r from-blue-600 to-blue-800">
          <tr class="border-b-2 text-xs border-gray-200">
            <th scope="col" class="px-6 py-3">Perihal</th>
            <th scope="col" class="px-6 py-3">No agenda</th>
            <th scope="col" class="px-6 py-3">tingkat surat</th>
            <th scope="col" class="px-6 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($disposisi as $row)
            <tr class="bg-white border-b-2 border-gray-200">
              <td class="px-6 py-3">
                {{ $row->perihal }} <br />
                <span class="text-xs text-gray-600">Asal Surat : {{ $row->asal_surat }}</span>
              </td>
              </td>
              <td class="px-6 py-3">{{ $row->nomor_agenda }}</td>
              <td class="px-6 py-3">{{ \Carbon\Carbon::parse($row->tanggal_diterima)->format('d-m-Y') }}</td>
              <td class="px-6 py-3">{{ \Carbon\Carbon::parse($row->tanggal_surat)->format('d-m-Y') }}</td>
              <td class="px-6 py-3">
                <button onclick="showFileModal('{{ asset('storage/surat_masuk/' . $row->file_surat) }}')"
                  data-modal-target="fileModal" data-modal-toggle="fileModal"
                  class="px-2 py-1 font-medium text-white bg-blue-500 rounded hover:bg-blue-600">
                  <i class="fa-solid fa-eye"></i>
                </button>
              </td>

              <td class="px-6 py-3 flex flex-wrap gap-2">
                <a href="{{ route('surat-masuk.edit', $row->id) }}">
                  <button class="px-2 py-1 font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </button>
                </a>
                <button
                  onclick="showDeleteModal('{{ route('surat-masuk.destroy', $row->id) }}', 'Yakin ingin menghapus ?')"
                  class="px-2 py-1 font-medium text-white bg-red-600 rounded hover:bg-red-700">
                  <i class="fa-solid fa-trash"></i>
                </button>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center px-6 py-3 text-gray-500">
                Tidak ada data dalam tabel.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>


  {{-- modal konfirmasi hapus  --}}
  <x-confirm-delete />
@endsection
