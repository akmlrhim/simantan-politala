@extends('layouts.main')
@section('content')
  <div class="flex flex-col md:flex-row md:items-center md:justify-between sm:ml-6 mb-3 gap-2">
    <form action="{{ route('disposisi.index') }}" method="GET" class="flex items-center gap-2 w-full md:w-auto">
      <input type="text" name="search" placeholder="Masukkan kata kunci"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full md:w-120 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 font-medium"
        value="{{ request('search') }}" autocomplete="off">
    </form>
  </div>

  <div class="relative rounded-lg shadow-lg overflow-hidden sm:ml-6 bg-white">
    <div class="overflow-x-auto">
      <table class="w-full text-xs sm:text-sm font-medium text-left rtl:text-right text-black dark:text-gray-400">
        <thead class="uppercase text-xs bg-gradient-to-r from-blue-600 to-blue-800 text-white">
          <tr>
            <th class="px-6 py-3 font-semibold">Perihal</th>
            <th class="px-6 py-3 font-semibold">No Surat</th>
            <th class="px-6 py-3 font-semibold">Tgl Diterima</th>
            <th class="px-6 py-3 font-semibold">Tgl Surat</th>
            <th class="px-6 py-3 font-semibold">Disposisi</th>
            <th class="px-6 py-3 font-semibold">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($suratMasuk as $row)
            <tr class="bg-white border-b-2 border-gray-200">
              <td class="px-6 py-3">
                {{ $row->perihal }} <br />
                <span class="text-xs text-gray-600">Asal Surat : {{ $row->asal_surat }}</span>
              </td>
              <td class="px-6 py-3">{{ $row->nomor_surat }}</td>
              <td class="px-6 py-3">{{ \Carbon\Carbon::parse($row->tanggal_diterima)->translatedFormat('d-M-Y') }}</td>
              <td class="px-6 py-3">{{ \Carbon\Carbon::parse($row->tanggal_surat)->translatedFormat('d-M-Y') }}</td>
              <td class="px-6 py-3">
                @if ($row->disposisi)
                  <span
                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">Selesai</span>
                @else
                  <a href="{{ route('disposisi.create', $row->id) }}">
                    <button class="px-3 py-1 text-xs font-medium text-white bg-blue-900 rounded-lg hover:bg-blue-800">
                      <i class="fa-solid fa-pen"></i> Disposisikan
                    </button>
                  </a>
                @endif
              </td>
              @if ($row->disposisi && $row->disposisi->id)
                <td class="px-6 py-3">
                  <a href="{{ route('disposisi.detail', $row->disposisi->id) }}">
                    <button type="button" title="Detail"
                      class="px-2 py-1 font-medium text-xs text-white bg-green-900 hover:bg-green-800 rounded-lg">
                      <i class="fa-solid fa-circle-info"></i> Detail
                    </button>
                  </a>

                  @if (Auth::user()->role == 'Sespim/Direktur')
                    <a href="{{ route('disposisi.edit', $row->disposisi->id) }}">
                      <button type="button" title="Edit"
                        class="px-2 py-1 font-medium text-xs text-white bg-yellow-700 hover:bg-yellow-600 rounded-lg">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                      </button>
                    </a>
                  @endif

                </td>
              @endif
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center px-6 py-4 text-gray-500">
                Tidak ada data dalam tabel.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>

  <div class="ml-6 mt-4 text-sm font-medium">
    {{ $suratMasuk->links() }}
  </div>
@endsection
