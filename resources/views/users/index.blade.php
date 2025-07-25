@extends('layouts.main')

@section('content')
  <div class="flex flex-col md:flex-row md:items-center md:justify-between sm:ml-6 mb-3 gap-2">
    <a href="{{ route('users.create') }}"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-3 py-2 tracking-wide focus:outline-none capitalize w-fit">
      Tambah Data
    </a>

    <form action="{{ route('users.index') }}" method="GET" class="flex items-center gap-2 w-full md:w-auto">
      <input type="text" name="search" placeholder="Cari pengguna..."
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full md:w-64 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 font-medium"
        value="{{ request('search') }}" autocomplete="off">
      <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2">
        Cari
      </button>
    </form>
  </div>


  <div class="relative overflow-x-auto shadow-lg rounded-md sm:ml-6">
    <table class="w-full text-left rtl:text-right text-black dark:text-gray-400">
      <thead class="md:text-sm text-sm text-black uppercase bg-white">
        <tr class="border-b-2 border-gray-200">
          <th scope="col" class="px-6 py-3">No.</th>
          <th scope="col" class="px-6 py-3">Nama</th>
          <th scope="col" class="px-6 py-3">Jabatan</th>
          <th scope="col" class="px-6 py-3">Email</th>
          <th scope="col" class="px-6 py-3">Role</th>
          <th scope="col" class="px-6 py-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $user)
          <tr class="bg-white border-b-2 border-gray-200 md:text-sm text-xs font-medium">
            <td class="px-6 py-3" scope="row">
              {{ method_exists($users, 'firstItem') ? $users->firstItem() + $loop->index : $loop->iteration }}
            </td>
            <td class="px-6 py-3">{{ $user->nama }} <br /> <span
                class="text-xs text-gray-600">NIP.{{ $user->nip }}</span></td>
            <td class="px-6 py-3">{{ $user->jabatan }}</td>
            <td class="px-6 py-3">{{ $user->email }}</td>
            <td class="px-6 py-3">{{ $user->role }}</td>
            <td class="px-6 py-3 flex gap-2">
              <a href="{{ route('users.edit', $user->id) }}">
                <button type="button" title="Edit"
                  class="px-2 py-1 font-medium text-white bg-yellow-500 rounded hover:bg-yellow-600">
                  <i class="fa-solid fa-pen-to-square"></i>
                </button>
              </a>

              <button type="button" title="Hapus"
                onclick="showDeleteModal('{{ route('users.destroy', $user->id) }}', 'Yakin ingin menghapus pengguna ?')"
                class="px-2 py-1 font-medium text-white bg-red-600 rounded hover:bg-red-700">
                <i class="fa-solid fa-trash"></i>
              </button>
            </td>

          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center px-6 py-4 text-gray-500">
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
    {{ $users->links() }}
  </div>
@endsection
