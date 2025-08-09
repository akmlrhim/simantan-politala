@props(['active' => false])
<a class="{{ $active ? 'bg-gradient-to-r from-blue-600 to-blue-800 text-white' : 'text-black hover:bg-gradient-to-r from-blue-600 to-blue-800 hover:text-white' }} flex items-center p-2 rounded-lg"
  aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>{{ $slot }}</a>
