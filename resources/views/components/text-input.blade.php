@props(['disabled' => false])

{{-- Kita ubah warna 'focus:border-indigo-500' dan 'focus:ring-indigo-500' --}}
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-amber-500 focus:ring-amber-500 rounded-md shadow-sm']) !!}>
