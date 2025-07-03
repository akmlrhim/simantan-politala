@extends('layouts.main')

@section('content')
  <div class="flex ml-6 mb-3">
    <a href="{{ route('users.create') }}"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-xs px-3 py-2 tracking-wide focus:outline-none capitalize">
      Tambah Data
    </a>
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
            Email
          </th>
          <th scope="col" class="px-6 py-3">
            Role
          </th>
          <th scope="col" class="px-6 py-3">
            NIP
          </th>
          <th scope="col" class="px-6 py-3">
            Jabatan
          </th>
          <th scope="col" class="px-6 py-3">
            Aksi
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 font-medium">
            <td class="px-6 py-4" scope="row">
              {{ method_exists($users, 'firstItem') ? $users->firstItem() + $loop->index : $loop->iteration }}
            </td>
            <td class="px-6 py-4">{{ $user->nama }}</td>
            <td class="px-6 py-4">{{ $user->email }}</td>
            <td class="px-6 py-4">{{ $user->role }}</td>
            <td class="px-6 py-4">{{ $user->nip }}</td>
            <td class="px-6 py-4">{{ $user->nama_jabatan }}</td>
            <td class="px-6 py-4">
              <a href="{{ route('users.edit', $user->id) }}"
                class="text-blue-600 hover:text-blue-900 dark:text-blue-500 dark:hover:text-blue-700">Edit</a>
              |
              <button
                onclick="showDeleteModal('{{ route('users.destroy', $user->id) }}', 'Yakin ingin menghapus pengguna ?')"
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
    {{ $users->links() }}
  </div>
@endsection
