<h3 class="font-semibold text-lg underline text-gray-800 leading-tight mb-2">
    {{ $title }}
</h3>
<table class="bg-gray-100 shadow-sm border-gray-900 border-2 table-fixed border-collapse min-w-full max-w-7xl mx-auto">
    <thead class="p-10">
        <tr class="bg-yellow min-w-full">
            @foreach ($columns as $column)
                <th class="border-yellow-dark border-2 p-2">
                    {{ $column }}
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody class="border-yellow border-2">
        {{ $slot }}
    </tbody>
</table>
<div class="mt-2">
    {{ $paginationLinks }}
</div>
