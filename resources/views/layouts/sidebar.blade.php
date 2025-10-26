<aside id="logo-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen pt-3 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
  aria-label="Sidebar">
  <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">

    <a href="{{ route('dashboard') }}" class="flex items-center mb-6 ps-2">
      <span class="text-lg font-extrabold text-gray-800">SIMANTAN</span>
    </a>

    <ul class="space-y-1 font-sans font-semibold text-sm">

      <div class="flex items-center my-2">
        <small class="mx-2 text-black opacity-65">GENERAL</small>
        <hr class="h-px flex-grow bg-gray-200 border-0 opacity-20">
      </div>

      <li>
        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
          <i class="fa-solid fa-house"></i>
          <span class="ms-2">Dashboard</span>
        </x-nav-link>
      </li>

      @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Ketua Jurusan')
        <li>
          <x-nav-link href="{{ route('surat-masuk.index') }}" :active="request()->routeIs('surat-masuk.*')">
            <i class="fa-solid fa-envelope-open-text"></i>
            <span class="ms-2">Surat Masuk</span>
          </x-nav-link>
        </li>

        <li>
          <x-nav-link href="{{ route('surat-keluar.index') }}" :active="request()->routeIs('surat-keluar.*')">
            <i class="fa-solid fa-envelope-open"></i>
            <span class="ms-2">Surat Keluar</span>
          </x-nav-link>
        </li>
      @endif

      @if (Auth::user()->role === 'Admin')
        <li>
          <x-nav-link href="{{ route('telahan-staf.index') }}" :active="request()->routeIs('telahan-staf.*')">
            <i class="fa-solid fa-envelope-circle-check"></i>
            <span class="ms-2">Telahan Staf</span>
          </x-nav-link>
        </li>
      @endif

      @if (Auth::user()->role == 'Sespim/Direktur' || Auth::user()->role == 'Admin')
        <li>
          <x-nav-link href="{{ route('disposisi.index') }}" :active="request()->routeIs('disposisi.index')">
            <i class="fa-solid fa-paper-plane"></i>
            <span class="ms-2">Disposisi</span>
          </x-nav-link>
        </li>
      @endif

      <li>
        <x-nav-link href="{{ route('disposisi.penerima') }}" :active="request()->routeIs('disposisi.penerima')">
          <i class="fa-solid fa-circle-check"></i>
          <span class="ms-2">Disposisi Penerima</span>
        </x-nav-link>
      </li>

      @if (Auth::user()->role == 'Admin')
        <div class="flex items-center my-2">
          <small class="mx-2 text-black opacity-65">ADMIN</small>
          <hr class="h-px flex-grow bg-gray-200 border-0 opacity-20">
        </div>

        <li>
          <x-nav-link href="{{ route('jenis-surat.index') }}" :active="request()->routeIs('jenis-surat.*')">
            <i class="fa-solid fa-envelopes-bulk"></i>
            <span class="ms-3">Jenis Surat</span>
          </x-nav-link>
        </li>

        <li>
          <x-nav-link href="{{ route('jabatan.index') }}" :active="request()->routeIs('jabatan.*')">
            <i class="fa-solid fa-user-tie"></i>
            <span class="ms-4">Jabatan</span>
          </x-nav-link>
        </li>

        <li>
          <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
            <i class="fa-solid fa-user"></i>
            <span class="ms-4">User</span>
          </x-nav-link>
        </li>
      @endif



      <li>
        <a onclick="event.preventDefault(); document.getElementById('logout').submit();" href="#"
          class="flex items-center p-2 text-red-900 rounded-lg hover:bg-red-900 hover:text-white">
          <i class="fa-solid fa-right-from-bracket"></i>
          <span class="ms-4">Logout</span>
        </a>
      </li>

      <form id="logout" method="POST" action="{{ route('logout') }}" class="hidden">
        @csrf
      </form>
    </ul>
  </div>
</aside>
