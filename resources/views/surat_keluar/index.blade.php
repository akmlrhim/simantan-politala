@extends('layouts.main')

@section('content')
  <div class="flex sm:px-6 mb-3">
    <a href="{{ route('surat-keluar.create') }}"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-3 py-2 tracking-wide focus:outline-none capitalize">
      Tambah Data
    </a>
  </div>

  <div class="relative overflow-x-auto shadow-lg rounded-md sm:ml-6">
    <table class="w-full text-xs md:text-sm text-left rtl:text-right text-black dark:text-gray-400">
      <thead class="text-black uppercase bg-white">
        <tr class="border-b-2 border-gray-200">
          <th scope="col" class="px-6 py-3">No.</th>
          <th scope="col" class="px-6 py-3">Nomor Surat</th>
          <th scope="col" class="px-6 py-3">Hal</th>
          <th scope="col" class="px-6 py-3">Tanggal Surat</th>
          <th scope="col" class="px-6 py-3">Dokumen</th>
          <th scope="col" class="px-6 py-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($suratKeluar as $row)
          <tr class="bg-white border-b-2 border-gray-200">
            <td class="px-6 py-3" scope="row">
              {{ method_exists($suratKeluar, 'firstItem') ? $suratKeluar->firstItem() + $loop->index : $loop->iteration }}
            </td>
            <td class="px-6 py-3">{{ $row->nomor_surat }}</td>
            <td class="px-6 py-3">{{ $row->hal }}</td>
            <td class="px-6 py-3">
              {{ \Carbon\Carbon::parse($row->tanggal_surat)->format('d-m-Y') }}
            </td>
            <td class="px-6 py-3">
              <a href="{{ route('surat-keluar.file', $row->id) }}" target="_blank">
                <button title="Lihat File" type="button"
                  class="px-2 py-1 font-medium text-white bg-blue-500 rounded hover:bg-blue-600">
                  <i class="fa-solid fa-eye"></i>
                </button>
              </a>
            </td>

            <td class="px-6 py-3 flex gap-2">
              <a href="{{ route('surat-keluar.edit', $row->id) }}">
                <button type="button" title="Edit"
                  class="px-2 py-1 font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600">
                  <i class="fa-solid fa-pen-to-square"></i>
                </button>
              </a>

              <button title="Hapus"
                onclick="showDeleteModal('{{ route('surat-keluar.destroy', $row->id) }}', 'Yakin ingin menghapus pengguna ?')"
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


  {{-- modal konfirmasi hapus  --}}
  <x-confirm-delete />

  <div class="ml-6 mt-4 text-sm font-medium">
    {{ $suratKeluar->links() }}
  </div>
@endsection
