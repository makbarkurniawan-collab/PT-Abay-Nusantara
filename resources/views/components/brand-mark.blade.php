@props(['light' => false])

<svg {{ $attributes->merge(['class' => '']) }} viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
    <path d="M10 19h23v10.5A9.5 9.5 0 0 1 23.5 39h-4A9.5 9.5 0 0 1 10 29.5V19Z" stroke="currentColor" stroke-width="2.2" stroke-linejoin="round"/>
    <path d="M33 22h2.5a5 5 0 0 1 0 10H33M7 43h31M16 13c-1.6-2.3 2-3.2.6-5.8M24 13c-1.6-2.3 2-3.2.6-5.8" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>
    <path d="M16 25c2 2 4 2 6 0s4-2 6 0" stroke="{{ $light ? '#EAB308' : '#B45309' }}" stroke-width="1.8" stroke-linecap="round"/>
</svg>
