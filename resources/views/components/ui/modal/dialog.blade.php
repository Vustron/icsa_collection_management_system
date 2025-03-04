@props([
    'id' => '',
    'title' => '',
])

<dialog id="{{ $id }}" {{ $attributes->merge(['class' => 'border border-gray-200 max-w-[80vw] relative']) }}>
    <div class="flex justify-between items-center pb-2">
        <div class="text-lg text-violet-700">{{ $title }}</div>
        <div onclick="closeDialog('{{ $id }}')" class="cursor-pointer">
            <x-bi-x
                class="size-8 hover:text-red-500 transition-transform hover:border hover:rounded-full hover:bg-gray-200" />
        </div>
    </div>
    <hr>
    <div class="pt-1">
        {{ $slot }}
    </div>
</dialog>
