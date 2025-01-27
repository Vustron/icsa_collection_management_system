@props([
    'for' => '',
    'disabled' => false,
])

<label for="{{ $for }}"
    {{ $attributes->merge(['class' => 'text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70']) }}
    @disabled($disabled)>
    {{ $slot }}
</label>

