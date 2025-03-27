@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-[#06275A] focus:ring-[#06275A] rounded-md shadow-sm']) !!}>
