<div class="p-3 mt-12">
  <nav
    class="flex flex-col md:flex-row items-center md:items-center justify-center md:justify-between text-center md:text-left px-3 py-3"
    aria-label="Breadcrumb">

    <div class="text-xl md:text-3xl font-semibold text-gray-800 dark:text-white mb-2 md:mb-0">
      {{ $title }}
    </div>

    <ol
      class="inline-flex items-center text-sm space-x-1 md:space-x-2 rtl:space-x-reverse text-gray-700 dark:text-gray-400">
      <li class="inline-flex items-center">
        <a href="{{ route('dashboard') }}"
          class="inline-flex items-center font-medium hover:text-gray-800 dark:hover:text-white">
          Home
        </a>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg class="rtl:rotate-180 w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 9 4-4-4-4" />
          </svg>
          <span class="ml-1 font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ $title }}</span>
        </div>
      </li>
    </ol>
  </nav>
</div>
