@props(['type' => 'button', 'variant' => 'default', 'size' => 'default', 'disabled' => false, 'loading' => false])

@php
    $baseClasses =
        'inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50';
    $variants = [
        'default' => 'bg-primary text-primary-foreground hover:bg-primary/90',
        'destructive' => 'bg-destructive text-destructive-foreground hover:bg-destructive/90',
        'outline' => 'border border-input bg-background hover:bg-accent hover:text-accent-foreground',
    ];
    $sizes = [
        'default' => 'h-10 px-4 py-2',
        'sm' => 'h-9 px-3',
        'lg' => 'h-11 px-8',
    ];
@endphp

<button type="{{ $type }}"
    {{ $attributes->merge(['class' => "{$baseClasses} {$variants[$variant]} {$sizes[$size]}"]) }}
    @disabled($disabled)>
    <span class="flex items-center">
        <svg class="mr-2 hidden h-4 w-4 animate-spin buttonLoader" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
            </circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>
        <span class="buttonText">{{ $slot }}</span>
    </span>
</button>
