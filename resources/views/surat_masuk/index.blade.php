@extends('layouts.main')

@section('content')
  <div class="flex mb-3 sm:px-6">
    <a href="{{ route('surat-masuk.create') }}"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-3 py-2 tracking-wide focus:outline-none capitalize">
      Tambah Data
    </a>
  </div>

  <div class="relative rounded-md shadow-md overflow-hidden sm:ml-6">
    <div class="overflow-x-auto">
      <table class="w-full text-xs md:text-sm text-left rtl:text-right text-black dark:text-gray-400">
        <thead class="text-black uppercase bg-white">
          <tr class="border-b-2 border-gray-200">
            <th scope="col" class="px-6 py-3">No.</th>
            <th scope="col" class="px-6 py-3">Perihal</th>
            <th scope="col" class="px-6 py-3">Asal Surat</th>
            <th scope="col" class="px-6 py-3">No Surat</th>
            <th scope="col" class="px-6 py-3">Tgl diterima</th>
            <th scope="col" class="px-6 py-3">Tgl surat</th>
            <th scope="col" class="px-6 py-3">Lihat dokumen</th>
            <th scope="col" class="px-6 py-3">Telaah staf</th>
            <th scope="col" class="px-6 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($suratMasuk as $row)
            <tr class="bg-white border-b-2 border-gray-200">
              <td class="px-6 py-4">
                {{ method_exists($suratMasuk, 'firstItem') ? $suratMasuk->firstItem() + $loop->index : $loop->iteration }}
              </td>
              <td class="px-6 py-4">{{ $row->perihal }}</td>
              <td class="px-6 py-4">{{ $row->asal_surat }}</td>
              <td class="px-6 py-4">{{ $row->nomor_surat }}</td>
              <td class="px-6 py-4">{{ \Carbon\Carbon::parse($row->tanggal_diterima)->format('d-m-Y') }}</td>
              <td class="px-6 py-4">{{ \Carbon\Carbon::parse($row->tanggal_surat)->format('d-m-Y') }}</td>
              <td class="px-6 py-4">
                <button class="px-3 py-1 font-medium text-white bg-green-500 rounded hover:bg-green-600">Lihat
                  File</button>
              </td>
              <td class="px-6 py-4">
                <button class="px-3 py-1 font-medium text-white bg-green-500 rounded hover:bg-green-600">Lihat
                  File</button>
              </td>
              <td class="px-6 py-4 flex flex-wrap gap-2">
                <a href="{{ route('surat-masuk', $row->id) }}" target="_blank">
                  <button class="px-3 py-1 font-medium text-white bg-green-500 rounded hover:bg-green-600">Lihat</button>
                </a>
                <a href="{{ route('surat-masuk.edit', $row->id) }}">
                  <button class="px-3 py-1 font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600">Edit</button>
                </a>
                <button
                  onclick="showDeleteModal('{{ route('surat-masuk.destroy', $row->id) }}', 'Yakin ingin menghapus pengguna ?')"
                  class="px-3 py-1 font-medium text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="9" class="text-center px-6 py-4 text-gray-500">
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

  <div class="ml-6 mt-4 text-sm font-medium">
    {{ $suratMasuk->links() }}
  </div>
@endsection
