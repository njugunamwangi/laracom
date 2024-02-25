@if($status == App\Enums\PaymentStatus::Paid)
    <span class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700 ml-2">Payment Successful</span>
@elseif($status == App\Enums\PaymentStatus::Failed)
    <span class="inline-flex items-center rounded-md bg-red-100 px-2 py-1 text-xs font-medium text-red-700 ml-2">Payment Failed</span>
@else
    <span class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600 ml-2">Not Paid</span>
@endif
