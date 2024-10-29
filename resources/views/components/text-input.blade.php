@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-50 bg-gray-200 text-gray-800 dark:border-gray-400 dark:bg-gray-600 dark:text-gray-50 focus:border-gray-400 dark:focus:border-gray-500 focus:ring-gray-300 dark:focus:ring-gray-500 rounded-md shadow-sm']) !!}>
