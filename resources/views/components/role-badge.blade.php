@props(['type', 'value'])

@php
  $badges = [
      'role' => [
          'Admin' => 'text-blue-800 bg-blue-100',
          'Ketua Jurusan' => 'text-green-800 bg-green-100',
          'Sespim/Direktur' => 'text-red-800 bg-red-100',
      ],
  ];

  $styles = $badges[$type][$value] ?? 'text-gray-800 bg-gray-200';
@endphp

<span class="px-2 py-0.5 text-xs font-medium rounded-md {{ $styles }}">
  {{ $value }}
</span>
