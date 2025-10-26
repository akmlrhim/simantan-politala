@extends('layouts.main')

@section('content')
  <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-3 gap-2">
    @if (Auth::user()->role == 'Admin')
      <a href="{{ route('surat-keluar.create') }}"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-3 py-2 tracking-wide focus:outline-none capitalize w-fit">
        Tambah Data
      </a>
    @endif

    <form action="{{ route('surat-keluar.index') }}" method="GET" class="flex items-center gap-2 w-full md:w-auto">
      <input type="text" name="search" placeholder="Masukkan kata kunci.."
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full md:w-64 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 font-medium"
        value="{{ request('search') }}" autocomplete="off">
    </form>
  </div>

  <div class="relative overflow-x-auto shadow-lg rounded-md">
    <table class="w-full text-xs sm:text-sm font-medium text-left rtl:text-right text-black dark:text-gray-400">
      <thead class="text-white uppercase text-xs bg-gradient-to-r from-blue-600 to-blue-800">
        <tr class="border-b-2 border-gray-200 whitespace-nowrap">
          <th scope="col" class="px-6 py-3">Nomor Surat</th>
          <th scope="col" class="px-6 py-3">Hal</th>
          <th scope="col" class="px-6 py-3">Tanggal Surat</th>
          <th scope="col" class="px-6 py-3">Dokumen</th>
          {!! Auth::user()->role == 'Admin' ? '<th scope="col" class="px-6 py-3">Aksi</th>' : '' !!}
        </tr>
      </thead>
      <tbody>
        @forelse ($suratKeluar as $row)
          <tr class="bg-white border-b-2 border-gray-200 whitespace-nowrap">
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

            @if (Auth::user()->role == 'Admin')
              <td class="px-6 py-3 flex gap-2">
                <a href="{{ route('surat-keluar.edit', $row->id) }}">
                  <button type="button" title="Edit"
                    class="px-2 py-1 font-medium text-white text-xs bg-yellow-500 rounded-lg hover:bg-yellow-600">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                  </button>
                </a>

                <button title="Hapus"
                  onclick="showDeleteModal('{{ route('surat-keluar.destroy', $row->id) }}', 'Yakin ingin menghapus surat keluar ?')"
                  class="px-2 py-1 font-medium text-white text-xs bg-red-600 rounded-lg hover:bg-red-700">
                  <i class="fa-solid fa-trash"></i> Hapus
                </button>
              </td>
            @endif
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center px-6 py-3 text-gray-500">
              Tidak ada data dalam tabel.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>


  {{-- modal konfirmasi hapus  --}}
  <x-confirm-delete />

  <div class="mt-4 text-sm font-medium">
    {{ $suratKeluar->links() }}
  </div>
@endsection
