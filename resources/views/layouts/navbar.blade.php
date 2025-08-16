<nav class="fixed top-0 z-30 w-full bg-gray-100 ps-0 sm:ps-64">
  <div class="px-4 py-3 flex items-center justify-between w-full">

    <div class="block sm:hidden md:hidden me-auto">
      <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
        type="button"
        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
          <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
          </path>
        </svg>
      </button>
    </div>

    <div class="ml-auto flex items-center">
      <div class="relative">
        <button type="button"
          class="flex items-center text-sm rounded-lg shadow-sm focus:ring-4 focus:ring-gray-300 px-2 py-1"
          aria-expanded="false" data-dropdown-toggle="user-dropdown">

          <img class="w-10 h-10 rounded-full "
            src="{{ Auth::user()->foto ? asset('storage/foto_profil/' . Auth::user()->foto) : asset('storage/foto_profil/default.jpg') }}"
            alt="User Avatar">

          <div class="mr-4 ml-3 text-black hidden md:flex flex-col text-left leading-tight">
            <span class="font-semibold">
              {{ Auth::user()->nama }}
            </span>
            <span class="text-xs font-medium">
              {{ Auth::user()->role }}
            </span>
          </div>
        </button>

        <div id="user-dropdown"
          class="absolute right-0 z-50 hidden mt-2 w-48 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow transition-all duration-200 ease-out transform origin-top scale-95">
          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="{{ route('profil.index') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-medium">Profil
                Saya</a>
            </li>
            <li>
              <a href="{{ route('profil.log-aktivitas') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 font-medium">Log Aktivitas</a>
            </li>
            <li>
              <a href="#" onclick="event.preventDefault(); document.getElementById('navLogout').submit();"
                class="block px-4 py-2 text-sm text-red-700 hover:bg-red-100 font-medium">Logout</a>
            </li>
            <form id="navLogout" method="POST" action="{{ route('logout') }}" class="hidden">
              @csrf
            </form>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
