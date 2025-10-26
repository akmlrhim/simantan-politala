@extends('layouts.main')

@section('content')
  <div class="relative overflow-x-auto bg-white p-3 shadow-lg rounded-md">
    <div class="w-full space-y-3">

      {{-- Profile Info --}}
      <div class="bg-white dark:bg-gray-800 p-3 space-y-3">
        <div>
          <h1 class="font-bold text-2xl text-gray-900 dark:text-white">Data Pribadi</h1>
          <p class="text-sm font-medium text-gray-700">Pastikan informasi Anda tetap valid dengan memperbarui data
            secara berkala.</p>
        </div>

        <form method="POST" action="{{ route('profil.update') }}" enctype="multipart/form-data" class="space-y-3">
          @csrf
          @method('PATCH')

          <div>
            <label for="nama" class="block text-sm font-bold text-gray-900 dark:text-white">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', Auth::user()->nama) }}"
              autocomplete="off"
              class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full lg:w-1/2 p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white transition" />
            @error('nama')
              <x-validation>{{ ucfirst($message) }}</x-validation>
            @enderror
          </div>

          <div>
            <label for="email" class="block text-sm font-bold text-gray-900 dark:text-white">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}"
              autocomplete="off" placeholder="example@domain.com"
              class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full lg:w-1/2 p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white transition" />
            @error('email')
              <x-validation>{{ ucfirst($message) }}</x-validation>
            @enderror
          </div>

          <div>
            <label for="nip" class="block text-sm font-bold text-gray-900 dark:text-white">NIP</label>
            <input type="text" id="nip" name="nip" inputmode="numeric"
              value="{{ old('nip', Auth::user()->nip) }}" autocomplete="off" placeholder="1983XXXXXXXX"
              class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full lg:w-1/2 p-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white transition" />
            @error('nip')
              <x-validation>{{ ucfirst($message) }}</x-validation>
            @enderror
          </div>

          <div>
            <label for="foto" class="block text-sm font-bold text-gray-900 dark:text-white">Upload Foto
              (opsional)</label>
            <input type="file" id="foto" name="foto" accept="image/png, image/jpeg, image/webp"
              class="block w-full lg:w-1/2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 transition" />
            @error('foto')
              <x-validation>{{ ucfirst($message) }}</x-validation>
            @enderror
          </div>

          <div>
            <button type="submit"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 transition dark:bg-blue-600 dark:hover:bg-blue-700">
              Simpan
            </button>
          </div>
        </form>
      </div>


      <hr class="border-t-1 sm:ml-3 border-gray-300 my-3 sm:w-3/4 w-full">

      {{-- password change field  --}}
      <div class="bg-white dark:bg-gray-800 p-3 space-y-3" id="password-section">
        <div>
          <h1 class="font-bold text-2xl text-gray-900 dark:text-white">Password</h1>
          <p class="text-sm font-medium text-gray-700">Gunakan kata sandi yang panjang dan acak untuk keamanan
            optimal.</p>
        </div>

        <form method="POST" action="{{ route('profil.update-password') }}" class="space-y-3">
          @csrf
          @method('PATCH')

          <div>
            <label for="current_password" class="block text-sm font-bold text-gray-900 dark:text-white">Password Saat
              Ini</label>
            <div class="relative w-full lg:w-1/2">
              <input type="password" id="current_password" name="current_password" value="{{ old('current_password') }}"
                placeholder="Password saat ini"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 pr-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white transition" />
              <button type="button" onclick="togglePassword('current_password')"
                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700 transition">
                <i id="icon-current_password" class="fas fa-eye"></i>
              </button>
            </div>
            @error('current_password')
              <x-validation>{{ ucfirst($message) }}</x-validation>
            @enderror
          </div>

          <div>
            <label for="new_password" class="block text-sm font-bold text-gray-900 dark:text-white">Password Baru</label>
            <div class="relative w-full lg:w-1/2">
              <input type="password" id="new_password" name="new_password" value="{{ old('new_password') }}"
                placeholder="Password Baru"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 pr-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white transition" />
              <button type="button" onclick="togglePassword('new_password')"
                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700 transition">
                <i id="icon-new_password" class="fas fa-eye"></i>
              </button>
            </div>
            @error('new_password')
              <x-validation>{{ ucfirst($message) }}</x-validation>
            @enderror
          </div>

          <div>
            <label for="confirm_password" class="block text-sm font-bold text-gray-900 dark:text-white">Konfirmasi
              Password Baru</label>
            <div class="relative w-full lg:w-1/2">
              <input type="password" id="confirm_password" name="new_password_confirmation"
                value="{{ old('new_password_confirmation') }}" placeholder="Konfirmasi Password Baru"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 pr-10 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white transition" />
              <button type="button" onclick="togglePassword('confirm_password')"
                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700 transition">
                <i id="icon-confirm_password" class="fas fa-eye"></i>
              </button>
            </div>
            @error('new_password_confirmation')
              <x-validation>{{ ucfirst($message) }}</x-validation>
            @enderror
          </div>

          <div>
            <button type="submit"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 transition dark:bg-blue-600 dark:hover:bg-blue-700">
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @push('scripts')
    <script>
      function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const icon = document.getElementById(`icon-${fieldId}`);
        if (field.type === "password") {
          field.type = "text";
          icon.classList.remove("fa-eye");
          icon.classList.add("fa-eye-slash");
        } else {
          field.type = "password";
          icon.classList.remove("fa-eye-slash");
          icon.classList.add("fa-eye");
        }
      }
    </script>
  @endpush
@endsection
