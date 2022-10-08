@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border border-teal-300 focus:border-2 focus:border-teal-700 focus:ring-teal-700 outline-none pl-2 h-8']) !!}>
