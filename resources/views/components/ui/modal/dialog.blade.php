@props([
    'id' => '',
    'title' => ''
])

<dialog id="{{ $id }}" {{ $attributes->merge(['class' => 'border border-gray-200 max-w-[85vw]']) }}>
    <div class="flex items-center justify-between pb-2">
        <div class="text-lg text-violet-700">{{ $title }}</div>
        <div onclick="closeDialog('{{ $id }}')" class="cursor-pointer">
            <x-bi-x
                class="size-8 transition-transform hover:rounded-full hover:border hover:bg-gray-200 hover:text-red-500" />
        </div>
    </div>
    <hr>
    <div class="pt-1">
        {{ $slot }}
    </div>
</dialog>
