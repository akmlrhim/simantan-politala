@props(['active' => false])
<a class="{{ $active ? 'bg-blue-900 text-white' : 'text-black hover:bg-blue-900 hover:text-white' }} flex items-center p-2 rounded-lg"
  aria-current="{{ $active ? 'page' : 'false' }}"
  {{ $attributes }}>{{ $slot }}</a>
