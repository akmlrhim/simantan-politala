@extends('layouts.main')

@section('content')
  <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-3 gap-2">
    <a href="{{ route('users.create') }}"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-3 py-2 tracking-wide focus:outline-none capitalize w-fit">
      Tambah Data
    </a>

    <form action="{{ route('users.index') }}" method="GET" class="flex items-center gap-2 w-full md:w-auto">
      <input type="text" name="search" placeholder="Cari nama user (enter)"
        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full md:w-64 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 font-medium"
        value="{{ request('search') }}" autocomplete="off">
    </form>
  </div>

  <div class="relative overflow-x-auto shadow-lg rounded-md">
    <table class="w-full font-medium text-xs sm:text-sm text-left rtl:text-right text-black dark:text-gray-400">
      <thead class="text-white text-xs uppercase bg-gradient-to-r from-blue-600 to-blue-800">
        <tr class="border-b-2 border-gray-200">
          <th scope="col" class="px-6 py-3">Nama</th>
          <th scope="col" class="px-6 py-3">Jabatan</th>
          <th scope="col" class="px-6 py-3">Email</th>
          <th scope="col" class="px-6 py-3">Role</th>
          <th scope="col" class="px-6 py-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($users as $user)
          <tr class="bg-white border-b-2 border-gray-200">
            <td class="px-6 py-3">
              <div class="flex items-center gap-2">
                <img src="{{ asset('storage/foto_profil/' . Auth::user()->foto) }}" alt="Foto {{ $user->nama_lengkap }}"
                  class="w-8 h-8 rounded-full object-cover">
                <div class="flex flex-col">
                  <span>{{ $user->nama }}</span>
                  <span class="text-gray-500">NIP. {{ $user->nip }}</span>
                </div>
              </div>
            </td>
            <td class="px-6 py-3">{{ $user->jabatan->nama }}</td>
            <td class="px-6 py-3">{{ $user->email }}</td>
            <td class="px-6 py-3">
              <x-badge type="role" value="{{ $user->role }}" />
            </td>
            <td class="px-6 py-3">
              <a href="{{ route('users.edit', $user->id) }}">
                <button type="button" title="Edit"
                  class="px-2 py-1 font-medium text-xs text-white bg-yellow-500 hover:bg-yellow-600 rounded-lg">
                  <i class="fa-solid fa-pen-to-square"></i> Edit
                </button>
              </a>

              <button type="button" title="Hapus"
                onclick="showDeleteModal('{{ route('users.destroy', $user->id) }}', 'Yakin ingin menghapus pengguna ?')"
                class="px-2 py-1 text-xs font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg">
                <i class="fa-solid fa-trash"></i> Hapus
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

  <div class="mt-4 text-sm font-medium">
    {{ $users->links() }}
  </div>
@endsection
