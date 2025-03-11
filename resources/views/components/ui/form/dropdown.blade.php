@props([
    'label' => '',
    'name' => '',
    'id' => '',
    'required' => false,
    'disabled' => false
])

<div class="mt-2 w-full space-y-[10px]">
    <label for="{{ $id }}"
        class="mb-1 block text-sm font-medium leading-none text-gray-700 peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
        {{ $label }}
    </label>
    <div class="relative w-full">
        <select id="{{ $id }}" name="{{ $name }}" @required($required) @disabled($disabled)
            {{ $attributes->merge(['class' => 'w-full rounded-md border border-gray-300 px-2 py-[10px] shadow-sm outline-none focus:border-purple-500 focus:ring-1 focus:ring-purple-500']) }}>
            <option value="" disabled selected>Select an option</option>
            {{ $slot }}
        </select>
    </div>
</div>
