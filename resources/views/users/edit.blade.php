@extends('layouts.main')

@push('css-libs')
  <link rel="stylesheet" href="{{ asset('select2.css') }}">
  <style>
    /* Select2 container styling using Tailwind via regular CSS */
    .select2-container--default .select2-selection--single {
      background-color: #f9fafb;
      border: 1px solid #d1d5db;
      border-radius: 0.5rem;
      height: 2.5rem !important;
      padding-right: 2.5rem;
      display: flex;
      align-items: center;
      font-size: 0.875rem;
      color: #111827;
    }

    .select2-selection__rendered {
      color: #111827;
      font-size: 0.875rem;
      line-height: 1.25rem;
    }

    .select2-selection__arrow {
      height: 100% !important;
      top: 0 !important;
      right: 0.75rem !important;
      width: 2rem !important;
      color: #6b7280;
    }

    .select2-dropdown {
      background-color: white;
      border: 1px solid #d1d5db;
      border-radius: 0.5rem;
      font-size: 0.875rem;
      z-index: 9999;
    }

    .select2-results__option {
      padding: 0.5rem 0.75rem;
      cursor: pointer;
    }

    .select2-results__option--selected {
      background-color: #dbeafe;
      color: #1e40af;
      font-weight: 600;
    }

    .select2-results__option--highlighted {
      background-color: #bfdbfe;
    }

    .select2-search--dropdown .select2-search__field {
      border: 1px solid #d1d5db;
      border-radius: 0.375rem;
      padding: 0.5rem 0.75rem;
      width: 100%;
    }
  </style>
@endpush

@section('content')
  <div class="overflow-x-auto sm:ml-6 shadow-md">
    <div class="min-w-full inline-block align-middle">
      <div class="shadow-md rounded-lg overflow-hidden dark:border-neutral-700 bg-white">
        <div class="container mx-auto p-4">
          <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid gap-3">
              <div>
                <label for="nama" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Nama
                  Lengkap
                  <span class="text-gray-500 text-xs">(beserta gelar)</span>
                </label>
                <input type="text" name="nama" id="nama"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full md:w-3/4 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 font-medium"
                  placeholder="Masukkan nama lengkap" value="{{ old('nama', $user->nama) }}" autocomplete="off" />
                @error('nama')
                  <x-validation>{{ ucfirst($message) }}</x-validation>
                @enderror
              </div>

              <div>
                <label for="email" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full md:w-3/4 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 font-medium"
                  placeholder="Masukkan email" value="{{ old('email', $user->email) }}" autocomplete="off" />
                @error('email')
                  <x-validation>{{ ucfirst($message) }}</x-validation>
                @enderror
              </div>

              <div>
                <label for="role" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                <select id="role" name="role"
                  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm font-medium rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full md:w-3/4 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                  <option value="" {{ old('role', $user->role ?? '') == '' ? 'selected' : '' }}>Pilih Role </option>
                  <option value="Admin" {{ old('role', $user->role ?? '') == 'Admin' ? 'selected' : '' }}>Admin
                  </option>
                  <option value="Ketua Jurusan" {{ old('role', $user->role ?? '') == 'Ketua Jurusan' ? 'selected' : '' }}>
                    Ketua Jurusan</option>
                  <option value="Sespim/Direktur"
                    {{ old('role', $user->role ?? '') == 'Sespim/Direktur' ? 'selected' : '' }}>
                    Sespim/Direktur</option>
                </select>

                @error('role')
                  <small class="text-red-500 font-medium text-xs mt-1 capitalize">{{ $message }}</small>
                @enderror
              </div>

              <div>
                <label for="jabatan" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">
                  Jabatan
                </label>
                <div class="w-full md:w-3/4">
                  <select class="select2 w-full " name="jabatan_id" id="jabatan">
                    <option disabled {{ old('jabatan_id') == '' ? 'selected' : '' }} value="">Pilih jabatan
                    </option>
                    @foreach ($jabatan as $id => $item)
                      <option value="{{ $id }}"
                        {{ old('jabatan_id', $user->jabatan_id) == $id ? 'selected' : '' }}>
                        {{ $item }}
                      </option>
                    @endforeach
                  </select>
                </div>
                @error('jabatan_id')
                  <x-validation class="mt-1 block text-sm text-red-600">{{ ucfirst($message) }}</x-validation>
                @enderror
              </div>

              <div>
                <label for="nip" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                <input type="text" name="nip" id="nip" inputmode="numeric"
                  class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full md:w-3/4 p-2 text-sm dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 font-medium"
                  placeholder="Masukkan NIP" value="{{ old('nip', $user->nip) }}" autocomplete="off" />
                @error('nip')
                  <x-validation>{{ ucfirst($message) }}</x-validation>
                @enderror
              </div>

              <div class="flex gap-3">
                <a href="{{ route('users.index') }}"
                  class="text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2 text-center">Kembali</a>
                <button type="submit"
                  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center">Ubah
                  Data</button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @push('scripts')
    <script src="{{ asset('jquery.js') }}"></script>
    <script src="{{ asset('select2.js') }}"></script>
    <script src="{{ asset('editor.js') }}"></script>

    <script>
      $(document).ready(function() {
        $('.select2').select2({
          width: '100%'
        });
      });
    </script>
  @endpush
@endsection
