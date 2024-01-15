<!-- resources/views/maintenance/workOrder/index.blade.php -->

<x-app-layout>
    <x-slot name="pageHeaderText">
        {{ __('All Work Orders') }}
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 py-5 bg-white shadow overflow-hidden">
            <h2 class="text-2xl font-semibold mb-4">All Work Orders</h2>

            {{-- Display Work Orders --}}
            <ul>
                @foreach ($workOrders as $workOrder)
                    <li>
                        <strong>Name:</strong> {{ $workOrder->name }}<br>
                        <strong>Description:</strong> {{ $workOrder->description }}<br>
                        <strong>Time Spent (minutes):</strong> {{ $workOrder->timeSpent }}<br>

                        @if ($workOrder->products->count() > 0)
                            <strong>Products:</strong>
                            <ul>
                                @foreach ($workOrder->products as $product)
                                    <li>{{ $product->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <em>No products selected for this work order</em>
                        @endif

                        <hr>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
