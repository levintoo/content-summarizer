@php
    $salt = \Illuminate\Support\Str::uuid();
@endphp

<svg viewBox="0 0 225 225" fill="none" xmlns="http://www.w3.org/2000/svg" {{ $attributes }} id="{{ fake()->randomNumber() }}">
    <rect width="225" height="225" fill="#235fe7"/>
    <rect x="127" y="70" width="85" height="85" rx="42.5" fill="url(#{{ $salt }}paint0_linear_276_5)"/>
    <rect x="19" y="70" width="85" height="85" rx="42.5" fill="url(#{{ $salt }}paint1_linear_276_5)"/>
    <defs>
        <linearGradient id="{{ $salt }}paint0_linear_276_5" x1="169.5" y1="70" x2="169.5" y2="155" gradientUnits="userSpaceOnUse">
            <stop stop-color="#C9DEF4"/>
            <stop offset="0.5" stop-color="#e4cbe2"/>
            <stop offset="1" stop-color="#ABC9E9"/>
        </linearGradient>
        <linearGradient id="{{ $salt }}paint1_linear_276_5" x1="61.5" y1="70" x2="61.5" y2="155" gradientUnits="userSpaceOnUse">
            <stop stop-color="#C9DEF4"/>
            <stop offset="0.5" stop-color="#e4cbe2"/>
            <stop offset="1" stop-color="#ABC9E9"/>
        </linearGradient>
    </defs>
</svg>
