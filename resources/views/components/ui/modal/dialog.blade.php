@props([
    'id' => '',
    'title' => '',
    'createLink' => '',
    'button_name' => '',
    'type' => ''
])

<dialog id="{{ $id }}" {{ $attributes->merge(['class' => 'border border-gray-200 max-w-[80vw] relative']) }}>
    <div class="flex w-80 items-center justify-between pb-2">
        <div class="text-lg text-violet-700">{{ $title }}</div>
        <div onclick="closeDialog('{{ $id }}')" class="cursor-pointer">
            <x-bi-x
                class="size-8 transition-transform hover:rounded-full hover:border hover:bg-gray-200 hover:text-red-500" />
        </div>
    </div>
    <hr>
    <div class="pt-1">
        <form action="{{ $createLink }}" method="POST">
            @csrf
            {{ $slot }}
            @if ($type == 'create')
                <div class="flex items-center space-x-1">
                    <x-ui.button.dynamic-button type="button" variant="outline" size="default"
                        class="submitBtn mt-2 w-36 bg-gray-100 hover:bg-gray-300 focus:ring-purple-500"
                        onclick="closeDialog('{{ $id }}')">
                        Cancel
                    </x-ui.button.dynamic-button>
                    <x-ui.button.dynamic-button type="submit" variant="default" size="default"
                        class="submitBtn mt-2 w-full bg-purple-600 hover:bg-purple-700 focus:ring-purple-500">
                        {{ $button_name }}
                    </x-ui.button.dynamic-button>
                </div>
            @endif
        </form>
    </div>
</dialog>
