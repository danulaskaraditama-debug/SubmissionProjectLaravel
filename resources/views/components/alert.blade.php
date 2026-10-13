@props(['tipe' => 'info'])

<div style="padding: 10px; margin: 10px 0; border: 1px solid;
    color: {{ $tipe === 'bahaya' ? 'red' : ($tipe === 'sukses' ? 'green' : 'blue') }};">
    {{ $slot }}
</div>
