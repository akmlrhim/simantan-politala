<aside id="logo-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen pt-16 transition-transform -translate-x-full bg-gray-800 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700 shadow-xl"
  aria-label="Sidebar">
  <div class="h-full px-3 pb-4 bg-gray-800 dark:bg-gray-800">
    <ul class="space-y-2 font-medium font-sans text-sm">

      {{-- divider  --}}
      <div class="flex items-center my-2">
        <small class="mx-2 text-white opacity-65">GENERAL</small>
        <hr class="h-px flex-grow bg-gray-200 border-0 opacity-20">
      </div>

      <li>
        <a href="{{ route('dashboard') }}"
          class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-house"></i>
          <span class="ms-2">Dashboard</span>
        </a>
      </li>

      <li>
        <button type="button"
          class="flex items-center w-full p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-700"
          aria-controls="master-dropdown" data-collapse-toggle="master-dropdown">
          <i class="fa-solid fa-database"></i>
          <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Data
            Master</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2" d="m1 1 4 4 4-4" />
          </svg>
        </button>
        <ul id="master-dropdown" class="hidden py-2">
          <li>
            <a href="#"
              class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-9 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 hover:text-gray-800">
              Barang</a>
          </li>

        </ul>
      </li>

      {{-- divider  --}}
      <div class="flex items-center my-2">
        <small class="mx-2 text-white opacity-65">ADMIN</small>
        <hr class="h-px flex-grow bg-gray-200 border-0 opacity-20">
      </div>

      <li>
        <a href="{{ route('users.index') }}"
          class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-user"></i>
          <span class="ms-3">User</span>
        </a>
      </li>

      <li>
        <a href="{{ route('users.index') }}"
          class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-user-tie"></i>
          <span class="ms-3">Jabatan</span>
        </a>
      </li>

    </ul>
    {{-- end  --}}
  </div>
</aside>
