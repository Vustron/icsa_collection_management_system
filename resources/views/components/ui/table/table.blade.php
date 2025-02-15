@props([
    'headers' => [],
])
<div class="py-4 overflow-x-auto">

    <table class="w-full overflow-x-scroll rounded-lg border border-gray-200 bg-white shadow-md">

        <thead>
            <tr class="bg-purple-600 text-white">
                @foreach ($headers as $header)
                    <th
                        class="px-4 py-2 text-sm font-medium border border-white 
                        {{ $loop->first ? 'text-center' : 'text-left' }} 
                        {{ $loop->last ? 'text-center' : 'text-left' }}">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            {{ $slot }}
        </tbody>
    </table>
</div>
