<nav class="fixed top-0 z-50 w-full bg-gray-800 dark:bg-gray-800 dark:border-gray-700">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
          aria-controls="logo-sidebar" type="button"
          class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:ring-gray-600">
          <span class="sr-only">Open sidebar</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
              d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
          </svg>
        </button>

        <a href="{{ route('dashboard') }}" class="flex ms-2 md:me-24">
          <img src="https://flowbite.com/docs/images/logo.svg"
            class="h-8 me-3 bg-white p-1 rounded-lg" alt="Flowbite Logo" />
          <span class="self-center text-xl font-semibold whitespace-nowrap text-white">
            <small class="text-lg font-bold "></small></span>
        </a>
      </div>
      <div class="flex items-center">
        <div class="flex items-center ms-3">
          <div class="mr-3">
            <button type="button"
              class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
              aria-expanded="false" data-dropdown-toggle="user-dropdown">
              <span class="sr-only">Open user menu</span>
              <img class="w-8 h-8 rounded-full bg-white p-1"
                src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                alt="User Avatar">

            </button>
          </div>
          <div
            class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-600"
            id="user-dropdown">
            <ul class="py-2" aria-labelledby="user-menu-button">
              <li>
                <a href="{{ route('dashboard') }}"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard
                </a>
              </li>

              <li>
                <a href="{{ route('dashboard') }}"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profil
                  Saya
                </a>
              </li>

              <li>
                <a href="#"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                  onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
              </li>

              <form action="{{ route('logout') }}" method="POST" class="hidden"
                id="logout">@csrf
              </form>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
