<h3 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
    {{ $title }}
</h3>

@if(isset($button))
    <x-primary-button class="mb-4">
        {{ $button }}
    </x-primary-button>
@endif

<table class="shadow-sm border-gray-900 border-2 table-fixed border-collapse min-w-full max-w-7xl mx-auto">
    <thead class="p-10">
        <tr class="border-gray-400 min-w-full">
            @foreach ($columns as $column)
                <th class="bg-gray-200 border-gray-400 border-2 p-2">
                    {{ $column }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody class="border-gray-400 border-2">
        {{ $slot }}
    </tbody>
</table>
<div class="mt-2">
    {{ $paginationLinks }}
</div>
