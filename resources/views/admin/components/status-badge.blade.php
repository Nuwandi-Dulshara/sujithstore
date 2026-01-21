@php
$colors = [
    'approved' => 'var(--ks-blue)',
    'pending' => 'var(--ks-red)',
    'active' => 'var(--ks-blue)',
    'inactive' => '#999'
];
@endphp

<span class="badge px-3 py-2"
      style="background:{{ $colors[$status] ?? 'var(--ks-red)' }}">
    {{ ucfirst($status) }}
</span>
