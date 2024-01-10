@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 focus:border-yellow focus:ring-yellow rounded-md shadow-sm']) !!}>
