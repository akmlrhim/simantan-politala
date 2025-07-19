<aside id="logo-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen pt-4 transition-transform -translate-x-full shadow-xl bg-white sm:translate-x-0"
  aria-label="Sidebar">
  <div class="h-full px-3 pb-4 bg-white">

    <!-- Logo moved here -->
    <a href="{{ route('dashboard') }}" class="flex items-center mb-6 ps-2">
      <img src="{{ asset('img/logo_politala.png') }}" class="h-8 me-3 bg-white rounded-lg"
        alt="Logo" />
      <span class="text-lg font-semibold text-gray-800">Apps</span>
    </a>

    <ul class="space-y-2 font-medium font-sans text-sm">

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

      <li>
        <x-nav-link href="{{ route('surat-masuk.index') }}" :active="request()->routeIs('surat-masuk.index')">
          <i class="fa-solid fa-envelope-open-text"></i>
          <span class="ms-2">Surat Masuk</span>
        </x-nav-link>
      </li>

      <li>
        <x-nav-link href="{{ route('surat-keluar.index') }}" :active="request()->routeIs('surat-keluar.index')">
          <i class="fa-solid fa-envelope-open"></i>
          <span class="ms-2">Surat Keluar</span>
        </x-nav-link>
      </li>

      <div class="flex items-center my-2">
        <small class="mx-2 text-black opacity-65">ADMIN</small>
        <hr class="h-px flex-grow bg-gray-200 border-0 opacity-20">
      </div>

      <li>
        <x-nav-link href="{{ route('jenis-surat.index') }}" :active="request()->routeIs('jenis-surat.index')">
          <i class="fa-solid fa-envelopes-bulk"></i>
          <span class="ms-3">Jenis Surat</span>
        </x-nav-link>
      </li>

      <li>
        <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
          <i class="fa-solid fa-user"></i>
          <span class="ms-4">User</span>
        </x-nav-link>
      </li>

      <li>
        <a onclick="event.preventDefault(); document.getElementById('logout').submit();"
          href="#"
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
