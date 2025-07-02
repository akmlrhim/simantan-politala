@extends('layouts.main')

@section('content')
  <div class="m-1.5 overflow-x-auto ml-5 mr-3">
    <div class="p-1.5 min-w-full inline-block align-middle">
      <div class="shadow-md rounded-lg overflow-hidden dark:border-neutral-700">
        <div class="container mx-auto p-4">
          <form action="{{ route('users.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="grid gap-4">
              <div class="sw-full">
                <label for="nama" class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Nama
                  Lengkap</label>
                <input type="text" name="nama" id="nama"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-3/4 p-2 text-xs dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 font-medium"
                  placeholder="Masukkan nama lengkap" value="{{ old('nama') }}" autocomplete="off" />
                @error('nama')
                  <small class="text-red-500 font-medium text-xs mt-1"> {{ $message }}</small>
                @enderror
              </div>

              <div class="sw-full">
                <label for="email" class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-3/4 p-2 text-xs dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 font-medium"
                  placeholder="Masukkan email" value="{{ old('email') }}" autocomplete="off" />
                @error('email')
                  <small class="text-red-500 font-medium text-xs mt-1"> {{ $message }}</small>
                @enderror
              </div>

              <div>
                <label for="role" class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Role</label>
                <select id="role" name="role"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-xs font-medium rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-3/4 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  <option value="" {{ old('role') == '' ? 'selected' : '' }}>--- Pilih Role ---</option>
                  <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin
                  </option>
                  <option value="Ketua Jurusan" {{ old('role') == 'Ketua Jurusan' ? 'selected' : '' }}>Ketua Jurusan
                  </option>
                  <option value="Sespim/Direktur" {{ old('role') == 'Sespim/Direktur' ? 'selected' : '' }}>Sespim/Direktur
                  </option>
                </select>
                @error('role')
                  <small class="text-red-500 font-medium text-xs mt-1"> {{ $message }}</small>
                @enderror
              </div>

              <div class="sw-full">
                <label for="nip" class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">NIP</label>
                <input type="text" name="nip" id="nip" inputmode="numeric"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-3/4 p-2 text-xs dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 font-medium"
                  placeholder="Masukkan NIP" value="{{ old('nip') }}" autocomplete="off" />
                @error('nip')
                  <small class="text-red-500 font-medium text-xs mt-1"> {{ $message }}</small>
                @enderror
              </div>

              <div class="sw-full">
                <label for="pwd"
                  class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" name="password" id="pwd"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-3/4 p-2 text-xs dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 font-medium"
                  placeholder="Masukkan Password" value="{{ old('password') }}" autocomplete="off" />
                @error('password')
                  <small class="text-red-500 font-medium text-xs mt-1"> {{ $message }}</small>
                @enderror
              </div>

              <div>
                <label for="jabatan" class="block mb-1 text-xs font-medium text-gray-900 dark:text-white">Jabatan</label>
                <select id="jabatan" name="jabatan_id"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-xs font-medium rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-3/4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  <option value="" {{ old('jabatan_id') == '' ? 'selected' : '' }}>--- Pilih Jabatan ---</option>
                  @foreach ($jabatan as $j)
                    <option value="{{ $j->id }}" {{ old('jabatan_id') == $j->id ? 'selected' : '' }}>
                      {{ $j->nama }}
                    </option>
                  @endforeach
                </select>
                @error('jabatan_id')
                  <small class="text-red-500 font-medium text-xs mt-1"> {{ $message }}</small>
                @enderror
              </div>

            </div>
            <div class="mt-4">
              <a href="{{ route('users.index') }}"
                class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-xs px-3 py-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Kembali</a>
              <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan
                Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
