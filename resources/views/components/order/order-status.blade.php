@if($status == App\Enums\OrderStatus::Pending)
    <span
        class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600">
            Order {{ $status }}
        </span>
@elseif($status == App\Enums\OrderStatus::Delivered)
    <span
        class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
            Order {{ $status }}
        </span>
@elseif($status == App\Enums\OrderStatus::Processing)
    <span
        class="inline-flex items-center rounded-md bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
            Order {{ $status }}
        </span>
@elseif($status == App\Enums\OrderStatus::Cancelled)
    <span
        class="inline-flex items-center rounded-md bg-red-100 px-2 py-1 text-xs font-medium text-red-700">
            Order {{$status}}
        </span>
@endif
