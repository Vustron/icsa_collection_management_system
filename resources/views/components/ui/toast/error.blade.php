@props(['message'])

<span {{ $attributes->merge(['class' => 'text-sm text-destructive']) }}>
    {{ $message }}
</span>
