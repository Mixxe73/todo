@props(['value'])

<textarea {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none text-sm']) }}>{{ $value }}</textarea>