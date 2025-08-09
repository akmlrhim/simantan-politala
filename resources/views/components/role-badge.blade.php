@props(['type', 'value'])

@php
  $badges = [
      'role' => [
          'Admin' => 'text-white bg-blue-600',
          'Ketua Jurusan' => 'text-white bg-green-600',
          'Sespim/Direktur' => 'text-white bg-purple-600',
      ],
      'status_surat' => [
          'Pending' => 'text-yellow-800 bg-yellow-100',
          'Selesai' => 'text-green-100 bg-green-800',
      ],
  ];

  $styles = $badges[$type][$value] ?? 'text-gray-800 bg-gray-200';
@endphp

<span class="px-2 py-0.5 text-xs font-medium rounded-md {{ $styles }}">
  {{ $value }}
</span>
